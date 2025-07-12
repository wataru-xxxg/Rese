<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopRequest extends FormRequest
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
            'name' => 'required|max:30',
            'area_id' => 'required',
            'genre_id' => 'required',
            'description' => 'required|max:1000',
            'image' => 'required_if:create_flag,1|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '店舗名を入力してください',
            'name.max' => '店舗名は30文字以内にしてください',
            'area_id.required' => 'エリアを選択してください',
            'genre_id.required' => 'ジャンルを選択してください',
            'description.required' => '店舗説明を入力してください',
            'description.max' => '店舗説明は1000文字以内にしてください',
            'image.required_if' => '画像を選択してください',
            'image.image' => '画像を選択してください',
            'image.mimes' => '画像はjpeg,png,jpg,gif,svg形式で選択してください',
            'image.max' => '画像は2048MB以内にしてください',
        ];
    }
}
