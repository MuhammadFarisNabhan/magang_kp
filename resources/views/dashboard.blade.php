<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="profile-info">
        <img src="img/Universitas_Nasional_Logo.png" alt="Profile Picture" width="80" height="80">
        <div>                    
            <span><strong>Nama:</strong> </span>
            <span><strong>NPM:</strong></span>
            <span><strong>Prodi:</strong> Informatika</span>
            <span><strong>Status:</strong> Aktif</span>
            <span><strong>IPK:</strong> 3.56</span>
            <span><strong>Saldo:</strong> 0</span>                                    
        </div>
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