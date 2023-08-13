<?php

namespace App\Http\Requests\Logistic;

use Illuminate\Foundation\Http\FormRequest;

class LogisticRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'locationName' => 'required',
            'coords' => 'required|array'
        ];
    }

    public function getLocationName(): string
    {
        return $this->input('locationName');
    }

    public function getCoords(): array
    {
        return $this->input('coords');
    }
}
