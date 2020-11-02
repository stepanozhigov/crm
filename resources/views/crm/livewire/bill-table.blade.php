@php /** @var \App\Models\Bill $model */@endphp
<div>

    {{--  Показать флеш сессии success, error  --}}
    @include('crm.components.flash-message')

    {{--  EDIT CELL VALUE ON CLICK  --}}
    {{-- $updateValue: новое значение стоимости заказа   --}}
    {{-- $editInputDisplay: значение класса видимости модального контейнера  --}}
    {{-- wire:click="hideInput": кнопка скрыть  --}}
    @include('crm.livewire._part.edit-field-modal')
    {{--  /EDIT CELL VALUE ON CLICK  --}}

    <div class="container mb-4">

        {{--  СТАТИСТИКА СЧЕТОВ  --}}
        <div class="row mb-4" style="font-size: 24px">
            <div class="col-3">
                <div class="card text-center mb-0">
                    <h5 class="text-bold">Счетов: {{ $billsCount }}</h5>
                    <p class="card-text">{{ number_format($billsSum, 0, ',', ' ') }} ₽ </p>
                </div>
            </div>
            <div class="col-3">
                <div class="card text-center mb-0">
                    <h5 class="text-bold">Ожидается: {{ $waitedCount }}</h5>
                    <p class="card-text">{{ number_format($waitedSum, 0, ',', ' ') }} ₽ </p>
                </div>
            </div>
            <div class="col-3">
                <div class="card text-center mb-0">
                    <h5 class="text-bold">Оплачено: {{ $paidCount }}</h5>
                    <p class="card-text">{{ number_format($paidSum, 0, ',', ' ') }} ₽ </p>
                </div>
            </div>
            <div class="col-3">
                <div class="card text-center mb-0">
                    <h5 class="text-bold">Возвраты: {{ $refundedCount }}</h5>
                    <p class="card-text">{{ number_format($refundedSum, 0, ',', ' ') }} ₽ </p>
                </div>
            </div>
        </div>
        {{--  / СТАТИСТИКА СЧЕТОВ  --}}

        <div class="row">
            <div class="col-8">
                {{--  FILTER BY PERIOD: Сегодня, Вчера, Этот Месяц, Прошлый Месяц  --}}
                {{--  click: App\Http\Livewire\TablesBillTable:class->filter()  --}}
                <div class="btn-toolbar justify-content-between m-0" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group" role="group" aria-label="First group">
                        @php $class = $disableDatesFilter ? 'btn-secondary' : 'btn-primary' @endphp
                        <button wire:click="filter(0)" type="button" class="btn {{ $class }} {{ $active[0] ? 'active' : '' }}">Сегодня</button>
                        <button wire:click="filter(1)" type="button" class="btn {{ $class }} {{ $active[1] ? 'active' : '' }}">Вчера</button>
                        <button wire:click="filter(2)" type="button" class="btn {{ $class }} {{ $active[2] ? 'active' : '' }}">Этот месяц</button>
                        <button wire:click="filter(3)" type="button" class="btn {{ $class }} {{ $active[3] ? 'active' : '' }}">Прошлый месяц</button>
                    </div>
                </div>
                {{--  /FILTER BY PERIOD: Сегодня, Вчера, Этот Месяц, Прошлый Месяц  --}}
            </div>
            <div class="col-4 d-flex justify-content-between align-items-center">
                {{--  SELECT RECORDS PER PAGE  --}}
                {{--  wire:model' => 'perPage' : селектор устанавливает значение --}}
                @include('crm.livewire._part.select-per-page')
                {{--  /SELECT RECORDS PER PAGE  --}}

                {{--  BS button dropdown: выбор отображаемых столбцов таблицы   --}}
                @include('crm.livewire._part.select-table-columns')
                {{--  / BS button dropdown: выбор отображаемых столбцов таблицы   --}}

                {{--  Модальное окно фильтров  --}}
                @include('crm.livewire._part.bills-filter-modal')
                {{--  / Модальное окно фильтров   --}}
            </div>
        </div>
    </div>

    {{--  BILL TABLE  --}}
    <table id="sortTable" class="table table-striped">

        {{--   ЗАГОЛОВКИ СТОЛБЦОВ ТАБЛИЦЫ С ПОЛЯМИ ФИЛЬТРАЦИИ  --}}
        <thead>
            <tr class="child-align-top">
                    @if(array_key_exists('id', $tableColumns) && $tableColumns['id']['show'])
                        <th scope="col">{{$tableColumns['id']['label']}}
                            <p><input wire:model.lazy="billId" type="text" class="table-search-input form-control"></p>
                        </th>
                    @endif
                    @if(array_key_exists('createdAt', $tableColumns) && $tableColumns['createdAt']['show'])
                    <th scope="col">{{$tableColumns['createdAt']['label']}}
                        <p><input wire:model.lazy="createdAt" type="date" class="table-search-input form-control"></p>
                    </th>
                    @endif
                    @if(array_key_exists('name', $tableColumns) && $tableColumns['name']['show'])
                        <th scope="col">{{$tableColumns['name']['label']}}
                            <p><input wire:model.lazy="clientName" type="text" class="table-search-input form-control"></p>
                        </th>
                    @endif
                    @if(array_key_exists('contacts', $tableColumns) && $tableColumns['contacts']['show'])
                        <th scope="col">{{$tableColumns['contacts']['label']}}
                            <p><input wire:model.lazy="email" type="text" class="table-search-input form-control"></p>
                        </th>
                    @endif
                    @if(array_key_exists('productName', $tableColumns) && $tableColumns['productName']['show'])
                        <th scope="col">{{$tableColumns['productName']['label']}}
                            <p><input wire:model.lazy="productName" type="text" class="table-search-input form-control"></p>
                        </th>
                    @endif
                    @if(array_key_exists('billStatus', $tableColumns) && $tableColumns['billStatus']['show'])
                        <th scope="col">{{$tableColumns['billStatus']['label']}}
                            <p>
                                {!! Form::select('', $billStatusList, 0, ['class' => 'table-search-input form-control', 'wire:model' => 'billStatus']) !!}
                            </p>
                        </th>
                    @endif
                    @if(array_key_exists('tag', $tableColumns) && $tableColumns['tag']['show'])
                        <th scope="col">{{$tableColumns['tag']['label']}}
                            <p><input wire:model.lazy="tagName" type="text" class="table-search-input form-control"></p>
                        </th>
                    @endif
                    @if(array_key_exists('payment', $tableColumns) && $tableColumns['payment']['show'])
                        <th scope="col">{{$tableColumns['payment']['label']}}</th>
                    @endif
                    @if(array_key_exists('paid_at', $tableColumns) && $tableColumns['paid_at']['show'])
                        <th scope="col">{{$tableColumns['paid_at']['label']}}
                            <p><x-sorted-arrows field="paid_at" /></p>
                        </th>
                    @endif
                    @if(array_key_exists('sum', $tableColumns) && $tableColumns['sum']['show'])
                        <th scope="col">{{$tableColumns['sum']['label']}}
                            <p><input wire:model.lazy="sum" type="text" class="table-search-input form-control"></p>
                        </th>
                    @endif
            </tr>
        </thead>
        {{--   / ЗАГОЛОВКИ СТОЛБЦОВ ТАБЛИЦЫ С ПОЛЯМИ ФИЛЬТРАЦИИ  --}}

        {{--   ТАБЛИЦА СЧЕТОВ  --}}
        <tbody>
            @foreach($models as $model)
                {{--  РЯД ДАННЫХ   --}}
                <tr data-toggle="collapse" data-target="#actions-{{$model->id}}">
                        @if(array_key_exists('id', $tableColumns) && $tableColumns['id']['show'])
                            <th scope="row" style="">{{$model->id}}</th>
                        @endif
                        @if(array_key_exists('createdAt', $tableColumns) && $tableColumns['createdAt']['show'])
                            <td>{{$model->created_at}}</td>
                        @endif
                        @if(array_key_exists('name', $tableColumns) && $tableColumns['name']['show'])
                            <td>{{$model->client ? $model->client->name : 'Клиент удален'}}</td>
                        @endif
                        @if(array_key_exists('contacts', $tableColumns) && $tableColumns['contacts']['show'])
                            <td><p>{{ $model->client ? $model->client->email : 'Клиент удален'}}</p><p>{{$model->client ? $model->client->phone : ''}}</p></td>
                        @endif
                        @if(array_key_exists('productName', $tableColumns) && $tableColumns['productName']['show'])
                            <td><span>{{$model->product->name}} </span></br> {!! App\Helpers\BillHelper::getNamesListProducts($model->products) !!}</td>
                        @endif
                        @if(array_key_exists('billStatus', $tableColumns) && $tableColumns['billStatus']['show'])
                            <td>{!! App\Helpers\BillHelper::getInvoiceStatusLabel($model->invoice_status, $model->getIdHash()) !!}</td>
                        @endif
                        @if(array_key_exists('tag', $tableColumns) && $tableColumns['tag']['show'])
                            <td>{{ $model->tag ? $model->tag->name : ''}}</td>
                        @endif
                        @if(array_key_exists('payment', $tableColumns) && $tableColumns['payment']['show'])
                            <td>{{ App\Helpers\BillHelper::getPaymentName($model->paymentSystem) }}</td>
                        @endif
                        @if(array_key_exists('paid_at', $tableColumns) && $tableColumns['paid_at']['show'])
                            <td>{{$model->paid_at}}</td>
                        @endif
                        @if(array_key_exists('sum', $tableColumns) && $tableColumns['sum']['show'])
                            <td>{{ $model->sum }}</td>
                        @endif
                </tr>
                {{--  / РЯД ДАННЫХ   --}}

                {{--  РЯД ДЕЙСТВИЙ   --}}
                <tr class="collapse" id="actions-{{$model->id}}">
                    <td colspan="9">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-1">
                                    <div class="d-flex align-items-center h-100">
                                        <p class="text-bold m-0">
                                            Действия:
                                        </p>
                                    </div>
                                </div>
                                <div class="col-11">
                                    <div class="d-flex justify-content-around">
                                        <div>
                                            @if ($model->client !== null)
                                                <a href="{{route('crm.clients.edit',[$model->client->id])}}" class="btn btn-primary">Изменить Клиента</a>
                                            @endif
                                        </div>

                                        <div>
                                            <button wire:click="pay({{$model->id}})" class="btn btn-success">Оплатить id: {{ $model->id }}</button>
                                        </div>

                                        <div>
                                            <div class="input-group">
                                                <input id="changeBillSum-{{$model->id}}" type="number" class="form-control" placeholder="Стоимость заказа...">
                                                <div class="input-group-append">
                                                    <button onclick="changeBillSum({{$model->id}})" class="btn btn-secondary" type="button">Изменить</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <button wire:click="refunded({{$model->id}})" class="btn btn-primary">Возврат</button>
                                        </div>

                                        <div>
                                            <button onclick="confirm('Уверены что хотите удалить?') || event.stopImmediatePropagation()"
                                                    wire:click="delete({{$model->id}})" class="btn btn-danger">Удалить</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                {{--  / РЯД ДЕЙСТВИЙ   --}}

            @endforeach
        </tbody>
        {{--   / ТАБЛИЦА СЧЕТОВ  --}}

    </table>
    {{--  //BILL TABLE  --}}
    {{ $models->links() }}
</div>
