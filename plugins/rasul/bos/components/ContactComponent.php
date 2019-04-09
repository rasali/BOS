<?php namespace Rasul\Contact\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Rasul\Bos\Models\Contact;

class ContactComponent extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'ContactComponent',
            'description' => 'Sending emails...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onSend(){
        $vars = [
            'name' => Input::get('name'),
            'surname' => Input::get('surname'),
            'email' => Input::get('email'),
            'phone' => Input::get('phone'),
            'content' => Input::get('content'),
        ];

        Mail::send('rasul.contact::mail.message', $vars, function($message) {

            $message->to('admin@domain.tld', 'Admin Person');
            $message->subject('You have a new message');

        });

        Contact::insert('insert into  rasul_bos_contacts (name, surname, email, phone, content) values (?,?)');

        //dd(request()->all());
//
//        $validator = Validator::make(
//            [
//                'name' => Input::get('name'),
//                'email' => Input::get('email')
//            ],
//            [
//                'name' => 'required',
//                'email' => 'required|email'
//            ]
//        );
//
//        if($validator->fails())
//        {
//
//            return ['#result' => $this->renderPartial('contactform::messages',[
//                'errorMsgs' => $validator->messages()->all(),
//                'fieldMsgs' => $validator->messages()
//            ])];
//
//
//        }else{
//            $vars = [
//                'name' => Input::get('name'),
//                'surname' => Input::get('surname'),
//                'email' => Input::get('email'),
//                'phone' => Input::get('phone'),
//                'content' => Input::get('content')
//            ];
//
//            Mail::send('rasul.contact::mail.message', $vars, function($message) {
//
//                $message->to('admin@domain.tld', 'Admin Person');
//                $message->subject('You have a new message');
//
//            });
//        }




    }
}
