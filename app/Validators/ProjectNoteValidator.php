<?php
/**
 * Created by PhpStorm.
 * User: clecio
 * Date: 23/07/2015
 * Time: 22:37
 */

namespace CodeProject\Validators;


use Prettus\Validator\LaravelValidator;

class ProjectNoteValidator extends LaravelValidator
{
    protected $rules = [
        'project_id' => 'required',
        'title' =>  'required',
        'note' => 'required',
    ];
}