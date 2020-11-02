<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bills-filter">
    Фильтр
</button>

<div class="modal" id="bills-filter">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group wrapper-products">
                            <div id="products"></div>
                            {!! Form::hidden('productIds', $productIds, ['wire:model.defer' => 'productIds']) !!}
                        </div>

                        <div class="form-group p-2">
                            <button type="button" class="btn btn-outline-light text-dark" data-toggle="collapse" data-target="#main">Основные продукты:</button>
                            <div id="main" class="collapse">
                                @foreach ($mainProductsList as $id => $name)
                                <div>
                                    {!! Form::checkbox('mainProductIds[]', $id, in_array($id, $mainProductIds), ['id' => 'mainProduct' . $loop->index, 'wire:model.defer' => 'mainProductIds']) !!}
                                    <label for="mainProduct{{ $loop->index }}" class="control-label">{{ $name }}</label>
                                </div>
                                @endforeach
                            </div>

                            <button type="button" class="btn btn-outline-light text-dark mt-3" data-toggle="collapse" data-target="#upsale">Счета с допродажами:</button>
                            <div id="upsale" class="collapse">
                                @foreach ($mainProductsList as $id => $name)
                                <div>
                                    {!! Form::checkbox('mainProductUpSaleIds[]', $id, in_array($id, $mainProductUpSaleIds), ['id' => 'mainProductUpSale' . $loop->index, 'wire:model.defer' => 'mainProductUpSaleIds']) !!}
                                    <label for="mainProductUpSale{{ $loop->index }}" class="control-label">{{ $name }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group p-2">
                            <label class="control-label">Соавтор:</label>
                            {!! Form::select('coauthorId', $coauthorsList, $coauthorId, ['class' => 'form-control', 'placeholder' => 'Не выбрано', 'wire:model.defer' => 'coauthorId']) !!}

                            <label class="control-label">Скидка:</label>
                            {!! Form::select('discountId', $discountsList, $discountId, ['class' => 'form-control', 'placeholder' => 'Не выбрано', 'wire:model.defer' => 'discountId']) !!}
                        </div>

                        <div class="form-group p-2">
                            <div>
                                {!! Form::checkbox('noDiscount', $noDiscount, $noDiscount, ['id' => 'noDiscount', 'wire:model.defer' => 'noDiscount']) !!}
                                <label for="noDiscount" class="control-label">Без скидки</label>
                            </div>
                            <div>
                                {!! Form::checkbox('allDiscounts', $allDiscounts, $allDiscounts, ['id' => 'allDiscounts', 'wire:model.defer' => 'allDiscounts']) !!}
                                <label for="allDiscounts" class="control-label">Все скидки</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label class="control-label">Поиск по контактам</label>
                            {!! Form::text('contacts', $contacts, ['class' => 'form-control', 'wire:model.defer' => 'contacts']) !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label">Статус оплаты</label>
                            {!! Form::select('paymentStatus', $paymentStatuses, $paymentStatus, ['class' => 'form-control', 'placeholder' => 'Все', 'wire:model.defer' => 'paymentStatus']) !!}
                        </div>

                        <div class="card p-2">
                            <label class="control-label">Метод оплаты</label>
                            @foreach ($paymentMethodsList as $id => $method)
                            <div>
                                {!! Form::checkbox('paymentMethods[]', $id, in_array($id, $paymentMethods), ['id' => 'payment' . $loop->index, 'wire:model.defer' => 'paymentMethods']) !!}
                                <label for="payment{{ $loop->index }}" class="control-label">{{ $method }}</label>
                            </div>
                            @endforeach
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label">Дата формирования с</label>
                                    {!! Form::date('formationDateMin', $formationDateMin, ['class' => 'form-control', 'wire:model.defer' => 'formationDateMin']) !!}
                                 </div>
                                <div class="form-group">
                                    <label class="control-label">Дата оплаты с</label>
                                    {!! Form::date('paidDateMin', $paidDateMin, ['class' => 'form-control', 'wire:model.defer' => 'paidDateMin']) !!}
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Дата возврата с</label>
                                    {!! Form::date('refundDateMin', $refundDateMin, ['class' => 'form-control', 'wire:model.defer' => 'refundDateMin']) !!}
                                </div>        
                                <div class="form-group">
                                    <label class="control-label">Минимальная сумма</label>
                                    {!! Form::text('totalMin', $totalMin, ['class' => 'form-control', 'wire:model.defer' => 'totalMin']) !!}
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label">Дата формирования по</label>
                                    {!! Form::date('formationDateMax', $formationDateMax, ['class' => 'form-control', 'wire:model.defer' => 'formationDateMax']) !!}
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Дата оплаты по</label>
                                    {!! Form::date('paidDateMax', $paidDateMax, ['class' => 'form-control', 'wire:model.defer' => 'paidDateMax']) !!}
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Дата возврата по</label>
                                    {!! Form::date('refundDateMax', $refundDateMax, ['class' => 'form-control', 'wire:model.defer' => 'refundDateMax']) !!}
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Максимальная сумма</label>
                                    {!! Form::text('totalMax', $totalMax, ['class' => 'form-control', 'wire:model.defer' => 'totalMax']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="row my-4">
                            <button type="button" class="btn btn-primary mr-2" wire:click='search'>Искать</button>
                            <button type="button" class="btn btn-secondary" wire:click='clear'>Очистить</button>
                        </div>

                        <div class="form-group">
                            <div>
                                {!! Form::checkbox('mlLabelWith', $mlLabelWith, $mlLabelWith, ['id' => 'mlLabelWith', 'wire:model.defer' => 'mlLabelWith']) !!}
                                <label for="mlLabelWith" class="control-label">С меткой ML</label>
                            </div>
                            <div>
                                {!! Form::checkbox('mlLabelWithout', $mlLabelWithout, $mlLabelWithout, ['id' => 'mlLabelWithout', 'wire:model.defer' => 'mlLabelWithout']) !!}
                                <label for="mlLabelWithout" class="control-label">Без метки ML</label>
                            </div>

                            <button type="button" class="btn btn-outline-light text-dark" data-toggle="collapse" data-target="#labels">ML Метки</button>
                            <div id="labels" class="collapse">
                                @foreach ($mlLabels as $id => $label)
                                <div>
                                    {!! Form::checkbox('mlLabelIds[]', $id, in_array($id, $mlLabelIds), ['id' => 'mlLabel' . $loop->index, 'wire:model.defer' => 'mlLabelIds']) !!}
                                    <label for="mlLabel{{ $loop->index }}" class="control-label">{{ $label }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="button" class="btn btn-outline-light text-dark" data-toggle="collapse" data-target="#tags">Теги</button>
                            <div id="tags" class="collapse">
                                @foreach ($tags as $id => $tag)
                                <div>
                                    {!! Form::checkbox('tagIds[]', $id, in_array($id, $tagIds), ['id' => 'tag' . $loop->index, 'wire:model.defer' => 'tagIds']) !!}
                                    <label for="tag{{ $loop->index }}" class="control-label">{{ $tag }}</label>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('adminlte_js')
    @parent
    <script type="text/javascript">
        const products = JSON.parse('<?= $productsList ?>');
        let productIds = [];

        function initProductTree(data) {
            const tree = $('#products').tree({
                primaryKey: 'id',
                uiLibrary: 'bootstrap4',
                dataSource: data,
                checkboxes: true,
            });
            var node = tree.getNodeById(0);
            tree.expand(node);
            productIds.forEach((id) => {
                const item = tree.getNodeById(id);
                tree.check(item);
            });

            tree.on('checkboxChange', function (e, node, id) {
                productIds = tree.getCheckedNodes().filter(item => item !== 0);
                const input = document.getElementsByName("productIds")[0];
                input.value = productIds;
                input.dispatchEvent(new Event("input"));
            });
        }

        Livewire.on('clear', () => {
            $('#bills-filter').modal('hide');
            $('#bills-filter').modal('show');
            productIds = [];
        });
        Livewire.on('search', () => {
            $('#bills-filter').modal('hide');
        });
        Livewire.on('reload', () => {
            initProductTree(products);
        });
     
        $(document).ready(function() {
            initProductTree(products);
        });
    </script>
    @stack('js')
    @yield('js')
@stop
