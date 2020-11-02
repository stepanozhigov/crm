<div style="display: {{ $editInputDisplay }};" class="edit-modal">
    <textarea id="editInput"  cols="30" rows="3">{{ $updateValue }}</textarea>
    <button id="updateInputButton">Редактировать</button>
    <button wire:click="hideInput">Отмена</button>
</div>
