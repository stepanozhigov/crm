<?php


namespace App\Services\Page\ConsultPage;


use App\Models\Page;
use Illuminate\Database\Eloquent\Collection;

class ConsultPageRepository
{

    public function create(array $data): Page
    {
        $consultPage = new Page($data);
        $consultPage->save();

        return $consultPage;
    }

    public function edit(array $data, Page $consultPage): Page
    {
        $consultPage->fill($data)->save();
        return $consultPage;
    }

    public function getAll(): Collection
    {
        return Page::where('type', Page::TYPE_CONSULT)->get();
    }
}
