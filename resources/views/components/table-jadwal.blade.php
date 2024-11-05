{{-- <x-jadwalPribadi>  --}}
    <table class="score-table">
        <tr class="header-row">
            <th class="header-cell1" >Hari</th>
            <th class="header-cell1" >Mulai</th>
            <th class="header-cell1" >Akhir</th>
            <th class="header-cell1" >Ruang</th>
            <th class="header-cell1" >Kode MK</th>
            <th class="header-cell1" >Kelas</th>
            <th class="header-cell1" >Nama MK</th>
            <th class="header-cell1" >SKS</th>
        </tr>
        @foreach ($jadwalPribadi['dataJadwalPribadi'] as $j)            
            <tr class="data-row">
                <td class="data-cell first-cell">{{ $j->hari }}</td>
                <td class="data-cell">{{ $j->awal }}</td>
                <td class="data-cell">{{ $j->akhir }}</td>
                <td class="data-cell">{{ $j->tempat }}</td>
                <td class="data-cell">{{ $j->kode_matakuliah }}</td>
                <td class="data-cell">{{ $j->kelas }}</td>
                <td class="data-cell">{{ $j->nama }}</td>
                <td class="data-cell">{{ $j->sks }}</td>
            </tr>                    
        @endforeach
    </table>
{{-- </x-jadwalPribadi> --}}