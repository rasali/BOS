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

    public function onRun()
    {

        $this->page['educations'] = $this->listEducation();

    }

    protected function listEducation()
    {

        $model = new Education();

        return $model->get();
    }
}
