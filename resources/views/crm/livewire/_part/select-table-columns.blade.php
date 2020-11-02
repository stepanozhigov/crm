<div class="btn-group dropleft">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Вид
    </button>
    <div class="dropdown-menu px-4 py-4">
        <h3 class="text-nowrap">Поля таблицы</h3>
        @foreach($tableColumns as $name => $col)
            <div class="form-check">
                <input wire:click="changeColumnVisibility('{{$name}}', {{(int)$col['show']}})" type="checkbox" class="form-check-input" id="column-{{$name}}" {{$col['show'] ? 'checked' : ''}}>
                <label class="form-check-label text-nowrap" for="column-id">{{$col['label']}}</label>
            </div>
        @endforeach
    </div>
</div>
