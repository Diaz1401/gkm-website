<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SitasiKaryaDosen extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sitasi_karya_dosen';
    protected $fiilable = [
        'user_id',
        'nama_dosen',
        'judul_sitasi',
        'tahun',
    ];
}
