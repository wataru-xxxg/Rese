<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotificationRequest extends FormRequest
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
            'message_type' => 'required|in:info,reminder,change,cancel',
            'custom_message' => 'nullable|string|max:500'
        ];
    }

    public function messages()
    {
        return [
            'message_type.required' => 'メッセージタイプを選択してください',
            'message_type.in' => '無効なメッセージタイプです',
            'custom_message.max' => 'カスタムメッセージは500文字以内にしてください',
        ];
    }
}
