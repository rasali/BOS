<?php namespace Rasul\Bos\Components;

use Cms\Classes\ComponentBase;
use Rasul\Bos\Models\Partner;

class PartnerComponent extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'PartnerComponent Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {

        $this->page['partner'] = $this->listPartner();

    }

    protected function listPartner()
    {

        $model = new Partner();

        return $model->get();
    }
}
