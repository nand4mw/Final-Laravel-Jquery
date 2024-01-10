<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KapalModel extends Model
{
    use HasFactory;

    protected $table = 'kapal';
    protected $guarded = [];

    public static function getAllKapal()
    {
        $query = 'SELECT * FROM kapal join dpi on kapal.id_dpi = dpi.id_dpi join pemilik on kapal.id_pemilik = pemilik.id_pemilik join alat_tangkap on kapal.id_alat_tangkap = alat_tangkap.id_alat_tangkap ';

        return DB::select($query);
    }
}
