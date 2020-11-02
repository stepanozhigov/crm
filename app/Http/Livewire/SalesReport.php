<?php

namespace App\Http\Livewire;

use App\Models\Bill;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Livewire\Component;

class SalesReport extends Component
{
    const GROUP_DAYS = 0;
    const GROUP_WEEKS = 1;
    const GROUP_MONTH = 2;

    public $projects;
    public $checkProjects;
    public $group;
    public $checkGroup;
    public $dateBetween;
    protected $listeners = ['apply'];

    public function mount(Request $request)
    {
        $this->projects = \App\Models\Project::pluck('name', 'id')->all();
        $this->checkProjects = array_keys($this->projects);
        $this->group = [0 => 'По Дням'];
//        $this->group = [0 => 'По Дням', 1 => 'По неделям', 2 => 'По месяцам'];
        $this->checkGroup = 0;
        $this->dateBetween = [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()];
    }

    public function apply($inputs)
    {
        if (!empty($inputs['date_from']) && !empty($inputs['date_to'])) {
            $this->dateBetween = [Carbon::parse($inputs['date_from']), Carbon::parse($inputs['date_to'])];
        }

        if (!empty($inputs['projects'])) {
            $this->checkProjects = $inputs['projects'];
        }

        if (!empty($inputs['group'])) {
            $this->checkGroup = $inputs['group'];
        }
    }

    public function render()
    {
        if ($this->checkGroup == self::GROUP_DAYS) {
            $periods = CarbonPeriod::create($this->dateBetween[0], $this->dateBetween[1])->toArray();
            foreach (array_reverse($periods) as $period) {
                $model['paid_at'] = $period->format('d-m-Y');
                $model['paid'] = Bill::query()
                    ->select(['bills.*', 'products.project_id'])
                    ->leftJoin('products', 'products.id', '=', 'bills.product_id' )
                    ->whereIn('project_id', $this->checkProjects)
                    ->where('invoice_status', Bill::STATUS_PAID)
                    ->whereBetween('paid_at', [Carbon::parse($period)->startOfDay(), Carbon::parse($period)->endOfDay()])
                    ->sum('sum');
                $model['created'] = Bill::query()
                    ->select(['bills.*', 'products.project_id'])
                    ->leftJoin('products', 'products.id', '=', 'bills.product_id' )
                    ->whereIn('project_id', $this->checkProjects)
                    ->whereBetween('bills.created_at', [Carbon::parse($period)->startOfDay(), Carbon::parse($period)->endOfDay()])
                    ->sum('sum');
                $model['count_paid'] = Bill::query()
                    ->select(['bills.*', 'products.project_id'])
                    ->leftJoin('products', 'products.id', '=', 'bills.product_id' )
                    ->whereIn('project_id', $this->checkProjects)
                    ->where('invoice_status', Bill::STATUS_PAID)
                    ->whereBetween('paid_at', [Carbon::parse($period)->startOfDay(), Carbon::parse($period)->endOfDay()])
                    ->count();
                $model['count_created'] = Bill::query()
                    ->select(['bills.*', 'products.project_id'])
                    ->leftJoin('products', 'products.id', '=', 'bills.product_id' )
                    ->whereIn('project_id', $this->checkProjects)
                    ->whereBetween('bills.created_at', [Carbon::parse($period)->startOfDay(), Carbon::parse($period)->endOfDay()])
                    ->count();
                $models[] = $model;
            }
        }

        return view('crm.livewire.sales-report', [
            'models' => $models
        ]);
    }
}
