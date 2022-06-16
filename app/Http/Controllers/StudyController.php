<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class StudyController extends Controller
{
    public function index()
    {
        /********************************* 查询构造器  **********************************/
        // 参考链接：
        //https://laravel.com/docs/8.x/queries
        //http://t.zoukankan.com/bushui-p-14399217.html
        //查询所有
        //get方法返回一个Illuminate\Support\Collection包含查询结果的实例，其中每个结果都是 PHPstdClass对象的一个​​实例
//        $res = DB::table('admin_menu')->get();
//        echo "<pre />"; print_r($res);die;
//        return response()->json($res);

        //查询一行
//        $user = DB::table('admin_menu')->where('title', '首页')->first();
//        echo "<pre />"; print_r($user);die;

        //查询单个值
//        $user = DB::table('admin_menu')->where('title', '首页')->value('title');
//        echo "<pre />"; print_r($user);die;

        //通过id检索整行
//        $user = DB::table('admin_menu')->find(3);
//        echo "<pre />"; print_r($user);die;

        //整个单列的值
//        $user = DB::table('admin_menu')->pluck('title', 'id');
//        echo "<pre />"; print_r($user);die;

        //查询某个字段
//        $user = DB::table('admin_menu')->select('title', 'id')->get();
//        $user = DB::table('admin_menu')->get(['title','id']);
        $f = function ($v){return (array)$v;};
        $user = DB::table('admin_menu')->get()->map($f)->toArray();
//        $user = DB::table('admin_menu')->get()->toArray();
        $this->validateWith();



//        该get方法返回一个Illuminate\Support\Collection包含查询结果的实例，其中每个结果都是 PHPstdClass对象的一个​​实例

        /********************************* 原生sql  **********************************/

//         原生查询的核心方法在  vendor/laravel/framework/src/Illuminate/Database/Connection.php 里面
        // 教程参考链接：https://laravel.com/docs/8.x/database
        //该select方法将始终返回一个array结果。数组中的每个结果都是一个 PHPstdClass对象，代表数据库中的一条记录：
        //查询
//        $topMenues = DB::select('select * from admin_menu where parent_id = ?', [0]);
//        $topMenues = DB::select('select * from admin_menu where parent_id = :parent_id', ['parent_id'=>0]); //命名绑定
//        echo "<pre />"; print_r($topMenues);die;

        //新增
//       $res =  DB::insert('insert into admin_users (username, password,name) values (?, ?, ?)',
//            ['wgq', '$2y$10$.NSfFNoWomEOQPSde0qsSeL1unvJY81qo6XjPSJwexqriWqhMRrfK','wgq']);
//       echo "<pre />"; print_r($res);die;

        //更新
//        $affected = DB::update( 'update admin_users set name = "star" where name = ?',['wgq'] );
//        echo "<pre />"; print_r($affected);die;   //成功返回1 ，失败返回0

        //删除
//        $deleted = DB::delete('delete from admin_users where name = ?',['star']);
//        echo "<pre />"; print_r($deleted);die; //成功返回1 ，失败返回0
    }


}
