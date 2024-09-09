<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="vertical-overlay"></div>        <div class="main-content">
    <div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header">
                                    <h5 class="card-title mb-3">CETAK KRS / KPU</h5>
                                </div>
                                    <div class="card-body">
                                    <div class="col-xxl-6 col-md-6">
                                        <form action="" method="post">
                                            <table class="table table-borderless mb-0">
                                                @foreach ($data['Krs'] as $dk)
                                                    
                                                @endforeach
                                                <tbody>
                                                    <tr>
                                                        <th class="ps-0" style="text-align: end;" scope="row">Tahun Akademik :</th>
                                                        <td class="text-muted">{{ $dk->tahun_akademik }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" style="text-align: end;" scope="row">Semester :
                                                        </th>
                                                           <td class="text-muted">{{ $dk->semester }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" style="text-align: end;" scope="row">
                                                            Perkuliahan :</th>
                                                        <td class="text-muted">{{ $dk->perkuliahan }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" style="text-align: end;" scope="row">Cetak :
                                                        </th>
                                                        <td class="text-muted">
                                                            <div class="row gy-4">
                                                                <div class="col-xxl-6 col-md-6">
                                                                    <select class="form-select rounded-pill mb-3"
                                                                        aria-label="Default select example"
                                                                        name="tipe_cetak">
                                                                        <option value="1" selected>KRS</option>
                                                                        <option value="2">KPU UTS</option>
                                                                        <option value="3">KPU UAS</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div class="row gy-4">
                                                <div class="col-xxl-6 col-md-6">
                                                </div>
                                                <div class="col-xxl-3 col-md-3">
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <button type="submit" class="btn btn-primary">Review</button>
                                                        <!-- <button type="button" class="btn btn-soft-success">Cancel</button> -->
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-md-3">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="card-header">
                                    <hr>
                                    <h5 class="card-title mb-3">Data Mahasiswa</h5>
                                        <div class="card-tools">
                                        <ul class="nav nav-pills ml-auto">
                                            <li class="nav-item">
                                                <a href="/cetak_kartu_krs_kpu/1"
                                                    class="btn btn-primary" target="_blank">Cetak</a>
                                            </li>
                                        </ul>
                                    </div>
                                        </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example"
                                            class="table table-bordered table-striped table-valign-middle">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>No.</th>
                                                    <th>Kode MK</th>
                                                    <th>Kelas</th>
                                                    <th>Nama Matakuliah</th>
                                                    <th>SKS</th>
                                                    <th>Pertemuan</th>
                                                    <th>Dosen</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            <tfoot>
                                            <tfoot>
                                                    <tr>
                                                        <td colspan="4" align="right">Jumlah Kredit: </td>
                                                        <td class="text-center">0</td>
                                                        <td colspan="2"></td>
                                                    </tr>
                                                </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

</x-layout>
