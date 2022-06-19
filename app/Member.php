<?php

namespace App;



use Illuminate\Database\Eloquent\Model;

class Member extends  Model
{
    //参考链接：https://www.imooc.com/video/12498
  public  static  function getMember(){
        return 'member name is sean';
  }
}