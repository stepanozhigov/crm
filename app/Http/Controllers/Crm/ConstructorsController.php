<?php

namespace App\Http\Controllers\Crm;


use App\Http\Requests\ConstructorRequest;
use App\Models\Project;
use App\Services\Constructor\ConstructorService;

class ConstructorsController extends Controller
{
    protected $constructorService;

    public function __construct(ConstructorService $constructorService)
    {
        $this->constructorService = $constructorService;
    }

    public function index()
    {
        $projects = Project::all();
        return view('crm.constructors.index', compact('projects'));
    }

    public function edit(Project $constructor)
    {
        return view('crm.constructors.edit', compact('constructor'));
    }

    public function update(ConstructorRequest $request, Project $constructor)
    {
        $validated = $request->validated();
        $this->constructorService->editConstructor($validated, $constructor);
        return redirect('constructors')->with('success', 'Изменения успешно применились!');;
    }

}
