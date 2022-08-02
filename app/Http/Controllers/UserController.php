<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class UserController extends Controller{

    //单个查询条件
    public function index(){
        $data = DB::table("user")->where("id",1)->get();
        dump($data);
    }

    //多个并列查询条件
    public function mulWhere(){
        $where = [
            ["id",'=',"1"],
            ["name",'=',"zx"]
        ];
        $data = DB::table("user")->where($where)->get();
        dump($data);
    }

    //多个异或查询条件
    public function orWhere(){
        $where = [
            ["id",'=',"1"],
            ["name",'=',"zx"]
        ];
        $data = DB::table("user")
            ->where($where)
            ->whereOr("name","zs")
            ->get();
        echo DB::table("user")->getlastSql();
        dump($data);
    }
}