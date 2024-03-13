<?php

namespace App\Http\Controllers;


use App\Models\profiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

use App\Models\projects;



class dashboardController extends Controller
{
    public function dashboard()
    {

        $profiles = DB::table('profiles')->where('id', 1)->first();
        $projects = projects::get();

        return view('adminInterface.dashboard', compact('profiles', 'projects'));
    }

    public function update(Request $request, $id)
    {


        $validatedProfileData = $request->validate([
            'name' => 'required|string',
            'career' => 'required|string',
            'linkedin' => 'required|string',
            'gmail' => 'required|string',
            'github' => 'required|string',
            'contact' => 'required|string',
            'profile' => 'required|string',
            'skills' => 'required|string',
            'education' => 'required|string',
            'career_content' => 'required|string',
            'reference'=>'required|string'
        ]);


            DB::table('profiles')
                ->where('id', $id)
                ->update($validatedProfileData);

            $profile = DB::table('profiles')
                ->where('id', $id)
                ->first();

            if ($request->hasFile('avatar')) {
                $avatar = $request->file('avatar');
                $filename = time() . '.' . $avatar->getClientOriginalExtension();
                Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));

                if ($profile) {
                    DB::table('profiles')
                        ->where('id', $id)
                        ->update(['avatar' => $filename]);
                }
            }

        $projects = $request->input('project');

        if (!is_null($projects)) {
            foreach ($projects as $projectId => $projectData) {
                if ($projectData['_delete'] ?? false) {
                    // Delete the project record from the database
                    projects::destroy($projectId);
                } else {
                    if (isset($projectData['title'])) {
                        // Update the project record in the database
                        $project = Projects::findOrFail($projectId);
                        $validatedProjectData = [
                            'title' => $projectData['title'],
                        ];
                        $project->update($validatedProjectData);
                    }
                }
            }
        }

        

        return back();
    }


    public function deleteProject(Request $request, $id)
    {

        $project = DB::table('projects')->where('id', $id)->first();

        if ($project) {
            DB::table('projects')->where('id', $id)->delete();

            return response()->json(['message' => 'Project deleted successfully']);
        } else {
            return response()->json(['error' => 'Project not found'], 404);
        }
    }













}

