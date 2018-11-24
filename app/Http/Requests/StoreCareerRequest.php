<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreCareerRequest extends Request {

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
			'position_applied_for' => 'required',
			'phone' => 'required',
			'upload_resume' => 'max:8000|mimes:pdf,doc,docx'
		];
	}

	 public function messages()
    {
        return [
            'name.required' => 'Please provide your Name',
            'email.required' => 'Please provide your Email',
            'position_applied_for.required' => 'Please provide Position at which you want to apply',
            'phone.required' => 'Please provide valid Telephone Number',
            'upload_resume.max' => "The File Size should be below 8Mb",
            'upload_resume.mimes' => "Please provide the valid extensions(.pdf, .doc, .docx)"
        ];
    }

}
