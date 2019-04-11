<?php namespace Rasul\Bos\Components;

use Cms\Classes\ComponentBase;
use Rasul\Bos\Models\News;

class NewsComponent extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'NewsComponent Component',
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
        $this->page['slg'] = News::where('slug',$s)->first();


        $this->page = $this->lisNews();

    }

    protected function lisNews()
    {

        $news = News::where('is_home',1)->orderBy('id','DESC')->limit(3);
        $news_id = News::where('is_home',1)->orderBy('created_at','ASC')->limit(3)->pluck('id')->toArray();
        $allnews = News::where('is_home',1)->orderBy('id','ASC');
        $allnews_id = News::where('is_home',1)->orderBy('id','ASC')->limit(6)->pluck('id')->toArray();
        $related_news = News::where('is_home',1)->whereNotIn('id',$allnews_id)->orderBy('id','ASC')->limit(6);
        $related_news_id = News::where('is_home',1)->orderBy('id','ASC')->limit(6)->pluck('id')->toArray();




        $this->page['news'] = $news->get();
        $this->page['allnews'] = $allnews->get();
        $this->page['related_news'] = $related_news->get();

    }


}
