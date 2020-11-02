<?php


namespace App\Services\Page\BillPage;


use App\Models\Page;
use Arr;
use Illuminate\Database\Eloquent\Collection;

class BillPageRepository
{

    public function create(array $all, array $settings): Page
    {
        $billPage = new Page([
            'name' => $all['name'],
            'priority' => $all['priority'],
            'type' => Page::TYPE_BILL,
            'settings' => $settings
        ]);
        $billPage->save();

        return $billPage;
    }

    public function edit(array $all, Page $billPage, array $settings): Page
    {
        $billPage->fill([
            'name' => $all['name'],
            'priority' => $all['priority'],
            'type' => Page::TYPE_BILL,
            'settings' => $settings
        ])->save();

        return $billPage;
    }

    public function getAll(): Collection
    {
        return Page::query()->where(['type' => Page::TYPE_BILL])->get();
    }

    public function getBillPagesSettingsToArray(): array
    {
        return Page::where('type', Page::TYPE_BILL)->get()->toArray();
    }
}
