@php /** @var App\Models\Bill $model */ @endphp
<div>
    <!-- Button trigger modal -->
    <button onclick="$('.js-basic-multiple').select2();" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal">
        Фильтр
    </button>

    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Фильтр</h5>
                    <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        {!! Form::label('Дата от') !!}
                        {!! Form::date('date_from', null, ['id' => 'date_from']) !!}
                        {!! Form::label('Дата до') !!}
                        {!! Form::date('date_to', null, ['id' => 'date_to']) !!}
                    </div>
                    <hr>
                    <div>
                        {!! Form::label('Проекты') !!}
                        <br>
                        {!! Form::select('projects[]', $projects, $checkProjects, ['id' => 'projects', 'class' => 'form-control js-basic-multiple', 'multiple' => 'multiple']) !!}

                    </div>
                    <hr>
                    <div>
                        {!! Form::label('Группировать: ') !!}
                        {!! Form::select('group', $group, $checkGroup, ['id' => 'group']) !!}

                        <br>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    <button id="apply" type="button" class="btn btn-primary" data-dismiss="modal">Применить</button>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <table id="sortTable" class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Дата</th>
            <th scope="col">Создано</th>
            <th scope="col">Оплачено</th>
            <th scope="col">Соавторские</th>
        </tr>
        </thead>
        <tbody>

        @foreach($models as $model)
            <tr>
                <td>{{ $model['paid_at'] }}</td>
                <td>{{ number_format($model['created'],0) }} р ({{ $model['count_created'] }})</td>
                <td>{{ number_format($model['paid'], 0) }} р
                    ({{ $model['count_paid'] }})
                    ({{ $model['count_created'] == 0 ? 0 : round($model['count_paid']/$model['count_created']*100) }}%)</td>
                <td></td>
            </tr>
        @endforeach
        <tr>
            <td><b>Итого:</b></td>
            <td>{{ number_format(collect($models)->sum('created'), 0) }} р ({{ collect($models)->sum('count_created') }})</td>
            <td>{{ number_format(collect($models)->sum('paid'), 0) }} р
                ({{ collect($models)->sum('count_paid') }})
                ({{ collect($models)->sum('count_created') == 0 ? 0 : round(collect($models)->sum('count_paid')/collect($models)->sum('count_created')*100) }}%)
            </td>
            <td></td>
        </tr>
        </tbody>
    </table>
</div>

