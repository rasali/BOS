<?php namespace Rasul\Bos\Components;

use Cms\Classes\ComponentBase;
use Rasul\Bos\Models\Slider;

class SliderComponent extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'SliderComponent Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }


    public function onRun()
    {

        $this->page['slider'] = $this->listSlider();

    }

    protected function listSlider()
    {

        $model = new Slider();

        return $model->get();

    }
}
