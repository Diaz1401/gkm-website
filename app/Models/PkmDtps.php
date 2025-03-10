<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PkmDtps extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pkm_dtps';
    protected $fillable = [
        'user_id',
        'tema',
        'nama_mhs',
        'judul',
        'tahun',
    ];
}
