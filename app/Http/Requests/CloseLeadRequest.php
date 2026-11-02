<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CloseLeadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }
}
