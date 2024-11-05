<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h4>Mengisi Data KRS</h4>
    <div class="info-box">
        @php            
            $jumlahSks = 0;                        
            $statusKRS = [
                'draft' => 'DRAFT (BELUM DIPOSTING)',
                'posted' => 'DISETUJUI',
            ];
            $messages = [
                'messages'  => session('messages'),
                'success'   => session('success'),
                'error'     => session('error'),
            ];
            $cek = $mataKuliah['mataKuliah_diambil']->select('status')->first();            
            $statusSaatIni = (isset($cek) && $cek['status'] == 'berjalan') ? $statusKRS['posted'] : $statusKRS['draft'];        
            
        @endphp

        <span class="v14b">STATUS KRS ANDA : {{ $statusSaatIni }}</span>                    
        <br><br>PESAN DARI DOSEN PA : -<br><br>
        <tr class="k1" >
        <td class="k1">
        <table class="k1">
        <tr class="k1">
        <td class="k1">

        @foreach ($mataKuliah['mataKuliah_diambil'] as $mK_d)
            @php
                $jumlahSks += $mK_d->sks                
                @endphp
        @endforeach
        SKS YANG DAPAT DIAMBIL : &nbsp;<strong>24 &nbsp;SKS </strong> , Sudah Diambil :&nbsp;<strong>{{ $jumlahSks }} SKS</strong><br><br>
        
        @foreach ($messages as $type => $message)
            @if($message)
                <div class="alert alert-{{ $type === 'messages' ? 'warning' : ($type === 'success' ? 'success' : 'danger') }}">
                    {{ $message }}
                </div>
            @endif        
        @endforeach

        <table class="score-table">
            <div style="display: flex; justify-content:space-between; margin-bottom:7px">            
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                style="background-color:#4CAF50; border-radius:5px; border:1px solid black; padding:5px 15px; font-weight:600; color:white">
                    <i class="uil uil-plus" style="font-weight: 700; font-size:1rem"></i><span>  </span>Ambil Jadwal
                </button>
                <form action="{{ route('simpanKRS') }}" method="POST">
                    {{ csrf_field() }}
                    <button type="submit" name="simpanKRS" style="background-color:white; border-radius:5px;border:1px solid black;color:red;background-color:#e7f0fd; font-weight:bolder; padding:0 10px">
                        {{-- <i class="uil uil-share"></i> <span>  </span>  --}}
                        POSTING KRS
                    </button>            
                </form>
            </div>

        <tr class="header-row">
            <th class="header-cell1" >No</th>
            <th class="header-cell1" >Kode MK</th>
            <th class="header-cell1" >kelas</th>
            <th class="header-cell1" >Nama Matakuliah</th>
            <th class="header-cell1" >SKS</th>
            <th class="header-cell1" >Pertemuan</th>
            <th class="header-cell1" >Dosen</th>
            <th class="header-cell1" >Aksi</th>
        </tr>
    </form> 
    <form action="{{ route('hapusJadwal') }}" method="POST">
        {{ csrf_field() }}
        @foreach ($mataKuliah['mataKuliah_diambil'] as $mK_d)
            <tr class="data-row">
                <td class="data-cell first-cell">{{ $loop->iteration }}</td>
                <td class="data-cell">{{ $mK_d->kode_matakuliah }}</td>
                <td class="data-cell">{{ $mK_d->kelas }}</td>
                <td class="data-cell">{{ $mK_d->nama }}</td>
                <td class="data-cell">{{ $mK_d->sks }}</td>
                <td class="data-cell">{{ $mK_d->tempat }} - {{ $mK_d->waktu }}</td>
                <td class="data-cell">{{ $mK_d->nama_dosen }}</td>
                <td class="data-cell">                                                    
                    <button type="submit" class="{{ (isset($cek) && $cek['status'] == 'berjalan') ? 'hidden' : '' }}" value="{{ $mK_d->kode_matakuliah }}" name="hapusJadwal[]"
                        style="background: transparent;border:none;text-decoration:underline;color:blue">Hapus</button>
                </td>
            </tr>
        @endforeach
    </form>
       

    {{-- MODAL --}}
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header float-right">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Ambil Matakuliah</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">                    
                <div class="form_ambilMK" style="width: auto;display:flex;flex-direction:column">
                    <form action="{{ route('ambilJadwal') }}" method="POST">                    
                        {{ csrf_field() }}
                        <ul style="list-style: none; display:flex;">
                            <li class="text-center" style="flex-grow:1;">Kode Matakuliah</li>
                            <li class="text-center" style="flex-grow:1">Kelas</li>
                            <li class="text-center" style="flex-grow:2">Matakuliah</li>
                            <li class="text-center" style="flex-grow:2">Jadwal</li>
                            <li class="text-center" style="flex-grow:1">Sks</li>
                            <li class="text-center" style="flex-grow:2">Dosen</li>
                        </ul>
                        <ul id="selectedMKList">                                                                
                            @foreach ($mataKuliah['mataKuliah'] as $mK)    
                                <div>                                                                                                     
                                    <li class="itemInput">       
                                        <button type="submit" name="ambilMk" class="custom-submit"
                                            value="{{ $mK->kode_matakuliah }}_{{ $mK->kelas }}_{{ $mK->nama }}_{{ $mK->tempat }} - {{ $mK->waktu }}_{{ $mK->sks }}_{{ $mK->nama_dosen }}">                                                                                                                                                                              
                                                <ul>
                                                    <li class="kodeMk" style="flex-grow:1;">{{ $mK->kode_matakuliah }}</li>                                            
                                                    <li class="kelas" style="flex-grow:1;">{{ $mK->kelas }}</li>                                            
                                                    <li class="matakuliah" style="flex-grow:2;">{{ $mK->nama }}</li>                                            
                                                    <li class="jadwal" style="flex-grow:2;">{{ $mK->tempat }} - {{ $mK->waktu }}</li>                                            
                                                    <li class="sks" style="flex-grow:1;">{{ $mK->sks }}</li>                                            
                                                    <li class="dosen" style="flex-grow:2;">{{ $mK->nama_dosen }} </li>                                            
                                                </ul>                                            
                                        </button>                                                                
                                    </li>    
                                </div>
                            @endforeach
                        </ul>                        
                    </form>                                                                     
                </div>
            </div>
            </div>
        </div>
    </div>

    {{-- <script>
        function selectMatakuliah(kode, kelas, nama, tempat, waktu, sks, dosen) {
        const selectedMKList = document.getElementById('selectedMKList');
        selectedMKList.innerHTML = `
            <li style="display: flex; justify-content: space-between;">
                <span>${kode}</span>
                <span>${kelas}</span>
                <span>${nama}</span>
                <span>${tempat} - ${waktu}</span>
                <span>${sks}</span>
                <span>${dosen}</span>
            </li>
        `;

        // Set the hidden input with the selected values for form submission
        document.getElementById('selectedMk').value = `${kode}_${kelas}_${nama}_${tempat}_${waktu}_${sks}_${dosen}`;
    }
    </script> --}}

    </x-layout>