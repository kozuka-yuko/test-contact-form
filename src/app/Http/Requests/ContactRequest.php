<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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

    public function attributes()
    {
        return [
            "tel_all" => "電話番号",
        ];
    }

    /**
     * @inheritDoc
     */
    public function validationData()
    {
        $this->addTelAll();
        return parent::validationData();
    }

    /**
     * To validate for whole tel number
     */
    private function addTelAll()
    {
        $tel1 = $this->request->get('tel1');
        $tel2 = $this->request->get('tel2');
        $tel3 = $this->request->get('tel3');

        $tel = $tel1 . $tel2 . $tel3;
        $this->merge([
            'tel' => $tel,
        ]);
    }

    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'gender' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'tel' => [
                'required',
                'numeric', 'max:5'
            ],
            'address' => ['required', 'string', 'max:255'],
            'category' => ['required'],
            'detail' => ['required', 'string', 'max:120'],
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => '姓を入力してください',
            'first_name.string' => '姓を入力してください',
            'first_name.max' => '姓を入力してください',
            'last_name.required' => '名を入力してください',
            'last_name.string' => '名を入力してください',
            'last_name.max' => '名を入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.string' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'email.max' => 'メールアドレスを255文字以下で入力してください',
            'tel.required' => '電話番号を入力してください',
            'tel.numeric' => '電話番号を入力してください',
            'tel.max' => '電話番号を5桁までの数字で入力してください',
            'address.required' => '住所を入力してください',
            'address.string' => '住所を入力してください',
            'address.max' => '住所を入力してください',
            'category.required' => 'お問い合わせの種類を選択してください',
            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.max' => 'お問い合わせ内容は120文字以内で入力してください',
        ];
    }
}
