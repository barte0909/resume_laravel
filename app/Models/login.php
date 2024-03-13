<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class login extends Model
{
    use HasFactory;


    function Login($email ,$password){
        $sql = "SELECT * FROM `resume_users` WHERE email = ? AND password = ?";

        return DB::select($sql, [$email, $password]);


    }
}
