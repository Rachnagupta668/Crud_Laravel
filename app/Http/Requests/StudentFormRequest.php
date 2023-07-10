<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Contracts\Service\Attribute\Required;

class StudentFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function messages()
    {
       return[
        'name.required'=>'pleaase enter name',
        'city.required'=>'pleaase enter city',
        'marks.required'=>'pleaase enter marks',


       ] ;
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules=[
'name'=>[
    'required',
    'String',
    'max:191',
],
'city'=>[
    'required',
    'String',
    'max:191',
],
'marks'=>[
    'required',

    'digit:10',
],
        ];
        return $rules;
    }
}
