<?php

namespace App\Http\Requests\Order;

use App\Services\Api\Order\DTO\CreateOrderDTO;
use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'phone' => 'required',
            'fullName' => 'string',
            'email' => 'string',
            'date' => 'required|string',
            'time' => 'required|string',
            'note' => 'string',
            'address' => 'string'
        ];
    }

    public function getData(): CreateOrderDTO
    {
        $createOrderDTO = new CreateOrderDTO();
        $createOrderDTO
            ->setDate($this->input('date'))
            ->setTime($this->input('time'))
            ->setAddress($this->input('address'))
            ->setEmail($this->input('email'))
            ->setFullName($this->input('fullName'))
            ->setPhone($this->input('phone'))
            ->setNote($this->input('note'));

        return $createOrderDTO;
    }
}
