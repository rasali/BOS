<?php namespace Rasul\Bos\Components;

use Cms\Classes\ComponentBase;
use Rasul\Bos\Models\Event;

class EventDetailComponent extends ComponentBase
{
    public $events_id;
    public $slug;

    public function componentDetails()
    {
        return [
            'name'        => 'EventDetail',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function prepareVars()
    {
        $this->slug = $this->param('slug');
    }

    public function onRun()
    {

        $this->prepareVars();
        $this->page['events'] = $this->listEvent();
        $this->page['otherEvent'] = $this->listOtherEvent();

    }

    protected function listEvent()
    {
        $model = Event::where('slug', $this->slug)->first();
        $this->events_id = $model->id;
        return $model;
    }

    protected function listOtherEvent()
    {
        $model = Event::where('is_active', 1)->where('id', '<>', $this->events_id )->orderBy('id', 'DESC')->get();
        return $model;

    }
}
