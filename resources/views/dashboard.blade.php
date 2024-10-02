<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="info-box">
    <div class="profile-info">
        <img src="img/Universitas_Nasional_Logo.png" alt="Profile Picture" width="80" height="80">
        @foreach ($mahasiswa["User"] as $m )
        @foreach ($mahasiswa["Prodi"] as $p )
            <table class="tb">
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr class="vn1">
                    <td>&nbsp;&nbsp;<b>Nama</b></td>
                    <td class="vn2"><b>:</b></td>
                    <td class="vl"><b>{{ $m->name }}</b></td>
                </tr>
                <tr class="vn1">
                    <td>&nbsp;&nbsp;<b>NPM</b></td>
                    <td class="vn2"><b>:</b></td>
                    <td class="vl"><b>{{ $m->npm }}</b></td>
                </tr>
                <tr class="vn1">
                    <td>&nbsp;&nbsp;<b>Prodi</b></td>
                    <td class="vn2"><b>:</b></td>
                    <td class="vl"><b>{{ $p->nama_program_studi }}</b></td>
                </tr>
                <tr class="vn1">
                    <td>&nbsp;&nbsp;<b>Status</b></td>
                    <td class="vn2"><b>:</b></td>
                    <td class="vl"><b></b></td>
                </tr>
                <tr class="vn1">
                    <td>&nbsp;&nbsp;<b>IPK</b></td>
                    <td class="vn2"><b>:</b></td>
                    <td class="vl"><b></b></td>
                </tr>
                <tr class="vn1">
                    <td>&nbsp;&nbsp;<b>Saldo</b></td>
                    <td class="vn2"><b>:</b></td>
                    <td class="vl"><b></b></td>
                </tr>
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
            </table>
        </div>
        @endforeach
        @endforeach

    </div>
    <div class="actions">
        <a href="/cetak-krs-kpu">
            <button>Cetak KRS / KPU</button>
        </a>
        <a href="/data-pribadi">
            <button>Data Pribadi</button>
        </a>
    </div>
    <div class="info-box">
        <h3>Rencana Pembelajaran (RPS)</h3>
        <p>Informasi tentang rencana pembelajaran akan ditampilkan <a href="/rencana-pembelajaran-semester">di sini.</a></p>
    </div>
    <div class="info-box">
        <h3>Nilai Semester Aktif</h3>
        <p>Informasi tentang nilai semester aktif akan ditampilkan <a href="/nilai-semester-aktif">di sini.</a></p>
    </div>
    <div class="info-box">
        <h3>Data Keuangan</h3>
        <p>Informasi tentang data keuangan akan ditampilkan <a href="/keuangan">di sini.</a></p>
    </div>
</x-layout>