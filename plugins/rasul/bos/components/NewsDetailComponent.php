<?php namespace Rasul\Bos\Components;

use Cms\Classes\ComponentBase;
use Rasul\Bos\Models\News;

class NewsDetailComponent extends ComponentBase
{
    public $news_id;
    public $slug;

    public function componentDetails()
    {
        return [
            'name' => 'NewsDetail',
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
        $this->page['news'] = $this->listNews();
        $this->page['related_news'] = $this->listRelatedNews();

    }

    public function listNews()
    {
        $model = News::where('slug', $this->slug)->first();
        $this->news_id = $model->id;
        return $model;
    }

    protected function listRelatedNews()
    {
        $model = News::where('is_active', 1)->where('id', '<>', $this->news_id )->orderBy('id', 'DESC')->take(10)->get();
        return $model;

    }
}
