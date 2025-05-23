<?php

namespace App\Http\Controllers\Api\DataDosen;

use App\Http\Controllers\Api\BaseApiTrait;
use App\Models\DosenTetapPT;
use App\Http\Controllers\Controller;

/**
 * Controller for managing DosenTetapPT endpoints.
 * 
 * @package App\Http\Controllers\Api\DataDosen
 */
class DosenTetapApiController extends Controller
{
    use BaseApiTrait;

    /**
     * Get the model class name.
     *
     * @return string
     */
    protected function getModelClass()
    {
        return DosenTetapPT::class;
    }
    
    /**
     * Get validation rules for storing a new record.
     *
     * @return array
     */
    protected function getStoreValidationRules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'tahun_ajaran_id' => 'required|exists:tahun_ajaran_semester,id',
            'nama_dosen' => 'required|string|max:255',
            'nidn_nidk' => 'required|string',
            'gelar_magister' => 'required|string',
            'gelar_doktor' => 'nullable|string',
            'bidang_keahlian' => 'nullable|string|max:255',
            'kesesuaian_kompetensi' => 'nullable|boolean',
            'jabatan_akademik' => 'nullable|string|exists:jabatan_fungsional,nama',
            'sertifikat_pendidik' => 'nullable|string',
            'sertifikat_kompetensi' => 'nullable|string',
            'mk_diampu' => 'nullable|string',
            'kesesuaian_keahlian_mk' => 'nullable|boolean',
            'mk_ps_lain' => 'nullable|string',
        ];
    }
    
    /**
     * Get validation rules for updating a record.
     *
     * @return array
     */
    protected function getUpdateValidationRules()
    {
        return [
            'user_id' => 'sometimes|required|exists:users,id',
            'tahun_ajaran_id' => 'sometimes|required|exists:tahun_ajaran_semester,id',
            'nama_dosen' => 'sometimes|required|string|max:255',
            'nidn_nidk' => 'sometimes|required|string',
            'gelar_magister' => 'sometimes|required|string',
            'gelar_doktor' => 'nullable|string',
            'bidang_keahlian' => 'nullable|string|max:255',
            'kesesuaian_kompetensi' => 'nullable|boolean',
            'jabatan_akademik' => 'nullable|string|exists:jabatan_fungsional,nama',
            'sertifikat_pendidik' => 'nullable|string',
            'sertifikat_kompetensi' => 'nullable|string',
            'mk_diampu' => 'nullable|string',
            'kesesuaian_keahlian_mk' => 'nullable|boolean',
            'mk_ps_lain' => 'nullable|string',
        ];
    }
}
