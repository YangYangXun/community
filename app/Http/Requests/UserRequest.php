<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
{
    /**
     * FormRequest Â∑•‰?úÊ?üÂ??
     * ÂØ¶Áèæ‰æùË≥¥Ê≥®Â?? ?ú®?éß??∂Âô®‰∏≠È?óË?â‰Ωø?î®???Ë´ãÊ??
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
            'avatar.mimes' => 'Â§¥Â?èÂ??È°ªÊòØ jpeg, bmp, png, gif ?†ºÂºèÁ???õæ???',
            'avatar.dimensions' => '?õæ??????Ê∏??ô∞Â∫¶‰?çÂ??Ôº?ÂÆΩÂ?åÈ?òÈ??Ë¶? 200px ‰ª•‰??',
            'name.unique' => '?î®??∑Â?çÂ∑≤Ë¢´Â?†Áî®ÔºåËØ∑??çÊñ∞Â°´Â??',
            'name.regex' => '?î®??∑Â?çÂè™?îØ????ã±???????ï∞Â≠ó„??Ê®™Ê????å‰?ãÂ?íÁ∫ø???',
            'name.between' => '?î®??∑Â?çÂ??È°ª‰?ã‰?? 3 - 25 ‰∏™Â?óÁ¨¶‰πãÈó¥???',
            'name.required' => '?î®??∑Â?ç‰?çË?Ω‰∏∫Á©∫„??',
        ];
    }

}
