<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FAQRequest extends FormRequest
{
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
			'reference' => 'required|unique:faq,reference,'.$this->faq,			
            'question'  => 'required',            
            'answer'    => 'required'            
        ];
	}
	
    public function messages() 
    {
        return [
			'reference.required' => 'The REFERENCE is required',			    
			'reference.unique'   => 'The REFERENCE needs to be unique',			    
            'question.required'  => 'The QUESTION is required',        
            'answer.required'    => 'The ANSWER is required'        
        ];
    }
	
}