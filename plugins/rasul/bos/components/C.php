<?php namespace Rasul\Bos\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Rasul\Bos\Models\Contact;
use Illuminate\Support\Facades\Redirect;

class C extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'C Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onSend()
    {

        $validator = Validator::make(
            [
                'name' => Input::get('name'),
                'email' => Input::get('email')
            ],
            [
                'name' => 'required',
                'email' => 'required|email'
            ]
        );

        if ($validator->fails()) {

            return ['#result' => $this->renderPartial('c::message', [
                'errorMsgs' => $validator->messages()->all(),
                'fieldMsgs' => $validator->messages()
            ])];


        } else {
            $vars = [
                'name' => Input::get('name'),
                'surname' => Input::get('surname'),
                'email' => Input::get('email'),
                'phone' => Input::get('phone'),
                'content' => Input::get('content'),
            ];
        }

        Mail::send('rasul.bos::mail.message', $vars, function ($message) {

            $message->to('admin@domain.tld', 'Admin Person');
            $message->subject('You have a new message');

        });
        $contact = Contact::create($vars);


    }
}
