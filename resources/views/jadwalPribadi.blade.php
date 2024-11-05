<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <form class="info-box" action="" method="post">
        <table class="tb">            
            <tr>
                <td class="vv">Tahun Akademik : </td>
                <td class="vv1">{{ $jadwalPribadi['information']['tahun_akademik'] ?? "" }}</td>
            </tr>
            <tr>
                <td class="vv">Semester : </td>
                <td class="vv1">{{ $jadwalPribadi['information']['semester'] ?? ""}}</td>
            </tr>
            <tr>
                <td class="vv">Perkuliahan : </td>
                <td class="vv1">Reguler</td>
            </tr>                
            <tr>
            <form action="{{ route('getJadwal') }}" method="POST">
                {{ csrf_field() }}
                <td class="vv">Jenis : </td>
                <td>
                    <select name="kategori" class="vq">
                        <option value="kuliah" selected >Kuliah</option>
                        <option value="uts">UTS</option>
                        <option value="uas">UAS</option>
                    </select>
                </td>
                <td><input name="browse" type="submit" value="Browse" class="vv3"></td>
            </form>
            </tr>
        </table>
    </form>
    <x-table-jadwal :jadwalPribadi="$jadwalPribadi"></x-table-jadwal>
    {{-- {{ $slot }} --}}
</x-layout>