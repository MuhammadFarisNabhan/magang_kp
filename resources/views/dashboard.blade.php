<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="profile-info">
        <img src="img/Universitas_Nasional_Logo.png" alt="Profile Picture" width="80" height="80">
        @foreach ($mahasiswa as $m )

        <table class="align-table" border="1px solid black">
            <tr>
                <td class="label">Nama</td>
                <td class="colon">:</td>
                <td class="value">{{ $m->nama }}</td>
            </tr>
            <tr>
                <td class="label">NPM</td>
                <td class="colon">:</td>
                <td class="value">{{ $m->npm }}</td>
            </tr>
            <tr>
                <td class="label">Prodi</td>
                <td class="colon">:</td>
                <td class="value"></td>
            </tr>
            <tr>
                <td class="label">Status</td>
                <td class="colon">:</td>
                <td class="value"></td>
            </tr>
            <tr>
                <td class="label">IPK</td>
                <td class="colon">:</td>
                <td class="value"></td>
            </tr>
            <tr>
                <td class="label">Saldo</td>
                <td class="colon">:</td>
                <td class="value"></td>
            </tr>
        </table>
        @endforeach

    </div>
    <div class="actions">
        <button>Cetak KRS / KPU</button>
        <button>Data Pribadi</button>
    </div>
    <div class="info-box">
        <h3>Rencana Pembelajaran (RPS)</h3>
        <p>Informasi tentang rencana pembelajaran akan ditampilkan di sini.</p>
    </div>
    <div class="info-box">
        <h3>Nilai Semester Aktif</h3>
        <p>Informasi tentang nilai semester aktif akan ditampilkan di sini.</p>
    </div>
    <div class="info-box">
        <h3>Data Keuangan</h3>
        <p>Informasi tentang data keuangan akan ditampilkan di sini.</p>
    </div>
</x-layout>