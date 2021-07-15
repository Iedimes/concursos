<?php

namespace App\Http\Requests\Admin\Requirement;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreRequirement extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.requirement.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'position_id' => ['required', 'integer'],
            'requirement' => ['required'],
            'education_level' => ['required'],
            'name' => ['required', 'string'],

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

    public function getRequirementId()
    {
        if ($this->has('requirement')) {
            return $this->get('requirement')['id'];
        }
        return null;
    }

    public function getEducationLevelId()
    {
        if ($this->has('education_level')) {
            return $this->get('education_level')['id'];
        }
        return null;
    }
}
