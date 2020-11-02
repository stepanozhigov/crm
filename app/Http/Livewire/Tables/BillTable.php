<?php

namespace App\Http\Livewire\Tables;

use App\Models\Bill;
use App\Models\Coauthor;
use App\Models\Discount;
use App\Models\MailerliteGroup;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\Project;
use App\Models\Tag;
use App\Services\Bill\BillHandler;
use App\Services\Bill\BillRepository;
use App\Services\Bill\BillService;
use App\Services\Tag\TagRepository;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class BillTable extends TableComponent
{
    public $orderField = 'bills.id';
    public $active = [true, false, false, false];
    public $dateBetween;
    public $queryFilter;
    public $createdAt;
    public $email;
    public $productName;
    public $tagName;
    public $sum;
    public $billStatus;
    public $billId;
    public $clientName;
    public $tableColumns = [];
    public $disableDatesFilter = false;

    /** Extended filters */
    public $productIds;
    public $mainProductIds       = [];
    public $mainProductUpSaleIds = [];
    public $coauthorId;
    public $discountId;
    public $noDiscount = false;
    public $allDiscounts = false;
    public $contacts;
    public $paymentStatus;
    public $paymentMethods = [];
    public $formationDateMin;
    public $paidDateMin;
    public $refundDateMin;
    public $totalMin;
    public $formationDateMax;
    public $paidDateMax;
    public $refundDateMax;
    public $totalMax;
    public $mlLabelWith = false;
    public $mlLabelWithout = false;
    public $mlLabelIds = [];
    public $tagIds = [];

    /** Options for extended filters */
    public $productsList       = [];
    public $mainProductsList   = [];
    public $billStatusList     = [];
    public $paymentMethodsList = [];
    public $coauthorsList      = [];
    public $discountsList      = [];
    public $paymentStatuses    = [];
    public $mlLabels           = [];
    public $tags               = [];

    protected $queryString = [
        'queryFilter' => ['except' => 0]
    ];

    //EVENT LISTENERS
    protected $listeners = ['changeBillSum'];

    //MOUNT
    public function mount(Request $request)
    {
        parent::mount($request);
        $this->billStatusList = [
            0 => '--',
            1 => 'создан',
            2 => 'ожидается',
            3 => 'оплачен',
            4 => 'отменен',
            5 => 'возврат'
        ];

        $this->productsList       = json_encode([$this->getProductsList()]);
        $this->mainProductsList   = Product::whereType(Product::TYPE_OK)->pluck('name', 'id')->toArray();
        $this->paymentMethodsList = PaymentMethod::whereNotNull('model')->pluck('name', 'model')->toArray();
        $this->coauthorsList      = Coauthor::getCoauthors();
        $this->discountsList      = Discount::pluck('name', 'id')->toArray();
        $this->mlLabels           = Tag::findML()->pluck('name', 'id')->toArray();
        $this->tags               = Tag::findTags()->pluck('name', 'id')->toArray();
        $this->paymentStatuses = [
            Bill::STATUS_CREATED   => 'Создан',
            Bill::STATUS_WAIT      => 'Ожидание',
            Bill::STATUS_PAID      => 'Оплачен',
            Bill::STATUS_CANCELLED => 'Отменен',
            Bill::STATUS_REFUNDED  => 'Возврат',
        ];

        //add table cols for bill table
        $this->tableColumns = $request->session()->get('billTableColumns',[
            'id'          => ['label'=>'id', 'show'=>true],
            'createdAt'   => ['label'=>'Дата формирования', 'show'=>true],
            'name'        => ['label'=>'Имя', 'show'=>true],
            'contacts'    => ['label'=>'Контакты', 'show'=>true],
            'productName' => ['label'=>'Продукт', 'show'=>true],
            'billStatus'  => ['label'=>'Статус счета', 'show'=>true],
            'tag'         => ['label'=>'Тэг', 'show'=>true],
            'payment'     => ['label'=>'Оплата', 'show'=>true],
            'paid_at'     => ['label'=>'Время платежа', 'show'=>true],
            'sum'         => ['label'=>'Сумма', 'show'=>true]
        ]);
        //
        $this->dateBetween = [Carbon::today()->toDateTimeString(), Carbon::today()->modify('+1 days')->toDateTimeString()];
        $this->queryFilter = $request->queryFilter ?? 0;
        if ($this->queryFilter) {
            $this->filter($this->queryFilter);
        }
    }

    //RENDER
    public function render()
    {
        $this->emit('reload');
        $models = $this->billsWithFilters();
        $allBills = clone $models;
        $refundedBills = $this->refundedBills(clone $models);
        $waitedBills = $this->waitedBills(clone $models);
        $paidBills = $this->paidBills(clone $models);


        return view('crm.livewire.bill-table', [
            'models' => $models->paginate($this->perPage),
            'billsCount' => $allBills->count(),
            'billsSum' => $allBills->sum('bills.sum'),
            'refundedCount' => $refundedBills->count(),
            'refundedSum' => $refundedBills->sum('bills.sum'),
            'waitedCount' => $waitedBills->count(),
            'waitedSum' => $waitedBills->sum('bills.sum'),
            'paidCount' => $paidBills->count(),
            'paidSum' => $paidBills->sum('bills.sum'),
        ]);
    }

    public function changeBillSum($id, $sum)
    {
        if ($model = $this->model::find($id)) {
            $result = $model->fill(['sum' => $sum])->save();
            if ($result) {
                session()->flash('success', 'Изменения успешны!');
                return;
            }
        }

        session()->flash('error', 'Ошибка! Обновите страницу');
    }

    //Change columns visibility
    public function changeColumnVisibility(string $name, bool $show) {
        $this->tableColumns[$name]['show'] = !$show;
        session()->put('billTableColumns', $this->tableColumns);
    }

    public function pay($id)
    {
        $bill = Bill::find($id);
        if ($bill) {
            $billService = new BillService(new BillRepository(), new BillHandler(), new TagRepository());
            $billService->payFromAdminPanel($bill);
            session()->flash('success', 'Счет успешно оплачен!');
        } else {
            session()->flash('success', 'Ошибка! Обновите страницу');
        }
    }

    public function refunded($id)
    {
        if ($model = $this->model::find($id)) {
            /** @var Bill $model */
            $result = $model->fill(['invoice_status' => Bill::STATUS_REFUNDED])->save();
            if ($result) {
                session()->flash('success', 'Возврат успешен!');
                return;
            }
        }

        session()->flash('error', 'Ошибка при возврате! Обновите страницу');
    }

    protected function setModel()
    {
        $this->model = Bill::class;
    }

    public function filter($period)
    {
        $this->active = [false, false, false, false];
        $this->active[$period] = true;
        $this->queryFilter = $period;
        if (true === $this->disableDatesFilter) {
            return;
        }
        switch ($period) {
            case 0:
                $this->dateBetween = [Carbon::today()->toDateTimeString(), Carbon::today()->modify('+1 days')->toDateTimeString()];
                break;
            case 1:
                $this->dateBetween = [Carbon::yesterday()->toDateTimeString(), Carbon::yesterday()->modify('+1 days')->toDateTimeString()];
                break;
            case 2:
                $this->dateBetween = [Carbon::now()->startOfMonth()->toDateTimeString(), Carbon::now()->endOfMonth()->toDateTimeString()];
                break;
            case 3:
                $this->dateBetween = [Carbon::now()->subMonth()->startOfMonth()->toDateTimeString(), Carbon::now()->subMonth()->endOfMonth()->toDateTimeString()];
                break;
        }

        request()->query('queryFilter', $this->queryFilter);
    }

    private function refundedBills(Builder $query)
    {
        return $query->where('invoice_status', Bill::STATUS_REFUNDED);
    }

    private function waitedBills(Builder $query)
    {
        return $query->whereIn('invoice_status', [Bill::STATUS_CREATED, Bill::STATUS_WAIT]);
    }

    private function paidBills(Builder $query)
    {
        return $query->where('invoice_status', Bill::STATUS_PAID);
    }

    private function billsWithFilters()
    {
        /** @var Builder $models */
        $models = Bill::query()
            ->select(['bills.*', 'clients.name', 'clients.email', 'products.name', 'tags.name'])
            ->leftJoin('clients','bills.client_id', '=', 'clients.id')
            ->leftJoin('products','bills.product_id', '=', 'products.id')
            ->leftJoin('tags','bills.tag_id', '=', 'tags.id')
            ->leftJoin('coauthor_bill','bills.id', '=', 'coauthor_bill.bill_id')
            ->with(['products', 'client', 'product', 'tag', 'paymentSystem'])
            ->orderBy($this->orderField, $this->order);

        // Filters
        if (false === $this->disableDatesFilter) {
            $models->whereBetween('bills.created_at', $this->dateBetween);
        }
        if ($this->createdAt) {
            $models->whereDate('bills.created_at', $this->createdAt);
        }
        if ($this->email) {
            $models->where('email', 'like', "%$this->email%");
        }
        if ($this->productName) {
            $models->where('products.name', 'like', "%$this->productName%");
        }
        if ($this->tagName) {
            $models->where('tags.name', 'like', "%$this->tagName%");
        }
        if ($this->billId) {
            $models->where('bills.id', $this->billId);
        }
        if ($this->clientName) {
            $models->where('clients.name', 'like', "%$this->clientName%");
        }
        if ($this->billStatus) {
            $models->where('bills.invoice_status', $this->billStatus);
        }
        if ($this->sum) {
            $models->where('bills.sum', $this->sum);
        }
        // Extended filters
        if ($this->productIds) {
            $this->productIds = explode(',', $this->productIds);
            $models->whereIn('bills.product_id', $this->productIds);
            $this->productIds = implode(',', $this->productIds);
        }
        if ($this->mainProductIds) {
            $models->whereIn('product_id', $this->mainProductIds)
                ->whereDoesntHave('upSales');
        }
        if ($this->mainProductUpSaleIds) {
            $models->whereIn('product_id', $this->mainProductUpSaleIds)
                ->whereHas('upSales');
        }
        if ($this->coauthorId) {
            $models->where('coauthor_bill.coauthor_id', $this->coauthorId);
        }
        if ($this->discountId) {
            $models->where('discount_id', $this->discountId);
        }
        if ($this->noDiscount) {
            $models->whereNull('discount_id');
        }
        if ($this->allDiscounts) {
            $models->whereNotNull('discount_id');
        }
        $this->contacts = trim($this->contacts);
        if ($this->contacts) {
            $models->where(function (Builder $query) {
                $query->where('email', 'like', "%$this->contacts%");
                $query->orWhere('phone', 'like', "%$this->contacts%");
            });
        }
        if ($this->paymentStatus) {
            $models->where('invoice_status', $this->paymentStatus);
        }
        if ($this->paymentMethods) {
            $models->whereIn('payment_system_type', $this->paymentMethods);
        }
        if ($this->formationDateMin) {
            $models->whereDate('bills.created_at', '>=', $this->formationDateMin);
        }
        if ($this->formationDateMax) {
            $models->whereDate('bills.created_at', '<=', $this->formationDateMax);
        }
        if ($this->paidDateMin) {
            $models->whereDate('paid_at', '>=', $this->paidDateMin);
        }
        if ($this->paidDateMax) {
            $models->whereDate('paid_at', '<=', $this->paidDateMax);
        }
        if ($this->refundDateMin) {
            $models->where('bills.updated_at', '>=', $this->refundDateMin)
                ->where('invoice_status', Bill::STATUS_REFUNDED);
            ;
        }
        if ($this->refundDateMax) {
            $models->where('bills.updated_at', '<=', $this->refundDateMax)
                ->where('invoice_status', Bill::STATUS_REFUNDED);
            ;
        }
        if ($this->totalMin) {
            $models->where('bills.sum', '>=', $this->totalMin);
        }
        if ($this->totalMax) {
            $models->where('bills.sum', '<=', $this->totalMax);
        }
        if ($this->mlLabelWith) {
            $models->where('tags.is_ml', true);
        }
        if ($this->mlLabelWithout) {
            $models->where('tags.is_ml', false);
        }
        if ($this->mlLabelIds) {
            $models->whereIn('bills.tag_id', $this->mlLabelIds);
        }
        if ($this->tagIds) {
            $models->whereIn('bills.tag_id', $this->tagIds);
        }

        return $models;
    }

    /**
     * Handle filter search button
     *
     * @param array $productIds  Data from custom tree input
     * 
     * @return void
     */
    public function search()
    {
        $this->disableDatesFilter = true;
        $this->emit('search');
    }

    /**
     * Handle filter clear button
     *
     * @return void
     */
    public function clear()
    {
        $this->disableDatesFilter = false;
        $this->filter($this->queryFilter);
        $this->emit('clear');
        $this->reset([
            'billId',
            'createdAt',
            'clientName',
            'email',
            'productName',
            'billStatus',
            'tagName',
            'sum',
            'productIds',
            'mainProductIds',
            'mainProductUpSaleIds',
            'coauthorId',
            'discountId',
            'noDiscount',
            'allDiscounts',
            'contacts',
            'paymentStatus',
            'paymentMethods',
            'formationDateMin',
            'paidDateMin',
            'refundDateMin',
            'totalMin',
            'formationDateMax',
            'paidDateMax',
            'refundDateMax',
            'totalMax',
            'mlLabelWith',
            'mlLabelWithout',
            'mlLabelIds',
            'tagIds',
        ]);
    }

    /**
     * Get products nested array tree for filter
     *
     * @return array
     */
    private function getProductsList(): array
    {
        $items = [];

        /** @var Project[] */
        $projects = Project::get()->pluck('name', 'id');
        $products = Product::get()->groupBy(['project_id', 'type']);

        foreach ($products as $projectId => $types) {
            $typeItems = [];
            foreach ($types as $type => $products) {
                $prodItems = [];
                foreach ($products as $product) {
                    /** @var Product $product */
                    $prodItem = [
                        'id'      => $product->id,
                        'text'    => htmlspecialchars(sprintf('[%s] %s', $product->page_bill, $product->name)),
                    ];
                    $prodItems[] = $prodItem;
                }
                $typeItem = [
                    'id'       => 0,
                    'text'     => $this->getTypeLabel($type),
                    'children' => $prodItems,
                ];
                $typeItems[] = $typeItem;
            }
            $catItem = [
                'id'       => 0,
                'text'     => $projects[$projectId],
                'children' => $typeItems,
            ];
            $items[] = $catItem;
        }

        return [
            'id'       => 0,
            'text'     => 'Все',
            'children' => $items,
        ];
    }

    /**
     * Get type label for filter
     *
     * @param int $type
     *
     * @return string
     */
    private function getTypeLabel(int $type): string
    {
        return [
            Product::TYPE_OK        => 'Основной курс',
            Product::TYPE_SK        => 'Специальные курсы',
            Product::TYPE_CONSULT   => 'Консультации',
            Product::TYPE_CONSTRUCT => 'Пакеты',
            Product::TYPE_OTHER     => 'Другое',
        ][$type] ?? '';
    }
}
