<?php

namespace App\Http\Controllers\Crm;

use App\Http\Requests\WebinarRequest;
use App\Models\Webinar;
use App\Services\Webinar\WebinarService;

class WebinarsController extends Controller
{
    protected $webinarService;
    public function __construct(WebinarService $webinarService)
    {
        $this->webinarService = $webinarService;
    }

    public function index()
    {
        $webinars = Webinar::all();
        return view('crm.webinars.index', compact('webinars'));
    }

    public function create()
    {
        return view('crm.webinars.create');
    }

    public function store(WebinarRequest $request)
    {
       $validated = $request->validated();
       $this->webinarService->createByAdminPanel($validated);

       return redirect('webinars')->with('success', 'Запись успешно создана!');
    }

    public function edit(Webinar $webinar)
    {
        return view('crm.webinars.edit', compact('webinar'));
    }

    public function update(WebinarRequest $request, Webinar $webinar)
    {
        $validated = $request->validated();
        $this->webinarService->editByAdminPanel($validated, $webinar);

        return redirect('webinars')->with('success', 'Изменения успешно применились!');
    }

}
