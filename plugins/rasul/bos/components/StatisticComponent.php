<?php namespace Rasul\Bos\Components;

use Cms\Classes\ComponentBase;
use Rasul\Bos\Models\Statistic;

class StatisticComponent extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'StatisticComponent Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {

        $this->page['statistics'] = $this->listStatistic();

    }

    protected function listStatistic()
    {

        $model = new Statistic();

        return $model->get();
    }
}
