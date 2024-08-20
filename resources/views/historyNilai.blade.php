<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <form class="info-box" action="" method="post">
        <table class="tb">
            <tr>
                <td class="vv">Tahun Akademik : </td>
                <td><select name="thakad" class="vq">
                <option value="2021/2022">2021/2022</option>
                <option value="2022/2023">2022/2023</option>
                <option value="2023/2024" selected >2023/2024</option>
                </select></td>
                <td class="vv2">Total Mutu :</td>
                <td class="vv2"></td>
            </tr>
            <tr>
                <td class="vv">Semester : </td>
                <td><select name="semester" class="vq">
                <option value="1" selected >Ganjil</option>
                <option value="2">Genap</option>
                <option value="3">Antara</option>
                </select></td>
                <td class="vv2">Total SKS : </td>
                <td class="vv2"></td>
            </tr>
            <tr>
                <td class="vv">Perkuliahan : </td>
                <td><select name="perkuliahan" class="vq">
                <option value="1" selected >Reguler</option>
                <option value="2">Pendek</option>
                </select></td>
                <td class="vv2">IPS : </td>
                <td class="vv2"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input name="browse" type="submit" value="Browse"></td>
            </tr>
        </table>
    </form>
    <table class="score-table">
        <tr class="header-row">
            <th class="header-cell1" >No</th>
            <th class="header-cell1" >Kode MK</th>
            <th class="header-cell1" >Nama Mata Kuliah</th>
            <th class="header-cell1" >SKS</th>
            <th class="header-cell1" >Nilai</th>
            <th class="header-cell1" >Mutu</th>
        </tr>
        <tr class="data-row">
            <td class="data-cell first-cell">1</td>
            <td class="data-cell">20000000</td>
            <td class="data-cell">Internet Cafe</td>
            <td class="data-cell">6</td>
            <td class="data-cell">A</td>
            <td class="data-cell">12.0</td>
        </tr>
        <tr class="data-row">
            <td class="data-cell first-cell">2</td>
            <td class="data-cell">20000000</td>
            <td class="data-cell">Internet Cafe</td>
            <td class="data-cell">6</td>
            <td class="data-cell">A</td>
            <td class="data-cell">12.0</td>
        </tr>
        <tr class="data-row">
            <td class="data-cell first-cell">3</td>
            <td class="data-cell">20000000</td>
            <td class="data-cell">Internet Cafe</td>
            <td class="data-cell">6</td>
            <td class="data-cell">A</td>
            <td class="data-cell">12.0</td>
        </tr>
    </table>
</x-layout>