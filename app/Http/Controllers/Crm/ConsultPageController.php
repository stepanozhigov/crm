<?php

namespace App\Http\Controllers\Crm;

use App\Http\Requests\ConsultPageRequest;
use App\Models\Page;
use App\Services\Page\ConsultPage\ConsultPageService;


class ConsultPageController extends Controller
{
    private $consultPageService;

    public function __construct(ConsultPageService $consultPageService)
    {
        $this->consultPageService = $consultPageService;
    }

    public function index()
    {
        return view('crm.consult-pages.index');
    }

    public function create()
    {
        return view('crm.consult-pages.create');
    }

    public function store(ConsultPageRequest $request)
    {
        $validated = $request->validated();
        $this->consultPageService->createByAdminPanel($validated);

        return redirect('consult-page')->with('success', 'Запись успешно создана!');
    }

    public function edit(Page $consultPage)
    {
        return view('crm.consult-pages.edit', compact('consultPage'));
    }

    public function update(ConsultPageRequest $request, Page $consultPage)
    {
        $validated = $request->validated();
        $this->consultPageService->editByAdminPanel($validated, $consultPage);

        return redirect('consult-page')->with('success', 'Изменения успешно применились!');
    }
}
