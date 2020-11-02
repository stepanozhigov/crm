<?php


namespace App\Services\Language;


use Illuminate\Support\Str;
use Symfony\Component\Finder\Finder;

class TranslateManager
{

    public function findSources($path = null): array
    {
        $path = $path ?: base_path();
        $stringKeys = [];
        $functions = ['__'];

        $stringPattern =
            "[^\w]".                                     // Must not have an alphanum before real method
            '('.implode('|', $functions).')'.             // Must start with one of the functions
            "\(\s*".                                       // Match opening parenthesis
            "(?P<quote>['\"])".                            // Match " or ' and store in {quote}
            "(?P<string>(?:\\\k{quote}|(?!\k{quote}).)*)". // Match any string that can be {quote} escaped
            "\k{quote}".                                   // Match " or ' previously matched
            "\s*[\),]";                                    // Close parentheses or new parameter

        // Find all PHP + Twig files in the app folder, except for storage
        $finder = new Finder();
        $finder->in($path)->exclude('storage')->exclude('vendor')->name('*.php')->name('*.twig')->name('*.vue')->files();

        /** @var \Symfony\Component\Finder\SplFileInfo $file */
        foreach ($finder as $file) {


            if (preg_match_all("/$stringPattern/siU", $file->getContents(), $matches)) {
                foreach ($matches['string'] as $key) {
                    if (preg_match("/(^[a-zA-Z0-9_-]+([.][^\1)\ ]+)+$)/siU", $key, $groupMatches)) {
                        continue;
                    }

                    //TODO: This can probably be done in the regex, but I couldn't do it.
                    //skip keys which contain namespacing characters, unless they also contain a
                    //space, which makes it JSON.
                    if (! (Str::contains($key, '::') && Str::contains($key, '.'))
                        || Str::contains($key, ' ')) {
                        $stringKeys[] = $key;
                    }
                }
            }
        }

        // Remove duplicates
        $stringKeys = array_unique($stringKeys);

        return $stringKeys;
    }
}
