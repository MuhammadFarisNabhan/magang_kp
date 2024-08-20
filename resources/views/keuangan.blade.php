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
                <td colspan="2" rowspan="4">&nbsp;</td>
            </tr>
            <tr>
                <td class="vv">Semester : </td>
                <td><select name="semester" class="vq">
                <option value="1" selected >Ganjil</option>
                <option value="2">Genap</option>
                <option value="3">Antara</option>
                </select></td>
                <td></td>
            </tr>
            <tr>
                <td class="vv">Perkuliahan : </td>
                <td><select name="perkuliahan" class="vq">
                <option value="1" selected >Reguler</option>
                <option value="2">Pendek</option>
                </select></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input name="browse" type="submit" value="Browse"></td>
            </tr>
        </table>
    </form>
    <table class="tab">
        <thead>
            <tr class="header-row">
                <th class="thh">No</th>
                <th class="thh">Tanggal</th>
                <th class="thh">Uraian</th>
                <th class="thh">Saldo Awal</th>
                <th class="thh">Tagihan</th>
                <th class="thh">Pembayaran</th>
                <th class="thh">No. Kuitansi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="thh">1</td>
                <td class="thh">02/07/2024</td>
                <td class="thh">Tagihan Uang Kuliah</td>
                <td class="thh">0.0</td>
                <td class="thh">1925000.0</td>
                <td class="thh">0.0</td>
                <td class="thh">BNI VA - 99999999999999999</td>
            </tr>
            <tr>
                <td class="thh">2</td>
                <td class="thh">02/07/2024</td>
                <td class="thh">Tagihan Uang Kuliah</td>
                <td class="thh">0.0</td>
                <td class="thh">1925000.0</td>
                <td class="thh">0.0</td>
                <td class="thh">BNI VA - 99999999999999999</td>
            </tr>
            <tr>
                <td class="thh">3</td>
                <td class="thh">06/05/2024</td>
                <td class="thh">Pembayaran Uang Kuliah</td>
                <td class="thh">0.0</td>
                <td class="thh">0.0</td>
                <td class="thh">1925000.0</td>
                <td class="thh">BNI VA - 99999999999999999</td>
            </tr>
            <tr>
                <td class="thh">4</td>
                <td class="thh">12/07/2024</td>
                <td class="thh">Pembayaran Uang Kuliah</td>
                <td class="thh">0.0</td>
                <td class="thh">0.0</td>
                <td class="thh">385000.0</td>
                <td class="thh">BNI VA - 99999999999999999</td>
            </tr>
            <tr>
                <td class="thh">5</td>
                <td class="thh">16/02/2024</td>
                <td class="thh">Tagihan Uang Kuliah</td>
                <td class="thh">0.0</td>
                <td class="thh">1925000.0</td>
                <td class="thh">0.0</td>
                <td class="thh">BNI VA - 99999999999999999</td>
            </tr>
            <tr>
                <td class="thh">6</td>
                <td class="thh">27/02/2024</td>
                <td class="thh">Pembayaran Uang Kuliah</td>
                <td class="thh">0.0</td>
                <td class="thh">0.0</td>
                <td class="thh">1925000.0</td>
                <td class="thh">BNI VA - 99999999999999999</td>
            </tr>
            <tr>
                <td class="thh">7</td>
                <td class="thh">29/04/2024</td>
                <td class="thh">Tagihan Uang Kuliah</td>
                <td class="thh">0.0</td>
                <td class="thh">1925000.0</td>
                <td class="thh">0.0</td>
                <td class="thh">BNI VA - 99999999999999999</td>
            </tr>
        </tbody>
    </table>
</x-layout>