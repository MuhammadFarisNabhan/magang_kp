<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <fieldset class="info-box"><legend><b>DATA PRIBADI</b></legend>
        {{-- @foreach ($mahasiswa[0] as $m )
        @foreach ($mahasiswa[1] as $p) --}}
    <form action="{{ route('updateDataPribadi') }}" method="POST">
        {{ csrf_field() }}
        @php
            $messages = [
                'messages'  => session('messages'),
                'success'   => session('success'),
                'error'     => session('error'),
            ]
        @endphp
        <table>
            <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
            @foreach ($messages as $type => $message)
                @if($message)
                    <div class="alert alert-{{ $type === 'messages' ? 'warning' : ($type === 'success' ? 'success' : 'danger') }}">
                        {{ $message }}
                    </div>
                @endif        
            @endforeach
            <tr class="vn1">
                <td>&nbsp;&nbsp;<b>Nama Lengkap</b></td>
                <td class="vn2"><b>:</b></td>
                <td class="vl"><b>{{ $mahasiswa['nama'] }}</b></td>
            </tr>
            <tr class="vn1">
                <td>&nbsp;&nbsp;<b>NPM</b></td>
                <td class="vn2"><b>:</b></td>
                <td class="vl"><b>{{ $mahasiswa['npm'] }}</b></td>
            </tr>
            <tr class="vn1"> 
                <td>&nbsp;&nbsp;<b>Program Studi</b></td>
                <td class="vn2"><b>:</b></td>
                <td class="vl"><b>{{ $mahasiswa['prodi'] }}</b></td>
            </tr>
            <tr class="vn1"> 
                <td>&nbsp;&nbsp;<b>Alamat Domisili</b></td>
                <td class="vn2"><b>:</b></td>
                <td class="vl"><input name="alamat" id="alamat" type="text" size="50" maxlength="255" value="{{ $mahasiswa['alamat'] }}" class="cl" tabindex="1"></td>
            </tr>
            <tr class="vn1"> 
                <td>&nbsp;&nbsp;<b>No. HP</b></td>
                <td class="vn2"><b>:</b></td>
                <td class="vl"><input name="hp" id="hp" type="text" size="50" maxlength="35" value="{{ $mahasiswa['telepon'] }}" class="cl" tabindex="2"></td>
            </tr>
            <tr class="vn1"> 
                <td>&nbsp;&nbsp;<b>Alamat e-Mail</b></td>
                <td class="vn2"><b>:</b></td>
                <td class="vl"><input name="email" id="email" type="email" size="50" maxlength="255" value="{{ $mahasiswa['email'] }}"  class="cl" tabindex="3"></td>
            </tr>
            <tr class="vn1"> 
                <td>&nbsp;&nbsp;<b>NIK</b></td>
                <td class="vn2"><b>:</b></td>
                <td class="vl"><input name="nik" id="nik" type="number" size="50" maxlength="255" value="{{ $mahasiswa['nik'] }}"  class="cl" tabindex="4"></td>
            </tr>
            <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
            {{-- @endforeach
            @endforeach --}}
            <tr>
                <td class="vn" colspan="2"><input name="simpan" type="submit" value="SIMPAN" id="simpan" class="bc" tabindex="5"></td>
            </tr>
            <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
        </table>
    </form>
</x-layout>