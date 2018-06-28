<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Page;

class PageFormRequest extends Request
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
        $pageId = '';
        $result = '';
        $id = $this->request->get('id');
        $result =  [
            'url'     => 'required|unique:page,url,' . $id,
            'title'   => 'required',
            'name'    => 'required',
            'content' => 'required',
        ];
 
        return $result;
    }
}
