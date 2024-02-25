<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanRequest extends FormRequest
{
    public function rules()
    {
        return [
            'slug' => ['required'],
            'name' => ['required'],
            'level' => ['required', 'integer'],
            'price' => ['required', 'numeric'],
            'type' => ['boolean'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
