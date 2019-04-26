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
            'Rasul\Bos\Components\PartnerComponent' => 'partners',
            'Rasul\Bos\Components\EventComponent' => 'events',
            'Rasul\Bos\Components\EventDetailComponent' => 'events',
            'Rasul\Bos\Components\NewsComponent' => 'news',
            'Rasul\Bos\Components\NewsDetailComponent' => 'news',
            'Rasul\Bos\Components\StatisticComponent' => 'statistics',
            'Rasul\Bos\Components\HomeComponent' => 'home',
            'Rasul\Bos\Components\C' => 'c',
        ];
    }

    public function registerFormWidgets()
    {
        return [

            'Rasul\Bos\FormWidgets\ContactFormWidget' => [
                'label' => 'Contact Info',
                'code' => 'contact'
            ],

        ];
    }

    public function boot()
    {
        \Event::listen('offline.sitesearch.query', function ($query) {

            // Search your plugin's contents
            $items = Models\News::where('title', 'like', "%${query}%")
                ->orWhere('description', 'like', "%${query}%")
                ->get();

            // Now build a results array
            $results = $items->map(function ($item) use ($query) {

                // If the query is found in the title, set a relevance of 2
                $relevance = mb_stripos($item->title, $query) !== false ? 2 : 1;

                // Optional: Add an age penalty to older results. This makes sure that
                // newer results are listed first.
                // if ($relevance > 1 && $item->published_at) {
                //     $relevance -= $this->getAgePenalty($item->published_at->diffInDays(Carbon::now()));
                // }

                return [
                    'title'     => $item->title,
                    'text'      => $item->description,
                    'url'       => '/news/detail/' . $item->slug,
                   'thumb'     => $item->image_n->first(), // Instance of System\Models\File
                    'relevance' => $relevance, // higher relevance results in a higher
                    // position in the results listing
                    // 'meta' => 'data',       // optional, any other information you want
                    // to associate with this result
                    // 'model' => $item,       // optional, pass along the original model
                ];
            });

            return [
                'provider' => 'News', // The badge to display for this result
                'results'  => $results,
            ];
        });
    }

    public function registerSettings()
    {
    }
}
