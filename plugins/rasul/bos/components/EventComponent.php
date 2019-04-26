<?php namespace Rasul\Bos\Components;

use Cms\Classes\ComponentBase;
use Rasul\Bos\Models\Event;

class EventComponent extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Event',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }


    public function onRun()
    {

        $this->page['allEvents'] = $this->listEvents();

    }

    protected function listEvents()
    {
        $model = new Event();
        return $model->where('is_active', 1)->orderBy('id','DESC')->get();
    }


}
