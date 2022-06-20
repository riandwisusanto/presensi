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
    <title>CETAK DATA PERIJINAN</title>
</head>
<body>
    <div class="form-group">
        <h3 align="center"><b>Laporan Data Perijinan</b></h3>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Pegawai</th>
                    <th>Ijin</th>
                    <th>Tanggal</th>
                    <th>Jam Ijin</th>
                    <th>Tujuan</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1 @endphp
                @forelse($perijinan as $ijin)
                    <tr align="center">
                        <td>{{$i++}}</td>
                        <td>{{$ijin->user->nip}}</td>
                        <td>{{$ijin->user->name}}</td>
                        <td>{{$ijin->izin}}</td>
                        <td>{{$ijin->tanggal}}</td>
                        <td>{{$ijin->jam}}</td>
                        <td>{{$ijin->tujuan}}</td>
                        <td>{{$ijin->status}}</td>
                        <td>{{$ijin->note}}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9"><b><i>TIDAK ADA DATA UNTUK DITAMPILKAN</i></b></td>
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