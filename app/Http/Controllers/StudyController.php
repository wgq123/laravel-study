<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StudyController extends Controller
{
    public function index()
    {
        $res = DB::table('admin_users')->get();
        return response()->json($res);
        echo "<pre />"; print_r($res);die;
    }


}
