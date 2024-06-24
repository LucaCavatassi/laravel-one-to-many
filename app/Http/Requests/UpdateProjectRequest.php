<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
            "title" => ["required","max:30", Rule::unique("projects", "title")->ignore($this->project)],
            "description" => "max:300",
            "type_id"=>"required|exists:types,id"
        ];
    }

    public function messages()
    {
        return [
            "title.required" => "Il titolo è necessario per modificare un progetto!",
            "title.max" => "La lunghezza massima della titolo è di 30 caratteri!",
            "title.unique" => "Il titolo è già in utilizzo, cambia titolo!",
            "description.max" => "La lunghezza massima della descrizione è di 300 caratteri!",
            "type_id.required" => "Il linguaggio è necessario per modificare un nuovo progetto!",
            "type_id.exists" => "Questo linguaggio non esiste."
        ];
    }
}
