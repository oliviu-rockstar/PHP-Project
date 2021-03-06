<?php namespace App\Http\Requests;


class SignIn extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'email'=> 'required_without:username|email',
			'username' => 'required_without:email|alpha_num',
			'password' => 'required'
		];
	}

}
