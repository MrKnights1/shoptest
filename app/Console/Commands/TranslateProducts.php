<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Stichoza\GoogleTranslate\GoogleTranslate;

class TranslateProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'translate:products {--source=en : Source language}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically translate product names and descriptions';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $source = $this->option('source');
        $targets = ['et', 'en', 'ru'];

        // Remove source language from targets
        $targets = array_filter($targets, fn($lang) => $lang !== $source);

        $products = Product::all();

        if ($products->isEmpty()) {
            $this->warn('No products found to translate.');
            return 0;
        }

        $this->info("Translating {$products->count()} products from {$source} to " . implode(', ', $targets));
        $this->newLine();

        $bar = $this->output->createProgressBar($products->count());
        $bar->start();

        foreach ($products as $product) {
            // Get source name and description
            $sourceName = $source === 'en' ? $product->name : $product->{"name_{$source}"};
            $sourceDescription = $source === 'en' ? $product->description : $product->{"description_{$source}"};

            // Skip if source is empty
            if (empty($sourceName)) {
                $bar->advance();
                continue;
            }

            foreach ($targets as $target) {
                try {
                    $translator = new GoogleTranslate();
                    $translator->setSource($source);
                    $translator->setTarget($target);

                    // Translate name
                    $translatedName = $translator->translate($sourceName);
                    $product->{"name_{$target}"} = $translatedName;

                    // Translate description if exists
                    if (!empty($sourceDescription)) {
                        $translatedDescription = $translator->translate($sourceDescription);
                        $product->{"description_{$target}"} = $translatedDescription;
                    }

                    // Small delay to avoid rate limiting
                    usleep(100000); // 0.1 seconds

                } catch (\Exception $e) {
                    $this->error("\nError translating product {$product->id}: " . $e->getMessage());
                }
            }

            $product->save();
            $bar->advance();
        }

        $bar->finish();
        $this->newLine(2);
        $this->info('Product translation complete!');

        return 0;
    }
}
