<?php namespace Rasul\Bos\Components;

use Cms\Classes\ComponentBase;
use Rasul\Bos\Models\Education;
use Rasul\Bos\Models\Event;
use Rasul\Bos\Models\Mission;
use Rasul\Bos\Models\News;
use Rasul\Bos\Models\Slider;
use Rasul\Bos\Models\Statistic;

class HomeComponent extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Home',
            'description' => 'Home page component'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $this->page['educations'] = $this->listEducation();
        $this->page['missions'] = $this->listMission();
        $this->page['slider'] = $this->listSlider();
        $this->page['statistics'] = $this->listStatic();
        $this->page['news'] = $this->listNews();
        $this->page['events'] = $this->listEvent();
    }

    protected function listEducation()
    {
        $model = new Education();
        return $model->where('is_active', 1)->get();
    }

    protected function listMission()
    {
        $model = new Mission();
        return $model->where('is_active', 1)->get();
    }

    protected function listSlider()
    {
        $model = new Slider();
        return $model->where('is_active', 1)->get();
    }


    protected function listStatic()
    {
        $model = new Statistic();
        return $model->where('is_active', 1)->get();
    }

    protected function listNews()
    {
        $model = new News();
        return $model->where('is_active', 1)->orderBy('id','DESC')->limit(3)->get();
    }

    protected function listEvent()
    {
        $model = new Event();
        return $model->where('is_active', 1)->orderBy('id','DESC')->limit(4)->get();
    }


}
