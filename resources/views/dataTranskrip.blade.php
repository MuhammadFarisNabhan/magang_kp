<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="info-box">
        <table class="">
            <tr>
                <td colspan="4">&nbsp;</td>
            </tr>            
            @foreach ($data["TotalMk"] as $dMk)
            @foreach ($data["TotalSks"] as $dSks)
                
            @endforeach
                <tr class="vn1">
                <td>&nbsp;&nbsp;<b>Total MK</b></td>
                <td class="vn2"><b>:</b></td>
                    <td class="vl"><b><?= $dMk; ?></b></td>
                </tr>
                <tr class="vn1">
                    <td>&nbsp;&nbsp;<b>Total SKS</b></td>
                    <td class="vn2"><b>:</b></td>
                    <td class="vl"><b>{{ $dSks }}</b></td>
                </tr>
                <tr class="vn1">
                    <td>&nbsp;&nbsp;<b>Total Mutu</b></td>
                    <td class="vn2"><b>:</b></td>
                    <td class="vl"><b></b></td>
                </tr>
                <tr class="vn1">
                    <td>&nbsp;&nbsp;<b>IPK</b></td>
                    <td class="vn2"><b>:</b></td>
                    <td class="vl"><b></b></td>
                </tr>
            @endforeach
        <tr>
            <td colspan="4">&nbsp;</td>
        </tr>
        </table>
    </div>
    
    <table class="score-table">
        <tr class="header-row">
            <th class="header-cell1">No</th>
            <th class="header-cell1">Kode MK</th>
            <th class="header-cell1">Nama Mata Kuliah</th>
            <th class="header-cell1">SKS</th>
            <th class="header-cell1">Nilai</th>
            <th class="header-cell1">Mutu</th>
        </tr>
        <?php $no = 1 ?>
        @foreach ($data['datas'] as $d)
        <tr class="data-row">
            <td class="data-cell"><?= $no++; ?></td>
            <td class="data-cell">{{ $d->kode_matakuliah }}</td>
            <td class="data-cell">{{ $d->nama }}</td>
            <td class="data-cell">{{ $d->sks }}</td>
            <td class="data-cell">{{ $d->nilai }}</td>
            <td class="data-cell">dsadsad</td>
        </tr>
        @endforeach
        {{-- <tr class="data-row">
            <td class="data-cell">asdkjsa</td>
            <td class="data-cell">asdasdas</td>
            <td class="data-cell">asdksand</td>
            <td class="data-cell">asdkasn</td>
            <td class="data-cell">dasdsadsa</td>
            <td class="data-cell">dsadsad</td>
        </tr>
        <tr class="data-row">
            <td class="data-cell">asdkjsa</td>
            <td class="data-cell">asdasdas</td>
            <td class="data-cell">asdksand</td>
            <td class="data-cell">asdkasn</td>
            <td class="data-cell">dasdsadsa</td>
            <td class="data-cell">dsadsad</td>
        </tr>        --}}
    </table>
</x-layout>