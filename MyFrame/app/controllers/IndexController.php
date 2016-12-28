<?php
namespace app\controllers;

use app\model\IndexModel;
use core\lib\route;
use Illuminate\Support\Facades\View;

class IndexController extends Controller
{
    public function index()
    {
        $model = new IndexModel();
        $data = $model->select();
        //dump($data);die;
        $this->view('index',['data'=>$data]);
    }

    public function add()
    {
        echo 123;
    }
}