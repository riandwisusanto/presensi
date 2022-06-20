<!DOCTYPE html> 
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token() }}">
    <style>
        table.static{
        position: relative;
        border: 1px solid #543535;
        }
    </style>
    <title>CETAK DATA PRESENSI</title>
</head>
<body>
    <div class="form-group">
        <h3 align="center"><b>Laporan Data Presensi</b></h3>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Pegawai</th>
                    <th>Tanggal</th>
                    <th>Lokasi</th>
                    <th>Rencana Pekerjaan</th>
                    <th>Bukti Pekerjaan</th>
                    <th>Jam Masuk</th>
                    <th>Jam Keluar</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1 @endphp
                @forelse($presensi as $absen)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$absen->user->nip}}</td>
                        <td>{{$absen->user->name}}</td>
                        <td>{{$absen->date}}</td>
                        <td>
                            <?php foreach($lokasi as $lok){
                              if($absen->id_lokasi == $lok->id)
                                echo $lok->latitude." ".$lok->longitude;
                            } ?>
                          </td>
                        <td>{{$absen->rencana}}</td>
                        <td><a href="{{url('bukti_pekerjaan/'.$absen->bukti)}}" target="_blank"><img src="{{url('bukti_pekerjaan/'.$absen->bukti)}}" width="30px"></a></td>
                        <td>{{$absen->time_in}}</td>
                        <td>{{$absen->time_out}}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6"><b><i>TIDAK ADA DATA UNTUK DITAMPILKAN</i></b></td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>