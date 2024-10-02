<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <form class="info-box" action="" method="post">
      <table class="align-table1" width="100%" height="30%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="3%" align="right"></td>
          <td width="32%">
            <table class="align-table1" border="0" cellspacing="0" cellpadding="0">
              @foreach ($data['Krs'] as $k)                
                <tr class="vn1">
                  <td>&nbsp;</td>
                </tr>
                <tr class="vn1">
                  <td align="right">Thn Ajaran :&nbsp;</td>
                  <td align="left" class="vv1">{{ $k?->tahun_akademik ? $k->tahun_akademik : "" }}</td>
                </tr>
                <tr class="vn1">
                  <td align="right">Semester :&nbsp;</td>
                  <td align="left" class="vv1">{{ $k?->semester ? $k->semester : "" }}</td>
                </tr>
                <tr class="vn1">
                  <td align="right">Perkuliahan :&nbsp;</td>
                  <td align="left" class="vv1">{{ $k?->perkuliahan ? $k->perkuliahan : "" }}</td>                  
                </tr>
                <tr class="vn1">
                  <td>&nbsp;</td>
                </tr>
                @endforeach
              </table>
        </td>
        <td width="65%" align="left">
          <table>
            <tr>
              <td><br />
                <fieldset>
                  <legend>Matakuliah Anda</legend>
                  <table width="100%" height="19%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right" >MK - Kelas :</td>
                      <td colspan="2">&nbsp;                        
                        <select name="mk" onChange="ubahmk(this)">
                          <option value="mhsGbppView.do?mk=0"> ---silahkan pilih--- </option>
                          @foreach ($data['Matkul'] as $m)                            
                            <option value="{{ $m?->kode_matakuliah }}">({{ $m?->kode_matakuliah }}) {{ $m?->nama }} | {{ $m?->sks }}</option>
                          @endforeach                          
                          
                          {{-- <option value="mhsGbppView.do?mk=30083">
                          22080304224 ) Algoritma Paralel | 3
                          </option> --}}
                          
                        </select>
                      </td>
                    </tr>
                  </table>
            	</fieldset>
              <table width="90%" align="center">
                <tr>
                  <td colspan="4">&nbsp;</td>
                </tr>
            </table>
          </td>
          </tr>
        </table>
      </td>
      </tr>
   </table>
  </form>

</x-layout>
