<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <form class="info-box" action="" method="post">
      <table class="align-table1" width="100%" height="30%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="3%" align="right"></td>
          <td width="32%">
            <table class="align-table1" border="0" cellspacing="0" cellpadding="0">
              @foreach ($data['Krs'] as $k)                
                <tr>
                  <td align="right">Thn Ajaran :&nbsp;</td>
                  <td align="left">{{ $k->tahun_akademik }}</td>
                </tr>
                <tr>
                  <td align="right">Semester :&nbsp;</td>
                  <td align="left">{{ $k->semester }}</td>
                </tr>
                <tr>
                  <td align="right">Perkuliahan :&nbsp;</td>
                  <td align="left">{{ $k->perkuliahan }}</td>                  
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
                          <option value="mhsGbppView.do?mk=0">---silahkan pilih---</option>
                          @foreach ($data['Matkul'] as $m)                            
                            <option value="{{ $m->kode_matakuliah }}">({{ $m->kode_matakuliah }}) {{ $m->nama }} | {{ $m->sks }}</option>
                          @endforeach                          
                          {{-- <option value="mhsGbppView.do?mk=30083">
                          22080304224 ) Algoritma Paralel | 3
                          </option>
                          
                          <option value="mhsGbppView.do?mk=30084">
                          22080304225 ) Augmented and Virtual Reality | 3
                          </option>
                          
                          <option value="mhsGbppView.do?mk=30096">
                          22080304231 ) Internet of Things | 3
                          </option>
                          
                          <option value="mhsGbppView.do?mk=30086">
                          22080304232 ) Keamanan Siber | 3
                          </option>
                          
                          <option value="mhsGbppView.do?mk=30087">
                          22080304233 ) Kriptografi | 3
                          </option>
                          
                          <option value="mhsGbppView.do?mk=30094">
                          22080304135 ) Metodologi Penelitian | 3
                          </option>
                          
                          <option value="mhsGbppView.do?mk=30088">
                          22080304239 ) Simulasi dan Pemodelan | 3
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
