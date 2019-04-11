<?php namespace Rasul\Bos\Components;

use Cms\Classes\ComponentBase;
use Rasul\Bos\Models\Mission;

class MissionComponent extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'MissionComponent Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

}
