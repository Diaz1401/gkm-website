<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IpkLulusan extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ipk_lulusan';
    protected $fillable = [
        'user_id',
        'tahun',
        'jumlah_lulusan',
        'ipk_minimal',
        'ipk_maksimal',
        'ipk_rata_rata',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
