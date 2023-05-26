<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function allowedRoles($rolesArray,$model = null): bool
    {
        /*
        1) Must match role
        2) If model parsed in, must match 'user_id' as well (If Admin, accept)
        */

        $user = auth()->user();
        $roles = $user->getRoleNames()->toArray();

        $meetsCriteria = false;
        foreach($rolesArray as $role){
            if(in_array($role,$roles)){
                //No model parsed in, OK
                if($model == null){
                    $meetsCriteria = true;
                }
                //Model parsed in (check 'user_id' match) - Doesnt apply to Admin
                else{
                    //Admin (bypass 'user_id' check)
                    if($role == 'admin'){
                        $meetsCriteria = true;
                    }
                    //Not Admin
                    else{
                        //user_id match (doesnt apply to admin)
                        if($user->id == $model->user_id){
                            $meetsCriteria = true;
                        }
                    }
                }
            }
        }

        return $meetsCriteria;
    }
}
