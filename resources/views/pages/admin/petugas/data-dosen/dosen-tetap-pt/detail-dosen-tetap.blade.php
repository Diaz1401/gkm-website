@extends('layouts.petugas')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Data Dosen /</span>
            <span class="text-muted fw-light">Dosen Tetap Perguruan Tinggi /</span>
            {{ $data_dosen->profile->nama }}
        </h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Tabel Dosen Tetap Perguruan Tinggi</h5>
                    <hr class="my-0" />
                    <div class="card-body">
                        <!-- #s tabel -->
                        <div class="table-responsive text-nowrap mb-3">
                            <table class="table table-bordered table-hover">
                                <thead class="table-info">
                                    <tr>
                                        <th rowspan="2">No.</th>
                                        <th rowspan="2">Nama Dosen</th>
                                        <th rowspan="2">NIDN/NIDK</th>
                                        <th colspan="2" class="text-center">Pendidikan Pasca Sarjana</th>
                                        <th rowspan="2">Bidang Keahlian</th>
                                        <th rowspan="2">
                                            Kesesuaian <br>dengan <br>Kompetensi Inti <br>PS
                                        </th>
                                        <th rowspan="2">
                                            Jabatan <br>Akademik
                                        </th>
                                        <th rowspan="2">
                                            Sertifikat <br>Pendidik <br>Profesional
                                        </th>
                                        <th rowspan="2">
                                            Sertifikat <br>Kompetensi/ <br>Profesi/ <br>Industri
                                        </th>
                                        <th rowspan="2">
                                            Mata Kuliah yang <br>Diampu pada PS
                                        </th>
                                        <th rowspan="2">
                                            Kesesuaian <br>Bidang <br>Keahlian <br>dengan Mata <br>Kuliah yang <br>Diampu
                                        </th>
                                        <th rowspan="2">
                                            Mata Kuliah <br>yang Diampu <br>pada PS Lain
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Magister/ <br>Magister Terapan/ <br>Spesialis</th>
                                        <th class="text-center">Doktor/ <br>Doktor Terapan/ <br>Spesialis</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @forelse ($data_dosen->dosen_tetap as $dosen)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $dosen->nama_dosen }}</td>
                                            <td>{{ $dosen->nidn_nidk }}</td>
                                            <td class="text-wrap">{{ $dosen->gelar_magister }}</td>
                                            <td class="text-wrap">{{ $dosen->gelar_doktor }}</td>
                                            <td class="text-wrap">{{ $dosen->bidang_keahlian }}</td>
                                            <td class="text-center">{{ $dosen->kesesuaian_kompetensi ? '✓' : '' }}</td>
                                            <td class="text-center">{{ $dosen->jabatan_akademik }}</td>
                                            <td class="text-center text-wrap">{{ $dosen->sertifikat_pendidik }}</td>
                                            <td class="text-center text-wrap">{{ $dosen->sertifikat_kompetensi }}</td>
                                            <td>{!! $dosen->mk_diampu !!}</td>
                                            <td class="text-center">{{ $dosen->kesesuaian_keahlian_mk ? '✓' : '' }}</td>
                                            <td>{!! $dosen->mk_ps_lain !!}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="12"> Belum ada data kerjasama </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- #e tabel -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
