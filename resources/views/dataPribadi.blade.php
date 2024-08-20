<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <fieldset class="info-box"><legend><b>DATA PRIBADI</b></legend>
    <table>
        <tr>
            <td colspan="4">&nbsp;</td>
        </tr>
        <tr class="vn1">
            <td>&nbsp;&nbsp;<b>Nama Lengkap</b></td>
            <td class="vn2"><b>:</b></td>
            <td class="vl"><b>Jack The Ripper</b></td>
        </tr>
        <tr class="vn1">
            <td>&nbsp;&nbsp;<b>NPM</b></td>
            <td class="vn2"><b>:</b></td>
            <td class="vl"><b>21706451000</b></td>
        </tr>
        <tr class="vn1"> 
            <td>&nbsp;&nbsp;<b>Program Studi</b></td>
            <td class="vn2"><b>:</b></td>
            <td class="vl"><b>Informatika</b></td>
        </tr>
        <tr class="vn1"> 
            <td>&nbsp;&nbsp;<b>Alamat Domisili</b></td>
            <td class="vn2"><b>:</b></td>
            <td class="vl"><input name="rmh" id="rmh" type="text" size="50" maxlength="255" value="Parung Seeng" class="cl" tabindex="1"></td>
        </tr>
        <tr class="vn1"> 
            <td>&nbsp;&nbsp;<b>No. HP</b></td>
            <td class="vn2"><b>:</b></td>
            <td class="vl"><input name="hp" id="hp" type="text" size="50" maxlength="35" value="081548678990" class="cl" tabindex="2"></td>
        </tr>
        <tr class="vn1"> 
            <td>&nbsp;&nbsp;<b>Alamat e-Mail</b></td>
            <td class="vn2"><b>:</b></td>
            <td class="vl"><input name="email" id="email" type="text" size="50" maxlength="255" value="auah@gmail.com"  class="cl" tabindex="3"></td>
        </tr>
        <tr class="vn1"> 
            <td>&nbsp;&nbsp;<b>NIK</b></td>
            <td class="vn2"><b>:</b></td>
            <td class="vl"><input name="nik" id="nik" type="text" size="50" maxlength="255" value="320011100012000"  class="cl" tabindex="4"></td>
        </tr>
        <tr>
            <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
            <td class="vn" colspan="2"><input name="simpan" type="submit" value="SIMPAN" id="simpan" class="bc" tabindex="5"></td>
            <td class="vl"><input type="button" name="reset" value=" CLOSE " onclick="self.close();" class="bc" tabindex="6"></td>
        </tr>
        <tr>
            <td colspan="4">&nbsp;</td>
        </tr>
    </table>
</x-layout>