<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\download;
use Dompdf\Dompdf;
use App\Models\profiles;
use Illuminate\Support\Facades\DB;
use App\Models\projects;
use Illuminate\Support\Facades\File;


class downloadController extends Controller
{
    // public function download()
    // {

    //     $projects = DB::table('projects')->get();
    //     $profiles = profiles::first(); // Assuming 'Profile' is the correct model name
    //     $content = view('UserInterface.resume', ['profiles' => $profiles], ['projects' => $projects])->render();
    //     $dompdf = new Dompdf();
    //     $dompdf->loadHtml($content);
    //     $dompdf->setPaper('A4', 'portrait');
    //     $dompdf->render();
    //     $fileName = 'index_' . time() . '.pdf';
    //     return $dompdf->stream($fileName);
    // }


    public function download()
{
    $projects = DB::table('projects')->get();
    $profiles = profiles::first(); // Assuming 'Profile' is the correct model name

    // Get the absolute path to the avatars directory
    $avatarDirectory = public_path('uploads/avatars');

    // Get the URLs of all images in the avatars directory
    $avatarUrls = [];
    $avatarFiles = File::allFiles($avatarDirectory);
    foreach ($avatarFiles as $avatarFile) {
        $avatarUrls[] = asset('uploads/avatars/' . $avatarFile->getFilename());
    }

    $content = view('UserInterface.resume', [
        'profiles' => $profiles,
        'projects' => $projects,
        'avatarUrls' => $avatarUrls
    ])->render();

    $dompdf = new Dompdf();
    $dompdf->loadHtml($content);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    $fileName = 'index_' . time() . '.pdf';
    return $dompdf->stream($fileName);
}

}
