<?php namespace Martinimultimedia\Contact\Components;

use Cms\Classes\ComponentBase;
use Log;
use Validator;
use ValidationException;
use Redirect;
use Flash;
use Input;
use MartiniMultimedia\Contact\Models\Contact;

class NewsletterForm extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Newsletter Form',
            'description' => 'Newsletter Registration Form'
        ];
    }

    public function defineProperties()
    {
        return [];
    }




    public function onSave()
	{

		$data = post();
		$rules = [
			'email'=> 'required|email',
		];

		$validator = Validator::make($data,$rules);


		if ($validator->fails()){
			Flash::error(trans('martinimultimedia.contact::lang.contactform.error'));
			throw new ValidationException($validator);
		} else {


			$contact=new Contact();

			$contact->email=Input::get('email');
			$contact->save();

			Flash::success(trans('martinimultimedia.contact::lang.contactform.subscription_sent'));

			return Redirect::back();

		}


	}

}
