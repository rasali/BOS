<?php namespace Rasul\Bos\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
class ContacComponent extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'ContacComponent',
            'description' => 'Sending emails...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onSend()
    {
        $vars = [
            'name' => Input::get('name'),
            'surname' => Input::get('surname'),
            'email' => Input::get('email'),
            'phone' => Input::get('phone'),
            'content' => Input::get('content'),
        ];

        Mail::send('rasul.bos::mail.message', $vars, function ($message) {

            $message->to('admin@domain.tld', 'Admin Person');
            $message->subject('You have a new message');

        });
    }


}
