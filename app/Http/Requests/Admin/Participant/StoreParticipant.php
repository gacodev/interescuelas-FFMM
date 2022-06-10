<?php

namespace App\Http\Requests\Admin\Participant;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreParticipant extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.participant.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'number_id' => ['required', Rule::unique('participants', 'number_id'), 'string'],
            'name' => ['required', 'string'],
            'email' => ['required', 'email', Rule::unique('participants', 'email'), 'string'],
            'phone' => ['required', Rule::unique('participants', 'phone'), 'string'],
            'birthday' => ['required', 'date'],
            'doc_id' => ['required', 'string'],
            'force_id' => ['required', 'string'],
            'nationality_id' => ['required', 'string'],
            
        ];
    }

    /**
    * Modify input data
    *
    * @return array
    */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();

        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
