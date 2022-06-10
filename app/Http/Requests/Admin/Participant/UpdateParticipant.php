<?php

namespace App\Http\Requests\Admin\Participant;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateParticipant extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.participant.edit', $this->participant);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'number_id' => ['sometimes', Rule::unique('participants', 'number_id')->ignore($this->participant->getKey(), $this->participant->getKeyName()), 'string'],
            'name' => ['sometimes', 'string'],
            'email' => ['sometimes', 'email', Rule::unique('participants', 'email')->ignore($this->participant->getKey(), $this->participant->getKeyName()), 'string'],
            'phone' => ['sometimes', Rule::unique('participants', 'phone')->ignore($this->participant->getKey(), $this->participant->getKeyName()), 'string'],
            'birthday' => ['sometimes', 'date'],
            'doc_id' => ['sometimes', 'string'],
            'force_id' => ['sometimes', 'string'],
            'nationality_id' => ['sometimes', 'string'],
            
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
