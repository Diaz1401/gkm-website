<?php

namespace App\Http\Controllers\Admin\KinerjaDosen;

use App\Http\Controllers\Controller;
use App\Models\PublikasiIlmiahDosen;
use Illuminate\Http\Request;
use App\Models\TahunAjaranSemester;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PublikasiIlmiahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $tahunAjaran)
    {
        try {
            $publikasi = PublikasiIlmiahDosen::with('user')->get();

            $title = 'Hapus Data!';
            $text = "Apakah kamu yakin ingin menghapus?";
            confirmDelete($title, $text);

            return view('pages.admin.kinerja-dosen.publikasi-ilmiah.index', [
                'publikasi_ilmiah' => $publikasi,
                'tahun_ajaran' => $tahunAjaran,
            ]);
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $tahunAjaran)
    {
        try {
            $publikasi = new PublikasiIlmiahDosen();
            return view('pages.admin.kinerja-dosen.publikasi-ilmiah.form', [
                'publikasi_ilmiah' => $publikasi,
                'tahun_ajaran' => $tahunAjaran,
                'form_title' => 'Tambah Data',
                'form_action' => route('admin.kinerja-dosen.publikasi-ilmiah.store', $tahunAjaran),
                'form_method' => "POST",
            ]);
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,string $tahunAjaran)
    {
        try {
            // dd($request->all());
            $validator = Validator::make($request->all(), [
                'nama_dosen' => 'required|string|max:255',
                'bidang_keahlian' => 'required|string|max:255',
                'nama_rekognisi' => 'required|string',
                'bukti_pendukung' => 'required|url',
                'tingkat' => 'required|string|in:lokal,nasional,internasional',
                'tahun' => 'required|string',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator->messages()->all()[0])->withInput();
            }

            $validated = $request->all();
            $validated['user_id'] = Auth::id();
            // dd($validated);

            $create = PublikasiIlmiahDosen::create($validated);
            if ($create) {
                return redirect()->route('admin.kinerja-dosen.publikasi-ilmiah.index', $tahunAjaran)
                    ->with('toast_success', 'Data rekognisi dtps berhasil ditambahkan');
            }

            throw new \Exception('Data rekognisi dtps gagal ditambahkan');
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id,string $tahunAjaran)
    {
        try {
            $publikasi = PublikasiIlmiahDosen::with('user')->first();

            return view('pages.admin.kinerja-dosen.publikasi-ilmiah.form', [
                'publikasi_ilmiah' => $publikasi,
                'tahun_ajaran' => $tahunAjaran,
                'form_title' => 'Edit Data',
                'form_action' => route('admin.kinerja-dosen.publikasi-ilmiah.update', [
                    'tahunAjaran' => $tahunAjaran,
                    'publikasiId' => $publikasi->id,
                ]),
                'form_method' => "PUT",
            ]);
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id,string $tahunAjaran)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nama_dosen' => 'required|string|max:255',
                'nidk' => 'nullable|numeric',
                'perusahaan' => 'nullable|string',
                'pendidikan_tertinggi' => 'nullable|string',
                'bidang_keahlian' => 'nullable|string|max:255',
                'sertifikat_kompetensi' => 'nullable|string',
                'mk_diampu' => 'nullable|string',
                'bobot_kredit_sks' => 'nullable|numeric',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator->messages()->all()[0])->withInput();
            }

            $validated = $request->all();

            $dosenPraktisi = PublikasiIlmiahDosen::findOrFail($id);
            $update = $dosenPraktisi->update($validated);
            if ($update) {
                return redirect()->route('admin.kinerja-dosen.publikasi-ilmiah.index', $tahunAjaran)
                    ->with('toast_success', 'Data dosen praktisi berhasil diupdate');
            }

            throw new \Exception('Data dosen praktisi gagal diupdate');
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id,string $tahunAjaran)
    {
        try {
            $publikasi = PublikasiIlmiahDosen::findOrFail($id);
            $delete = $dosenPraktisi->delete();

            if ($delete) {
                return redirect()->route('admin.kinerja-dosen.publikasi-ilmiah.index', $tahunAjaran)
                    ->with('toast_success', 'Data dosen praktisi berhasil dihapus');
            }

            throw new \Exception('Data dosen praktisi gagal dihapus');
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }
}
