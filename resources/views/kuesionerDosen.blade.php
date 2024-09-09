<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <form class="info-box">
    <table>
        @foreach ($data['user'] as $du)            
            <tr class="vn1"> 
            </tr>
            <tr class="vn1">
                <td >Nama </td>
                <td class="vn2">:</td>
                <td class="vv1">{{ $du->name }}</td>
            </tr>
            <tr class="vn1">
                <td>NPM </td>
                <td class="vn2">:</td>
                <td class="vv1">217064516023</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
        @endforeach
        @foreach ($data['userKrs'] as $dkrs)            
            <tr class="vn1">
                <td>Tahun Akademik</td>
                <td class="vn2"><b>:</b></td>
                <td class="vv1">{{ $dkrs->tahun_akademik }}</td>
            </tr>
            <tr class="vn1">
                    <td>Semester</td>
                    <td class="vn2"><b>:</b></td>
                    <td class="vv1">{{ $dkrs->semester }}</td>
                </tr>
                <tr class="vn1">
                    <td>Perkuliahan</td>
                    <td class="vn2"><b>:</b></td>
                    <td class="vv1">{{ $dkrs->perkuliahan }}</td>
                </tr>
        @endforeach
        </table>
    </form>
    <table class="score-table">
        <tr class="header-row">
            <th class="header-cell1" >No</th>
            <th class="header-cell1" >Kode MK</th>
            <th class="header-cell1" >Nama Mata Kuliah</th>
            <th class="header-cell1" >Dosen</th>
            <th class="header-cell1" >Kuesioner</th>
        </tr>
    </table>
    


</x-layout>