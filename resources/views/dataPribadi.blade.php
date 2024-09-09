<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <fieldset class="info-box"><legend><b>DATA PRIBADI</b></legend>
        @foreach ($mahasiswa[0] as $m )
        @foreach ($mahasiswa[1] as $p)
    <form action="{{ route('updateDataPribadi') }}" method="POST">
        {{ csrf_field() }}
        <table>
            <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
            <tr class="vn1">
                <td>&nbsp;&nbsp;<b>Nama Lengkap</b></td>
                <td class="vn2"><b>:</b></td>
                <td class="vl"><b>{{ ($m->name) }}</b></td>
            </tr>
            <tr class="vn1">
                <td>&nbsp;&nbsp;<b>NPM</b></td>
                <td class="vn2"><b>:</b></td>
                <td class="vl"><b>{{ $m->npm }}</b></td>
            </tr>
            <tr class="vn1"> 
                <td>&nbsp;&nbsp;<b>Program Studi</b></td>
                <td class="vn2"><b>:</b></td>
                <td class="vl"><b>{{ $p->nama_program_studi }}</b></td>
            </tr>
            <tr class="vn1"> 
                <td>&nbsp;&nbsp;<b>Alamat Domisili</b></td>
                <td class="vn2"><b>:</b></td>
                <td class="vl"><input name="alamat" id="alamat" type="text" size="50" maxlength="255" value="{{ $m->alamat }}" class="cl" tabindex="1"></td>
            </tr>
            <tr class="vn1"> 
                <td>&nbsp;&nbsp;<b>No. HP</b></td>
                <td class="vn2"><b>:</b></td>
                <td class="vl"><input name="hp" id="hp" type="text" size="50" maxlength="35" value="{{ $m->telepon }}" class="cl" tabindex="2"></td>
            </tr>
            <tr class="vn1"> 
                <td>&nbsp;&nbsp;<b>Alamat e-Mail</b></td>
                <td class="vn2"><b>:</b></td>
                <td class="vl"><input name="email" id="email" type="email" size="50" maxlength="255" value="{{ $m->email }}"  class="cl" tabindex="3"></td>
            </tr>
            <tr class="vn1"> 
                <td>&nbsp;&nbsp;<b>NIK</b></td>
                <td class="vn2"><b>:</b></td>
                <td class="vl"><input name="nik" id="nik" type="number" size="50" maxlength="255" value="{{ $m->nik }}"  class="cl" tabindex="4"></td>
            </tr>
            <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
            @endforeach
            @endforeach
            <tr>
                <td class="vn" colspan="2"><input name="simpan" type="submit" value="SIMPAN" id="simpan" class="bc" tabindex="5"></td>
                {{-- <td class="vl"><input type="button" name="reset" value=" CLOSE " onclick="self.close();" class="bc" tabindex="6"></td> --}}
            </tr>
            <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
        </table>
    </form>
</x-layout>