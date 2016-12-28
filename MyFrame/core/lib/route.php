<?php
namespace core\lib;

class route
{
    public $ctrl;
    public $action;
    public function __construct()
    {
        /**
         * 1、获取URL中参数
         * 2、返回对应控制器和方法
         */
        $url = $_SERVER['REQUEST_URI'];
        if(isset($url) && $url != '/') {
            $path =  explode('/',substr($url,strpos($url,'?c=')+3));
            $action = substr($path[1],0,strpos($path[1],'&'));
            if(isset($path[0])){
                $this->ctrl = $path[0];
            }
            if(isset($path[1])){
                if($action!=''){
                    $this->action = $action;
                }else{
                    $this->action = $path[1];
                }
            } else {
                $this->action = config::get('ACTION','route');
            }
        } else {
            $this->ctrl = config::get('CONTROLLER','route');
            $this->action = config::get('ACTION','route');
        }

    }

    static public function get()
    {
        $url = $_SERVER['REQUEST_URI'];
        $path =  explode('/',substr($url,strpos($url,'?c=')+3));
        $input = ltrim(substr($path[1],strpos($path[1],'&')),'&');
        $arr = explode('&',$input);
        foreach($arr as $v){
            $data[] = explode('=',$v);
        }
        foreach($data as $k=>$v){
            $_GET[$v[0]] = $v[1];
            unset($_GET['c']);
        }
        return $_GET;
    }

    static public function post()
    {
        return dump($_POST);
    }
}