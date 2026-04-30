<?php

namespace App\Http\Requests;

use App\Http\Helpers\Response;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Override;

class DeleteTask extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'task_id'   => 'required|exists:tasks,id',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            Response::validation($validator->errors()->all(),[])
        );
    }
}
