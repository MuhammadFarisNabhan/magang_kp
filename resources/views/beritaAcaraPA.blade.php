<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <form class="info-box">
    <table>
        @foreach ($data as $d)            
        <tr>
            <td colspan="4">&nbsp;</td>
        </tr>
        <tr class="vn1">
            <td>&nbsp;&nbsp;<b>Tahun Akademik</b></td>
            <td class="vn2"><b>:</b></td>
            <td class="vl"><b>{{ $d->tahun_akademik }}</b></td>
        </tr>
        <tr class="vn1">
            <td>&nbsp;&nbsp;<b>Semester</b></td>
            <td class="vn2"><b>:</b></td>
            <td class="vl"><b>{{ $d->semester }}</b></td>
        </tr>
        <tr class="vn1"> 
            <td>&nbsp;&nbsp;<b>Perkuliahan</b></td>
            <td class="vn2"><b>:</b></td>
            <td class="vl"><b>{{ $d->perkuliahan }}</b></td>
        </tr>
        <tr class="vn1"> 
            <td>&nbsp;&nbsp;<b>Dosen Pembimbing Akademik</b></td>
            <td class="vn2"><b>:</b></td>
            <td class="vl"><b>Julio</b></td>
        </tr>
        <tr>
            <td colspan="4">&nbsp;</td>
        </tr>
        @endforeach
    </table>
    </form>
    <table class="score-table">
        <tr class="header-row">
            <th class="header-cell1" >No</th>
            <th class="header-cell1" >Tanggal Bimbingan</th>
            <th class="header-cell1" >Berita Acara</th>
        </tr>
    </table>
</x-layout>