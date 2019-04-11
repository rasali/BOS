<?php namespace Rasul\Bos\Components;

use Cms\Classes\ComponentBase;
use Rasul\Bos\Models\Education;

class EducationComponent extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'EducationComponent Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }
}
