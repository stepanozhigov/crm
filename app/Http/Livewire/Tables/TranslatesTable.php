<?php

namespace App\Http\Livewire\Tables;

use App\Models\Language;
use App\Models\LanguageSource;
use App\Models\LanguageTranslate;
use Arr;
use Illuminate\Http\Request;

class TranslatesTable extends TableComponent
{
    public $language;
    public $search;
    public $checkTranslate;
    public $languages;

    public function mount(Request $request)
    {
        parent::mount($request);
        $this->language = 'es';
        $this->checkTranslate = 1;
        $this->languages = Arr::pluck(Language::where('status', Language::STATUS_ACTIVE)->get(), 'language', 'language');
    }

    public function checkTranslate($check)
    {
        $this->checkTranslate = $check;
    }

    public function updateField($updateValue)
    {
        $languageSource = LanguageSource::findOrFail($this->modelId);
        $translate = $languageSource->translates();

        if ($translate->where('language_id', $this->language)->first()) {
            $translate->updateExistingPivot($this->language, ['translation' => $updateValue]);
        } else {
            $newTranslate = new LanguageTranslate([
                'source_id' => $this->modelId,
                'language_id' => $this->language,
                'translation' => $updateValue
            ]);
            $newTranslate->save();
        }
        $this->afterUpdateField();
        $this->hideInput();
    }

    protected function setModel()
    {
        $this->model = LanguageSource::class;
    }

    public function render()
    {
        $models = LanguageSource::query()
            ->with('translates')
            ->join('languages', 'languages.language', '!=', 'language_sources.message')
            ->where('language', $this->language)
            ->orderBy($this->orderField, $this->order);

        if ($this->search) {
            $models->where('message', 'like', $this->search.'%');
        }

        return view('crm.livewire.translates-table', [
            'models' => $models->paginate($this->perPage)
        ]);
    }
}
