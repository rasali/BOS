<?php namespace Rasul\Bos;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return[
            'Rasul\Bos\Components\SliderComponent' => 'slider',
            'Rasul\Bos\Components\MissionComponent' => 'missions',
            'Rasul\Bos\Components\EducationComponent' => 'educations',
            'Rasul\Bos\Components\EventComponent' => 'events',
            'Rasul\Bos\Components\NewsComponent' => 'news',
            'Rasul\Bos\Components\StatisticComponent' => 'statistics',
            'Rasul\Bos\Components\ContacComponent' => 'contact',

        ];
    }

    public function registerSettings()
    {

    }
}
