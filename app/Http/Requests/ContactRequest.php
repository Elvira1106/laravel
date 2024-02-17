<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'name' => 'required',        
        'email' => 'required|email',    
        'subject' => 'required|min:5|max:50',
        'message' => 'required|min:5|max:50'
        ];
    }
    public function attributes()
    {
        return [
        'name' => 'имя',        
        ];
    }

    public function messages()
    {
        return [
        'name.required' => 'поле имя является обязательным',   
        'email.required' => 'поле email является обязательным', 
        'subject.required' => 'поле Тема сообщения является обязательным',   
        'message.required' => 'поле Сообщение является обязательным',      
        ];
    }

}
