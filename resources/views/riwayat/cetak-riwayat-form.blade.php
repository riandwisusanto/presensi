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
    <title>CETAK DATA RIWAYAT</title>
</head>
<body>
    <div class="form-group">
        <h3 align="center"><b>Laporan Data Riwayat</b></h3>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Pegawai</th>
                    <th>Jabatan</th>
                    <th>Jumlah Kehadiran</th>
                    <th>Jumlah Ijin</th>
                </tr>
            </thead>
            <tbody>
            @php $i = 1 @endphp
            @forelse($cetakpertanggal as $users)
                @foreach($staf as $sf)
                    <?php if ($sf->user_id == $users->id): ?>
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$users->nip}}</td>
                            <td>{{$users->name}}</td>
                            <td>{{$users->jabatan}}</td>
                            <td>{{ $users->presensi->count('pivot.id') }}</td>
                            <td>{{ $users->perijinan->count('pivot.id') }}</td>
                        </tr>
                    <?php endif ?>
                @endforeach
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