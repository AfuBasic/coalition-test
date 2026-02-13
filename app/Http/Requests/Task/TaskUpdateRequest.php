<?php

namespace App\Http\Requests\Task;

use App\Http\Requests\Concerns\DecodeHashIds;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskUpdateRequest extends FormRequest
{
    use DecodeHashIds;

    protected array $hashIds = ['project_id', 'task_id'];
    /**
    * Determine if the user is authorized to make this request.
    */
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation()
    {
        $this->decodeHashIds();
    }
    
    /**
    * Get the validation rules that apply to the request.
    *
    * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
    */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'priority' => ['required','numeric', Rule::unique('tasks', 'priority')->where(fn($query) => $query->where('project_id', $this->input('project_id')))->ignore($this->input('task_id'))],
            'status' => 'required|string',
        ];
    }
}
