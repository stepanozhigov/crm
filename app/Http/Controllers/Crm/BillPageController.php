<?php

namespace App\Http\Controllers\Crm;

use App\Http\Requests\BillPageRequest;
use App\Models\Page;
use App\Services\Page\BillPage\BillPageService;

class BillPageController extends Controller
{
    protected $billPageService;

    public function __construct(BillPageService $billPageService)
    {
        $this->billPageService = $billPageService;
    }

    public function index()
    {
        return view('crm.bill-pages.index');
    }

    public function create()
    {
        return view('crm.bill-pages.create');
    }

    public function store(BillPageRequest $request)
    {
        $validated = $request->validated();
        $this->billPageService->create($validated);

        return redirect('bill-page')->with('success', 'Запись успешно создана!');
    }

    public function edit(Page $billPage)
    {
        return view('crm.bill-pages.edit', compact('billPage'));
    }

    public function update(BillPageRequest $request, Page $billPage)
    {
        $validated = $request->validated();
        $this->billPageService->edit($validated, $billPage);

        return redirect('bill-page')->with('success', 'Изменения успешно применились!');
    }
}
