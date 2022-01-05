<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function store(Request $request) {
        $users = new Users();
        $users->name = $request->name;
        $users->surname = $request->surname;
        $users->email = $request->email;
        $users->phone = $request->phone;
        $users->address = $request->address;
        $users->save();

        return [
            "status" => "0_SUCCESS",
            "data" => "Successfully created"
        ];
    }

    public function findUser(Request $request) {
        $user = Users::find($request->id);

        return [
            "status" => "0_SUCCESS",
            "data" => $user,
        ];
    }

    public function getAllUser(Request $request) {
        $users = Users::all();

        return [
            "status" => "0_SUCCESS",
            "data" => $users,
        ];
    }

    public function update(Request $request) {
        $user = Users::find($request->id);
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();

        return [
            "status" => "0_SUCCESS",
            "data" => "Successfully updated"
        ];
    }
}
