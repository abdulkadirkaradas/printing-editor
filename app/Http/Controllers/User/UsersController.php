<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\UsersImages;
use App\Models\UsersImagesTable;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    public function store(Request $request) {
        $file = $request->file("images");
        $fileId = Str::uuid();
        if($file) {
            $fileName = $file->getClientOriginalName();
            $fileExtension = $file->getClientOriginalExtension();
        }

        $users = new Users();
        $users->name = $request->name;
        $users->surname = $request->surname;
        $users->email = $request->email;
        $users->phone = $request->phone;
        $users->address = $request->address;
        $users->save();

        if($file) {
            $images = new UsersImages();
            $images->file_id = $fileId;
            $images->file_name = $fileName;
            $images->file_extension = $fileExtension;
            $images->file_url = env("APP_URL") . "/" . "users_images". "/" . $users->id . "/" . $fileId . "." . $fileExtension;
            $images->user_id = $users->id;
            $images->save();
        }

        if(!file_exists(public_path("users_images"))) {
            mkdir(public_path("users_images"), 0777, true);
        }

        if(!file_exists(public_path("users_images" . "/" . $users->id . "/"))) {
            mkdir(public_path("users_images" . "/" . $users->id . "/"), 0777, true);
        }

        $file->move(public_path("users_images" . "/" . $users->id . "/"), $fileId . "." . $fileExtension);

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
        foreach ($users as $key => $user) {
            $image = UsersImages::whereNull("deleted_at")->where("user_id", $user->id)->get();
            $user->image = $image[0];
        }

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
