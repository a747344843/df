<?php
namespace app\model;
use Illuminate\Database\Capsule\Manager as DB;
class IndexModel {
    public function select()
    {
        return DB::table('news')->get();
    }
}