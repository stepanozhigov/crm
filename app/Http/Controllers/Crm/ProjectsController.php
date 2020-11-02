<?php

namespace App\Http\Controllers\Crm;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use App\Services\Project\ProjectService;

class ProjectsController extends Controller
{

    private $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    public function index()
    {
        $projects = Project::all();

        return view('crm.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('crm.projects.create');
    }

    public function store(ProjectRequest $request)
    {
        $validated = $request->validated();
        $this->projectService->createByAdminPanel($validated);

        return redirect('projects')->with('success', 'Запись успешно создана!');
    }

    public function edit(Project $project)
    {
        return view('crm.projects.edit', compact('project'));
    }

    public function update(ProjectRequest $request, Project $project)
    {
        $validated = $request->validated();
        $this->projectService->editByAdminPanel($validated, $project);

        return redirect('projects')->with('success', 'Изменения успешно применились!');
    }

}
