<?php


namespace App\Services\Language;


use App\Models\Language;
use App\Models\LanguageSource;
use Illuminate\Support\Arr;

class TranslatesService
{
    protected $languageHandler;
    protected $translateManager;

    public function __construct(LanguageHandler $languageHandler, TranslateManager $translateManager)
    {
        $this->languageHandler = $languageHandler;
        $this->translateManager = $translateManager;
    }

    public function applyChanges(): bool
    {
        $languages = Arr::pluck(Language::where('status', Language::STATUS_ACTIVE)->get(), 'language');

        foreach ($languages as $language) {
            $messages = $this->languageHandler->listTranslationsByLang($language);
            file_put_contents(resource_path().'/lang/'. $language.'.json', json_encode($messages));
        }

        return true;
    }

    public function saveSources(string $sources): int
    {
        $sourcesList = explode(';', $sources);
        $existSources = Arr::pluck(LanguageSource::select('message')->get()->toArray(), 'message');
        $row = [];
        foreach ($sourcesList as $source) {
            if (in_array($source, $existSources)) break;
            $row[] = ['message' => $source];
        }
        return LanguageSource::insertOrIgnore($row);
    }

    public function scanSources(): int
    {
        $scanSources = $this->translateManager->findSources();

        if ($scanSources) {
            $currentSources = LanguageSource::pluck('message', 'id')->all();
            $newSources = array_diff($scanSources, $currentSources);
            $rows = [];
            foreach ($newSources as $source) {
                $rows[] = ['message' => $source];
            }
            LanguageSource::insert($rows);

            return count($newSources);
        } else {
            return 0;
        }
    }
}
