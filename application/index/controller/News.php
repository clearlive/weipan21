<?php
namespace app\index\controller;
use think\Db;


class News extends Base
{
    public function index(){
    
		 return $this->fetch(); 
    }

}
