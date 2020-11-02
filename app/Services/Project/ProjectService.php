<?php


namespace App\Services\Project;


use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ProjectService
{
    protected $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function createByAdminPanel(array $data): Project
    {
        $project = $this->projectRepository->create($data);

        if (isset($data['paymentMethods'])) {
            $project->paymentMethods()->attach($data['paymentMethods']);
        }
        return $project;
    }

    public function editByAdminPanel(array $data, Project $project): Project
    {
        $project = $this->projectRepository->edit($data, $project);

        if (isset($data['paymentMethods'])) {
            $project->paymentMethods()->sync($data['paymentMethods']);
        } else {
            $project->paymentMethods()->detach();
        }

        return $project;
    }

}
