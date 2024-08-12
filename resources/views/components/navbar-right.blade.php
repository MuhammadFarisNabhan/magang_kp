<x-nav-link href='/data-pribadi' :active="request()->is('/data-pribadi')">Data Pribadi</x-nav-link>
<x-nav-link href='/kuesioner-dosen' :active="request()->is('/kuesioner-dosen')">Kuesioner Dosen</x-nav-link>
<x-nav-link href='/kuesioner-kepuasan' :active="request()->is('/kuesioner-kepuasan')">Kuesioner Kepuasan</x-nav-link>
<x-nav-link href='/kehadiran-kuliah' :active="request()->is('/kehadiran-kuliah')">Kehadiran Kuliah</x-nav-link>
<x-nav-link href='/rencana-pembelajaran-semester' :active="request()->is('/rencana-pembelajaran-semester')">Rencana Pembelajaran Semester (RPS)</x-nav-link>
<x-nav-link href='/nilai-semester-aktif' :active="request()->is('/nilai-semester-aktif')">Nilai Semester Aktif</x-nav-link>
<x-nav-link href='/keuangan' :active="request()->is('/keuangan')">Keuangan</x-nav-link>
<x-nav-link href='/keluar' :active="request()->is('/keluar')">Keluar</x-nav-link>