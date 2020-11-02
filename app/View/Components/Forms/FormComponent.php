<?php


namespace App\View\Components\Forms;


use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

abstract class FormComponent extends Component
{
    const CREATE = 'create';
    const EDIT = 'edit';

    public $model;
    public $action;

    /**
     * FormComponent constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {

        $this->model = $model;
        if ($model->id) {
            $this->action = self::EDIT;
        } else {
            $this->action = self::CREATE;
        }
    }


}
