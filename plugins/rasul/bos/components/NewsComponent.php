<?php namespace Rasul\Bos\Components;

use Cms\Classes\ComponentBase;
use Rasul\Bos\Models\News;

class NewsComponent extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'News',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {

        $this->page['all_news'] = $this->listNews();

    }

    protected function listNews()
    {

        $model = new News();
        return $model->where('is_active', 1)->orderBy('id','DESC')->get();

    }


}
