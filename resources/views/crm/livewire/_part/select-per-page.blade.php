<div>
    <p class="mb-0">Показывать по: {!! Form::select('perPage', [10 => 10, 20 => 20, 50 => 50], $perPage, ['wire:ignore','wire:model' => 'perPage']) !!}</p>
</div>
