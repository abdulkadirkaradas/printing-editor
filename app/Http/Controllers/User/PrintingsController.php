<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Printings;
use Illuminate\Http\Request;

class PrintingsController extends Controller
{
    public function store(Request $request) {
        $project = new Printings();
        $project->name = $request->name;
        $project->width = $request->width;
        $project->height = $request->height;
        $project->bgcolor = $request->bgcolor;
        $project->save();

        if($project->count > 0) {
            return [
                "status" => "0_SUCCESS",
                "data" => "Successfully created",
            ];
        }
        return [
            "status" => "0_FAILED",
            "data" => "Failed",
        ];
    }

    public function find(Request $request) {
        $project = Printings::find($request->id);

        return [
            "status" => "0_SUCCESS",
            "data" => $project,
        ];
    }

    public function all(Request $request) {
        $projects = Printings::all();

        return [
            "status" => "0_SUCCESS",
            "data" => $projects,
        ];
    }

    public function update(Request $request) {
        $project = Printings::find($request->id);
        $project->name = $request->name;
        $project->width = $request->width;
        $project->height = $request->height;
        $project->bgcolor = $request->bgcolor;
        $project->save();

        if($project->count > 0) {
            return [
                "status" => "0_SUCCESS",
                "data" => "Successfully updated",
            ];
        }
        return [
            "status" => "0_FAILED",
            "data" => "Failed",
        ];
    }
}
