<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PemilikModel extends Model
{
    use HasFactory;
    protected $table = 'pemilik';
    protected $guarded = [];

    public static function getAllPemilik()
    {
        $query = DB::table('pemilik');
        return $query;
    }
}
