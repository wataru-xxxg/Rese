<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'date' => 'required|after:today',
            'time' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'date.required' => '日付を選択してください',
            'date.after' => '明日以降の日付を選択してください',
            'time.required' => '時間を選択してください',
        ];
    }
}
