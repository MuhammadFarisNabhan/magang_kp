<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <form class="info-box" action="" method="post">
        <table class="tb">
            <tr>
                <td class="vv">Tahun Akademik : </td>
                <td class="vv1">2023/2024</td>
            </tr>
            <tr>
                <td class="vv">Semester : </td>
                <td class="vv1">Genap</td>
            </tr>
            <tr>
                <td class="vv">Perkuliahan : </td>
                <td class="vv1">Reguler</td>
            </tr>
            <tr>
                <td class="vv">Jenis : </td>
                <td><select name="semester" class="vq">
                <option value="1" selected >Kuliah</option>
                <option value="2">UTS</option>
                <option value="3">UAS</option>
                </select></td>
                <td><input name="browse" type="submit" value="Browse" class="vv3"></td>
            </tr>
        </table>
    </form>
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
        <tr class="data-row">
            <td class="data-cell first-cell">Senin</td>
            <td class="data-cell">20.00</td>
            <td class="data-cell">04.00</td>
            <td class="data-cell">9.9905</td>
            <td class="data-cell">200000</td>
            <td class="data-cell">2</td>
            <td class="data-cell">Internet Cafe</td>
            <td class="data-cell">6</td>
        </tr>
        <tr class="data-row">
            <td class="data-cell first-cell">Selasa</td>
            <td class="data-cell">20.00</td>
            <td class="data-cell">04.00</td>
            <td class="data-cell">9.9905</td>
            <td class="data-cell">200000</td>
            <td class="data-cell">2</td>
            <td class="data-cell">Internet Cafe</td>
            <td class="data-cell">6</td>
        </tr>
        <tr class="data-row">
            <td class="data-cell first-cell">Rabu</td>
            <td class="data-cell">20.00</td>
            <td class="data-cell">04.00</td>
            <td class="data-cell">9.9905</td>
            <td class="data-cell">200000</td>
            <td class="data-cell">2</td>
            <td class="data-cell">Internet Cafe</td>
            <td class="data-cell">6</td>
        </tr>
</x-layout>