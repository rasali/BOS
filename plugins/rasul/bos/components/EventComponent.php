<?php namespace Rasul\Bos\Components;

use Cms\Classes\ComponentBase;
use Rasul\Bos\Models\Event;

class EventComponent extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'EventComponent Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {

        $s = $this->param('slug');
        $this->page['slg'] = Event::where('slug',$s)->first();


        $this->page = $this->listEvent();

    }

    protected function listEvent()
    {

        $events = Event::where('is_active',1)->orderBy('id','ASC')->limit(4);
        $events_id = Event::where('is_active',1)->orderBy('id','ASC')->pluck('id')->toArray();
        $other_events = Event::where('is_active',1)->orderBy('id','ASC');

        $this->page['events'] = $events->get();
        $this->page['other_events'] = $other_events->get();
    }
}
