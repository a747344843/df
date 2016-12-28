<?php

namespace core;
use core\lib\log;
use core\lib\models;
use core\lib\route;
use duncan3dc\Laravel\Blade;
use duncan3dc\Laravel\BladeInstance;

class core
{
    public static $classMap = array();
    //防止重复引用类
    public $data;

    static public function run()
    {
        new models();//实例化数据库类
        $route = new route();//实例化路由类
        $controller = $route->ctrl;//获取控制器名
        $action     = $route->action;//获取方法名
        $ctrlfile = APP.'/controllers/'.ucfirst($controller).'Controller.php';//控制器文件路径
        $ctrlClass = '\\'.MODULE.'\controllers\\'.ucfirst($controller).'Controller';
        if(is_file($ctrlfile)){//验证这个文件是否存在
            include $ctrlfile;//包含控制器文件
            $ctrl = new $ctrlClass();//实例化控制器
            $ctrl->$action();//调用方法
            log::init();//将访问的控制器和方法写入到log文件中
            log::log('controller:'.$controller.'     '.'action:'.$action);
        } else {
            throw new \Exception('找不到控制器'.$ctrlfile);
        }
    }

    //自动加载类库
    static public function load($class)
    {
        //echo 123;
        //判断$classMap中是否有这个类
        if(isset($classMap[$class])){
            return true;
        } else {
            $class = str_replace('\\','/',$class);
            $file = PATH.'/'.$class.'.php';
            //判断这个文件是否存在
            if(is_file($file)) {
                include $file;
                //如果引入成功的话，就放到$classMap数组中
                self::$classMap[$class] = $class;
            } else {
                return false;
            }
        }
    }

    //调用视图
    public function view($view,$data = '')//接收视图和值
    {
        $blade = new BladeInstance(PATH.'/app/views',PATH.'/cache/views');
        echo $blade->make($view,$data)->render();
    }
}




































































