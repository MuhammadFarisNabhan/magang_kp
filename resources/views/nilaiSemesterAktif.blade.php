<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <table>
        @foreach ($data['dataKrs'] as $dK )
            
        <tr class="vn">
            <td colspan="4" align="left"><b>NILAI MAHASISWA PERIODE AKTIF</b></td>
        </tr>
        <tr>
            <td colspan="4">&nbsp;</td>
        </tr>
        <tr class="vn">
            <td><b>Tahun Akademik : </b></td>
            <td class="vl"><b>{{ $dK->tahun_akademik }}</b></td>
        </tr>
        <tr class="vn">
            <td><b>Semester : </b></td>
            <td class="vl"><b>{{ $dK->semester }}</b></td>
        </tr>
        <tr class="vn"> 
            <td><b>Perkuliahan : </b></td>
            <td class="vl"><b>{{ $dK->perkuliahan }}</b></td>
        </tr>
        <tr>
            <td colspan="4">&nbsp;</td>
        </tr>
        @endforeach
    </table>
    <table class="score-table">
        <tr class="header-row">
            <th class="header-cell" rowspan="2">No</th>
            <th class="header-cell" rowspan="2">Kode MK</th>
            <th class="header-cell" rowspan="2">Nama MK</th>
            <th class="header-cell" colspan="2">Sikap/Perilaku</th>
            <th class="header-cell" colspan="2">Tugas 1</th>
            <th class="header-cell" colspan="2">Tugas 2</th>
            <th class="header-cell" colspan="2">Rata Tugas</th>
            <th class="header-cell" colspan="2">UTS</th>
            <th class="header-cell" colspan="2">UAS</th>
            <th class="header-cell" rowspan="2">Total</th>
            <th class="header-cell" rowspan="2">Huruf</th>
            <th class="header-cell" rowspan="2">Mutu</th>
        </tr>
        <tr class="header-row">
            <th class="sub-header-cell">B</th>
            <th class="sub-header-cell">N</th>
            <th class="sub-header-cell" colspan="2">N</th>
            <th class="sub-header-cell" colspan="2">N</th>
            <th class="sub-header-cell">B</th>
            <th class="sub-header-cell">N</th>
            <th class="sub-header-cell">B</th>
            <th class="sub-header-cell">N</th>
            <th class="sub-header-cell">B</th>
            <th class="sub-header-cell">N</th>
        </tr>
        {{-- @foreach ($data['dataMatkul'] as $dM)         --}}
        <tr class="data-row">
            <td class="data-cell first-cell">1</td>
            {{-- <td class="data-cell">{{ $dM->kode_matakuliah }}</td> --}}
            {{-- <td class="data-cell">{{ $dM->nama }}</td> --}}
            <td class="data-cell">10</td>
            <td class="data-cell">0</td>
            <td class="data-cell">80</td>
            <td class="data-cell">0</td>
            <td class="data-cell">80</td>
            <td class="data-cell">0</td>
            <td class="data-cell">30</td>   
            <td class="data-cell">40</td>
            <td class="data-cell">30</td>
            <td class="data-cell">77</td>
            <td class="data-cell">30</td>
            <td class="data-cell">0</td>
            <td class="data-cell">35.1</td>
            <td class="data-cell">E</td>
            <td class="data-cell">0.0</td>
        </tr>
        {{-- @endforeach --}}
        {{-- <tr class="data-row">
            <td class="data-cell first-cell">2</td>
            <td class="data-cell">22080304135</td>
            <td class="data-cell">Metodologi Penelitian</td>
            <td class="data-cell">10</td>
            <td class="data-cell">0</td>
            <td class="data-cell">80</td>
            <td class="data-cell">0</td>
            <td class="data-cell">80</td>
            <td class="data-cell">0</td>
            <td class="data-cell">30</td>   
            <td class="data-cell">40</td>
            <td class="data-cell">30</td>
            <td class="data-cell">77</td>
            <td class="data-cell">30</td>
            <td class="data-cell">0</td>
            <td class="data-cell">35.1</td>
            <td class="data-cell">E</td>
            <td class="data-cell">0.0</td>
        </tr> --}}
    </table>
</x-layout>