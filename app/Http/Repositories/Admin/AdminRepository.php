<?php

namespace App\Http\Repositories\Admin;

use App\Models\Admin;
use App\Mail\AdminMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Repositories\Admin\AdminInterface;

class AdminRepository implements AdminInterface
{
    private $admin;

    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }





    
    public function findById($id)
    {
        $admin = $this->admin->find($id);
        if ($admin)
            return $admin;
        return false;
    }
    public function create($request)
    {
        $admin = $this->admin->create(array_filter($request->all()));
        return $admin;
    }

    public function update($request)
    {
        $user = auth("auth:admin")->user();
        $user->update(array_filter($request->all()));
        $user->refresh();
        return $user;
    }
    //  get all admin expect auth


    // update anther admin info
    public function adminUpdate($request, $slug)
    {
        $admin = $this->admin->where("slug", $slug)->first();
        $admin->update(array_filter($request->all()));
        $admin->refresh();


        return $admin;
    }

    public function resetPassword($request)
    {
        $pin_code = rand(11111, 99999);
        $user = $this->admin->where("email", $request->email)->first();
        $user->update(["pin_code" => $pin_code]);
        $user->refresh();
        Mail::to($user->email)->send(new AdminMail($user));
        return $pin_code;
    }

    public function confirmPassword($request)
    {
        $user = $this->admin->where("pin_code", $request->pin_code)->where("pin_code", "!=", null)->first();
        if ($user) :

            $user->password = $request->password;
            $user->pin_code = null;
            if ($user->save()) :
                return $this->responseJson(true, "password update successfully", null, 200);

            else :
                return $this->responseJson(false, "unExpected Error happened try again", null, 500);

            endif;
        else :
            return $this->responseJson(true, "incorrect code", null, 400);
        endif;
    }
}
