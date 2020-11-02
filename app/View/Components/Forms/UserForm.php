<?php

namespace App\View\Components\Forms;

use App\Models\User;
use Spatie\Permission\Models\Permission;

class UserForm extends FormComponent
{
    public $permissions;
    public $userPermissions;

    public function __construct(User $model = null)
    {
        parent::__construct($model ?: new User());
        $this->permissions = Permission::pluck('name', 'id');
        $this->userPermissions = $model ? $model->permissions->pluck('id')->toArray() : [];
    }

    public function render()
    {
        return view('crm.components.forms.user-form');
    }
}
