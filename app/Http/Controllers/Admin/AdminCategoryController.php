<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\App;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->latest()->paginate(15);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string|max:1000',
        ]);

        // Generate translation key
        $key = 'category.' . Str::slug(Str::lower($request->name), '_');

        // Add translations to all language files FIRST
        $this->addToLanguageFile('et', $key, $request->name);
        $this->translateAndAddToFile('en', $key, $request->name);
        $this->translateAndAddToFile('ru', $key, $request->name);

        // Clear translation cache so translations are available immediately
        $this->clearTranslationCache();

        // NOW create the category (translations are already ready)
        Category::create([
            'name' => $key,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category created successfully!');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string|max:1000',
        ]);

        $category = Category::findOrFail($id);

        // If name is a translation key (starts with 'category.'), update the translation
        if (str_starts_with($category->name, 'category.')) {
            // Update translations FIRST
            $this->addToLanguageFile('et', $category->name, $request->name);
            $this->translateAndAddToFile('en', $category->name, $request->name);
            $this->translateAndAddToFile('ru', $category->name, $request->name);

            // Clear translation cache
            $this->clearTranslationCache();

            // Then update category
            $category->update(['description' => $request->description]);
        } else {
            // If it's a regular name, convert to translation key
            $key = 'category.' . Str::slug(Str::lower($request->name), '_');

            // Add translations FIRST
            $this->addToLanguageFile('et', $key, $request->name);
            $this->translateAndAddToFile('en', $key, $request->name);
            $this->translateAndAddToFile('ru', $key, $request->name);

            // Clear translation cache
            $this->clearTranslationCache();

            // Then update category
            $category->update([
                'name' => $key,
                'description' => $request->description,
            ]);
        }

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category updated successfully!');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        if ($category->products()->count() > 0) {
            return redirect()->route('admin.categories.index')
                ->with('error', 'Cannot delete category with existing products.');
        }

        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category deleted successfully!');
    }

    /**
     * Add or update a single key in a language file
     */
    private function addToLanguageFile($locale, $key, $value)
    {
        $langFile = lang_path("{$locale}/shop.php");
        $translations = include $langFile;
        $translations[$key] = $value;
        $this->writeTranslationFile($langFile, $translations);
    }

    /**
     * Translate text and add to language file
     */
    private function translateAndAddToFile($targetLang, $key, $text)
    {
        try {
            $url = "https://translate.googleapis.com/translate_a/single?client=gtx&sl=et&tl={$targetLang}&dt=t&q=" . urlencode($text);
            $response = @file_get_contents($url);

            if ($response) {
                $result = json_decode($response, true);
                $translatedText = $result[0][0][0] ?? $text;
                $this->addToLanguageFile($targetLang, $key, $translatedText);
            }
        } catch (\Exception $e) {
            // Fallback to original text if translation fails
            $this->addToLanguageFile($targetLang, $key, $text);
        }
    }

    /**
     * Write translations array back to PHP file
     */
    private function writeTranslationFile($filePath, $translations)
    {
        $content = "<?php\n\nreturn [\n";

        foreach ($translations as $key => $value) {
            // Escape single quotes in value
            $escapedValue = str_replace("'", "\\'", $value);
            $content .= "    '{$key}' => '{$escapedValue}',\n";
        }

        $content .= "];\n";

        file_put_contents($filePath, $content);
    }

    /**
     * Clear translation cache to force reload
     */
    private function clearTranslationCache()
    {
        // Clear Laravel's cache
        Artisan::call('cache:clear');

        // Force Laravel to reload translations by forgetting the translator instance
        App::forgetInstance('translator');

        // Also clear the translation loader's internal cache
        $translator = App::make('translator');
        $loader = $translator->getLoader();
        if (method_exists($loader, 'flush')) {
            $loader->flush();
        }
    }
}
