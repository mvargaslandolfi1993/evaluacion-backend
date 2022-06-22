<?php

namespace App\Http\Requests;

use App\Models\Assistant;
use App\Models\Event;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class PaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "event_id"          => "exists:events,id",
            "responsible_id"    => "exists:responsibles,id",
            "total"             => "required|numeric",
            'assistants'        => 'required|array',
            'assistants.*.name' => 'required|string',
        ];
    }

    public function validated()
    {
        $data = $this->validator->validated();

        $event = Event::where("id", $data['event_id'])->first();

        $total_assistant = Assistant::count();

        if ($total_assistant > $event->limit) {
            throw new HttpResponseException(response()->json(["error" => "There are no seats available"], 422));
        }

        return $data;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
