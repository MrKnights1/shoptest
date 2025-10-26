<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Stichoza\GoogleTranslate\GoogleTranslate;

class AutoTranslate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'translate:auto {--source=et : Source language} {--targets=en,ru : Target languages (comma-separated)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically translate language files using Google Translate';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $source = $this->option('source');
        $targets = explode(',', $this->option('targets'));

        // Load source language file
        $sourcePath = lang_path("{$source}/shop.php");

        if (!file_exists($sourcePath)) {
            $this->error("Source language file not found: {$sourcePath}");
            return 1;
        }

        $sourceTranslations = require $sourcePath;

        $this->info("Loading translations from: {$source}");
        $this->info("Target languages: " . implode(', ', $targets));
        $this->newLine();

        foreach ($targets as $target) {
            $target = trim($target);

            if ($target === $source) {
                $this->warn("Skipping source language: {$target}");
                continue;
            }

            $this->info("Translating to {$target}...");
            $bar = $this->output->createProgressBar(count($sourceTranslations));
            $bar->start();

            $translator = new GoogleTranslate();
            $translator->setSource($source);
            $translator->setTarget($target);

            $translated = [];

            foreach ($sourceTranslations as $key => $value) {
                try {
                    // Skip if it's a placeholder or special format
                    if (strpos($value, ':count') !== false || strpos($value, ':') !== false) {
                        // For placeholders, translate but preserve the placeholder
                        $translated[$key] = $translator->translate($value);
                    } else {
                        $translated[$key] = $translator->translate($value);
                    }

                    // Small delay to avoid rate limiting
                    usleep(100000); // 0.1 seconds

                } catch (\Exception $e) {
                    $this->error("\nError translating key '{$key}': " . $e->getMessage());
                    $translated[$key] = $value; // Keep original on error
                }

                $bar->advance();
            }

            $bar->finish();
            $this->newLine();

            // Save translated file
            $targetPath = lang_path("{$target}/shop.php");
            $this->saveTranslationFile($targetPath, $translated);

            $this->info("✓ Saved translations to: {$target}/shop.php");
            $this->newLine();
        }

        $this->info('Translation complete!');
        return 0;
    }

    /**
     * Save translation array to PHP file
     */
    protected function saveTranslationFile($path, $translations)
    {
        $content = "<?php\n\nreturn [\n";

        $currentSection = null;

        foreach ($translations as $key => $value) {
            // Detect section based on key prefix
            $parts = explode('_', $key);
            $section = $parts[0];

            // Add section comment
            if ($currentSection !== $section) {
                if ($currentSection !== null) {
                    $content .= "\n";
                }
                $content .= "    // " . ucfirst($section) . "\n";
                $currentSection = $section;
            }

            // Escape single quotes in value
            $escapedValue = str_replace("'", "\\'", $value);
            $content .= "    '{$key}' => '{$escapedValue}',\n";
        }

        $content .= "];\n";

        file_put_contents($path, $content);
    }
}
