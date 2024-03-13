<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\projects;
use Intervention\Image\ImageManagerStatic as Image;

class projectsController extends Controller
{

    // public function project_store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'title' => 'required|string',
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     if ($request->hasFile('image')) {
    //         $image = $request->file('image');
    //         $filename = time() . '.' . $image->getClientOriginalExtension();
    //         $image->move(public_path('img'), $filename);
    //         $validated['image'] = $filename;
    //     }

    //     projects::create($validated);

    //     dd($request);

    //     //return back()->with('message', 'New item was added successfully!');
    // }

    public function project_store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));
        $validated['image'] = $filename;
    }

    projects::create($validated);


    return back()->with('message', 'New project added successfully!');
}



// public function update_projects(Request $request, $id)
// {
//     $project = Projects::findOrFail($id);
//     $validatedData = $request->validate([
//         'title' => 'required|string',
//     ]);

//     $project->update($validatedData);

//     return back()->with('success', 'Project updated successfully.');
// }


}


