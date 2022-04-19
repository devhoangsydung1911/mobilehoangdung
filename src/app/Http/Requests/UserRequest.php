<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
      'username' => 'required|min:3',
      'email' => 'required|email|unique:users',
      'password' => 'required',
      'password_confirm' => 'required|same:password'
    ];
  }

  public function messages()
  {
    return [
      'username.required' => 'Nhập tên :attribute',
      'username.min' => 'Tên :attribute ít nhất 3 ký tự',
      'password.required' => 'Nhập :attribute',
      'email.required' => 'Nhập :attribute',
      'email.email' => 'Đây không phải :attribute',
      'email.unique' => ':attribute đã được sử dụng',
      'password_confirm.required' => 'Nhập lại :attribute',
      'password_confirm.same' => 'Xác nhận :attribute không khớp',
    ];
  }

  public function attributes()
  {
    return [
      'username' => 'người dùng',
      'password' => 'mật khẩu',
      'password_confirm' => 'mật khẩu',
    ];
  }
}