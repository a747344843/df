<?php
namespace core\lib;
use Illuminate\Database\Capsule\Manager as Capsule;
class models
{
    public function __construct()
    {
        $database = config::all('database');//取得数据库配置文件中的配置
        $capsule = new Capsule();
        $capsule->addConnection($database);
        $capsule->setAsGlobal(); //important
        $capsule->bootEloquent();
    }
}

