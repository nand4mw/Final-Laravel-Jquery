<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AlatTangkapModel extends Model
{
    use HasFactory;
    protected $table = 'alat_tangkap';
    protected $guarded = [];

    public static function getAlatTangkap()
    {
        $data = DB::table('alat_tangkap');
        return $data;
    }
}
