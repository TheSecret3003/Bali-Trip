<?php

namespace App\Http\Requests;

use Exception;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class TourStoreRequest extends FormRequest
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
            'name' => ['required','string', 'max:255'],
            'ticket_code' => ['string', 'max:255'],
            'hotel1' => ['string', 'max:255'],
            'hotel2' => ['string', 'max:255'],
            'hotel3' => ['string', 'max:255'],
            'hotel4' => ['string', 'max:255'],
            'schedule' => ['required','string', 'max:255'],
            'price' => ['required', 'integer'],
            'special_price' => ['integer'],
            'description' => [],
            'keterangan' => [],
            'image' => ['image'],
            'day'   => ['required', 'array', 'min:2', 'max:8'],
            // 'destination.*'   => ['required'],
            // 'restaurant.*'   => ['required']
        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(
            response()->json([
                'status' => 0,
                'validator' => $validator->errors(),
            ], 422)
        );
    }
}
