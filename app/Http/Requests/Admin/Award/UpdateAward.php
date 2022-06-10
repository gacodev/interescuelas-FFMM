<?php

namespace App\Http\Requests\Admin\Award;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateAward extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.award.edit', $this->award);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'award' => ['sometimes', Rule::unique('awards', 'award')->ignore($this->award->getKey(), $this->award->getKeyName()), 'string'],
            'description' => ['sometimes', 'string'],
            'image' => ['sometimes', Rule::unique('awards', 'image')->ignore($this->award->getKey(), $this->award->getKeyName()), 'string'],
            
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
