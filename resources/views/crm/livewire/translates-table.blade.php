@php /** @var $model \App\Models\LanguageSource */ @endphp

<div>
    @include('crm.livewire._part.edit-field-modal')
    @include('crm.components.flash-message')
    @include('crm.livewire._part.select-per-page')
    Язык перевода : {{ Form::select('language', $languages, 'en', ['id' => 'language', 'wire:model' => 'language']) }}
    <br>
    <br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Исходный <span><input type="text" wire:model="search"></span>
                <x-sorted-arrows field="message" />
            </th>
            <th scope="col">Язык</th>
            <th scope="col">Перевод
                <span style="cursor: pointer;">
                   <small style="@if(!$this->checkTranslate) font-weight: bold; @endif" wire:click="checkTranslate(0)">(Без перевода)</small>
                   <small style="@if($this->checkTranslate) font-weight: bold; @endif" wire:click="checkTranslate(1)">(Все)</small>
                </span>
            </th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($models as $model)
            @php
                $translate = \App\Helpers\TranslatesHelper::getTranslateForTable($model, $language);
            @endphp
            @if(!$checkTranslate && $translate)
                @continue
            @endif
            <tr>
                <td> {{ Str::limit($model->message, 120) }}</td>
                <td>{{$model->language}}</td>
                <td class="editableField"
                    wire:click="editInput('{{ $translate }}', 'translation', {{$model->id}})">
                    {{ Str::limit($translate, 120) }}
                </td>
                <td>
                    <button onclick="confirm('Уверены что хотите удалить?') || event.stopImmediatePropagation()"
                            wire:click="delete({{ $model->id }})" class="btn btn-danger">Удалить</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $models->links() }}
</div>

