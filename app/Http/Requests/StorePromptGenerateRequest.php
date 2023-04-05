<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePromptGenerateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules()
    {
        $prompt = $this->route('prompt');
        return $prompt->options->mapWithKeys(function ($option) {
            return ["p{$option->getKey()}" => 'required'];
        })->toArray();
    }

}
