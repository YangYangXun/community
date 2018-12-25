<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
{
    /**
     * FormRequest 工�?��?��??
     * 實現依賴注�?? ?��?��??�器中�?��?�使?��???請�??
     */

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
            'name' => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name,' . Auth::id(),
            'email' => 'required|email',
            'introduction' => 'required|max:80',
            'avatar' => 'mimes:jpeg,bmp,png,gif|dimensions:min_width=200,min_height=200',
        ];
    }

    public function messages()
    {
        return [
            'avatar.mimes' => '头�?��??须是 jpeg, bmp, png, gif ?��式�???��???',
            'avatar.dimensions' => '?��??????�??��度�?��??�?宽�?��?��??�? 200px 以�??',
            'name.unique' => '?��??��?�已被�?�用，请??�新填�??',
            'name.regex' => '?��??��?�只?��????��???????��字�??横�????��?��?�线???',
            'name.between' => '?��??��?��??须�?��?? 3 - 25 个�?�符之间???',
            'name.required' => '?��??��?��?��?�为空�??',
        ];
    }

}
