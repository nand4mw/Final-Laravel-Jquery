<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AlatTangkapModel extends Model
{
    use HasFactory;
    protected $table = 'alatTangkap';
    protected $guarded = [];

    public static function getAllAlatTangkap()
    {
        $data = DB::table('alat_tangkap');
        return $data;
    }
}
