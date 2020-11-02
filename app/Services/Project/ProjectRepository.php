<?php


namespace App\Services\Project;


use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ProjectRepository
{

    public function create(array $data): Project
    {
        $project = new Project($data);
        $project->save();

        return $project;
    }

    public function edit(array $data, Project $project): Project
    {
        $project->fill($data)->save();

        return $project;
    }

}
