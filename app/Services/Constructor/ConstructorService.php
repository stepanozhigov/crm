<?php


namespace App\Services\Constructor;


use App\Models\Project;

class ConstructorService
{
    protected $constructorRepository;

    public function __construct(ConstructorRepository $constructorRepository)
    {
        $this->constructorRepository = $constructorRepository;
    }

    public function editConstructor(array $data, Project $constructor)
    {
        if (!isset($data['products']) || isset($data['inactive'])) {
            $constructor->productsForConstructor()->detach();
            $constructor->constructor_settings = null;
        } else {
            $constructor->productsForConstructor()->sync($data['products']);
            $constructor->constructor_settings = $data['settings'];

        }

        $constructor->save();
    }


}
