<?php

namespace App\Http\Controllers;


use App\Student;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    //参考链接：
     //https://www.imooc.com/video/12499
      //https://www.imooc.com/video/12500
     //https://www.imooc.com/video/12501
    public function test1()
    {
       //Laravel中提供了DB facade(原始查找)、查询构造器、Eloquent ORM 三种操作数据方式
        $student = DB::select('select * from student');
        echo "<pre />"; print_r($student);die;

       $res = DB::insert('insert into student(name,age) value(?, ?)', ['sean', 18]);
       dd($res);  //成功返回true
    }

    public function test2(){
        //查询构造器核心方法
       // vendor/laravel/framework/src/Illuminate/Database/Query/Builder.php
        //1、Laravel查询构造器（query builder）提供方便、流畅的接口，用来建立及执行数据库查找语法。
        //2、使用PDO参数绑定，以保护应用程序免于sQL注入因此传入的参数不需要额外转义特殊字符
        //3、基本可以满足所有的数据库操作，而且在所有支持的数据库系统上都可以执行。

        //新增一条数据
//        $res = DB::table('student')->insert(['name'=>'xiaomu', 'age'=>20]);
//        dd($res);

        //插入得到ID
//        $res = DB::table('student')->insertGetId(['name'=>'jack', 'age'=>21]);
//        dd($res);

        //批量插入
//        $res = DB::table('student')->insert(
//            ['name'=>'bluce', 'age'=>39],
//            ['name'=>'robin', 'age'=>23]
//        );
//        dd($res);

        //更新为指定的内容 [更新数据一定要带条件]
//       $res = DB::table('student')->where('name', 'bluce')->update(['age'=>'25']);
//       dd($res);

        //更新自增
//        $num = DB::table('student')->increment('age', 1);
//        dd($num);

        //更新自减
//        $num = DB::table('student')->decrement('age', 1);
//        dd($num);


        //删除数据
//       $num =  DB::table('student')->where('id', '1002')->delete();
//       dd($num);

        //清空数据表
//        DB::table('student')->truncate();
    }

    public function query4(){

        //get 获取表的所有数据
//        $res = DB::table('student')->get();
//        dd($res);

        //first 取出结果集中第一条数据
//        $res = DB::table('student')->orderby('id', 'desc')->first();
//        dd($res);

        //where多个条件
//        $res = DB::table('student')->whereRaw('id >=? and age >?',['1001', 18])->get();
//        dd($res);

        //返回指定的列
//        $res = DB::table('student')->whereRaw('id >=? and age >?',['1001', 18])->pluck('name');
//        dd($res);
        //返回指定的列并带有主键  [只能有一列]
//        $res = DB::table('student')->whereRaw('id >=? and age >?',['1001', 18])->pluck('name', 'id');
//        dd($res);

        //分段查询
        echo "<pre />";
        $res = DB::table('student')->orderBy('id')->chunk(2, function ($students){
            print_r($students);
            return false; //终止查询
        });
    }

    //聚合函数
    public function  query5(){

        //个数
//        $res = DB::table('student')->count();
//        echo "<pre />"; print_r($res);die;

        //最大值
//        $res = DB::table('student')->max('age');
//        echo "<pre />"; print_r($res);die;

        //最小值
//        $res = DB::table('student')->min('age');
//        echo "<pre />"; print_r($res);die;

        //平均值
//        $res = DB::table('student')->avg('age');
//        echo "<pre />"; print_r($res);die;

        //总和
        $res = DB::table('student')->sum('age');
        echo "<pre />"; print_r($res);die;
    }

    //Eloquent ORM
    public function query6(){
        //1、 Eloquent ORM简介、模型的建立以及查询数据
        //2、Eloquent ORM中新增数据、自定义时间戳及批量赋值的使用
        //3、使用Eloquent ORM修改数据
        //4、使用Eloquent ORM删除数据

        //Laravel所自带的Eloquemnt ORM是一个优美、简洁的ActiveRecord实现，用来实现数据库操作
        //每个数据表都有一个与之相对应的“模型(Model)”用于和数据表交互

    }

    public function orm1(){
//        $students = Student::all();  //结果是个集合
//        $students = Student::get();  //结果是个集合
//        echo "<pre />"; print_r($students);die;

        //主键查询
//        $student = Student::find(1001);
//        echo "<pre />"; print_r($student);die;

        //根据主键去查找，如果没有查找到就报错
//        $student = Student::findOrFail(1005);
//        echo "<pre />"; print_r($student);die;

        //聚合函数
//        $num = Student::count();
//        echo "<pre />"; print_r($num);die;
    }

    //ORM中的新增、自定义时间戳及批量赋值
    public  function orm2(){

        //1、通过模型新增数据(涉及到自定义时间戳)
        //2、使用模型Create方法新增数据（涉及到批量赋值）
//        $student = new Student();
//        $student->name='zhangsan';
//        $student->age='23';
//        $bool = $student->save();
//        dd($bool);die;

//        $student = Student::find(1008);
//        //数据库里面是int类型，自动格式化了, 模型中添加了asDateTime，则原样返回
//        echo $student->created_at;

         //使用模型的Cteate方法新增数据
        //模型中要设置$fillable字段
        $student = Student::create(['name'=>'lisi', 'age'=>34]);
        var_dump($student);die;
    }

    //ORM修改数据
    public  function  orm3(){

        //通过模型修改数据
        //此方法会自动更新时间戳,导致报 Call to a member function format() on string 错误
//        $stusent = Student::find(1008);
//        $stusent->name= 'robbin';
//        $res = $stusent->save();
//        var_dump($res);die;

        //查询构造器更新
//        $num  = Student::where('id', '>' , 1005)->update(['age'=>41]);
//        var_dump($num);die;
    }

    //删除
    public function orm4(){

        //通过模型删除
//        $stusent = Student::find(1007);
//        $bool = $stusent->delete();
//        var_dump($bool);die;

        //通过主键删除
//        $num = Student::destroy(1006);
//        $num = Student::destroy(1004,1005); //删除多条记录
//        $num = Student::destroy([1003]); //删除多条记录, 数组
//        var_dump($num);die;

        //删除指定条件的数据
//        $num  = Student::where('id', '>' , 1005)->delete();
//        var_dump($num);die;
    }



}
