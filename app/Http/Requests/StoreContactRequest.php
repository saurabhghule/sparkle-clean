<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreContactRequest extends Request {

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
			'name' => 'required',
			'email' => 'required|email',
		];
	}

	 public function messages()
    {
        return [
            'name.required' => 'Please provide your Name',
            'email.required' => 'Please provide your Email'
        ];
    }

}
