<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
        $id=null;
        $id=$this->route()->getParameter('usuarios');
        if($id!=null)
            return [
                'name'     => 'required',
                'email'    => 'required|unique:users,email,'.$id,
                'username' => 'required|unique:users,username,'.$id
            ];
        else{

            return [
                'name'     => 'required',
                'email'    => 'required|unique:users,email,',
                'username' => 'required|unique:users,username,'
            ];
        }
    }
}
