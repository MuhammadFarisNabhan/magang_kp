{{-- SUDAH --}}
<x-nav-link href='/' :active="request()->is('/dashboard')" class="selesai">Dashboard</x-nav-link>
<x-nav-link href='/mengisi-krs' :active="request()->is('/mengisi-krs') " class="selesai">Mengisi KRS</x-nav-link>
<x-nav-link href='/jadwal-pribadi' :active="request()->is('/jadwal-pribadi') " class="selesai">Jadwal Pribadi</x-nav-link>
<x-nav-link href='/data-pribadi' :active="request()->is('/data-pribadi')" class="selesai">Data Pribadi</x-nav-link>
<x-nav-link href='/cetak-krs-kpu' :active="request()->is('/cetak-krs-kpu')" class="selesai">Cetak KRS / KPU</x-nav-link>

{{-- LOGOUT --}}
<x-nav-link href='/logout' :active="request()->is('/keluar')">Keluar</x-nav-link>

{{-- BELUM --}}
<x-nav-link href='/data-transkrip' :active="request()->is('/data-transkrip') " class="belum">Data Transkrip</x-nav-link>
<x-nav-link href='/history-nilai' :active="request()->is('/history-nilai')" class="belum">History Nilai</x-nav-link>
<x-nav-link href='/jadwal-PA' :active="request()->is('/jadwal-PA')" class="belum">Jadwal PA</x-nav-link>
<x-nav-link href='/berita-acara-PA' :active="request()->is('/berita-acara-PA')" class="belum">Berita Acara PA</x-nav-link>
<x-nav-link href='/kuesioner-dosen' :active="request()->is('/kuesioner-dosen')" class="belum">Kuesioner Dosen</x-nav-link>
<x-nav-link href='/kuesioner-kepuasan' :active="request()->is('/kuesioner-kepuasan')" class="belum">Kuesioner Kepuasan</x-nav-link>
<x-nav-link href='/kehadiran-kuliah' :active="request()->is('/kehadiran-kuliah')" class="belum">Kehadiran Kuliah</x-nav-link>
<x-nav-link href='/rencana-pembelajaran-semester' :active="request()->is('/rencana-pembelajaran-semester')" class="belum">Rencana Pembelajaran Semester (RPS)</x-nav-link>
<x-nav-link href='/nilai-semester-aktif' :active="request()->is('/nilai-semester-aktif')" class="belum">Nilai Semester Aktif</x-nav-link>
<x-nav-link href='/keuangan' :active="request()->is('/keuangan')" class="belum">Keuangan</x-nav-link>