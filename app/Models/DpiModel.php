<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DpiModel extends Model
{
    use HasFactory;


    protected $table = 'dpi';
    protected $guarded = [];

    public static function getAllDpi()
    {
        $query = DB::table('dpi');
        return $query;
    }
}
