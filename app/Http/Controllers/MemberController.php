<?php

namespace App\Http\Controllers;


use App\Member;

class MemberController extends Controller
{
    //参考链接：https://www.imooc.com/video/12496
    public function info()
    {
        return Member::getMember();
//        return 'member-info-' . $id;
//        return  view('member/info',['name'=>'白石']);
    }


}
