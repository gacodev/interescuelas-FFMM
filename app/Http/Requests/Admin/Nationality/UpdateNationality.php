<?php

namespace App\Http\Requests\Admin\Nationality;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateNationality extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.nationality.edit', $this->nationality);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'nationality' => ['sometimes', Rule::unique('nationalities', 'nationality')->ignore($this->nationality->getKey(), $this->nationality->getKeyName()), 'string'],
            'flag_image' => ['sometimes', Rule::unique('nationalities', 'flag_image')->ignore($this->nationality->getKey(), $this->nationality->getKeyName()), 'string'],
            
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
