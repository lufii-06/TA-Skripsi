<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Materi</title>
    <style>
        .kopsurat {
            margin-bottom: 20px;
            text-align: center;
            border-bottom: 2px solid #000000;
            padding-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 16px;
            text-align: left;
        }

        thead {
            background-color: #f2f2f2;
            text-align: left;
        }

        th,
        td {
            padding: 12px 15px;
            border: 1px solid #ddd;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }

        .signature {
            text-align: right;
            margin-top: 50px;
        }

        body {
            padding: 25px 45px;
        }
        .periode{
            display: block;
            text-align: end;
        }

    </style>

</head>

<body>
    <div class="kopsurat">
        <h3 style="margin-bottom:-1rem ">LPK Hoshi Hikari</h3>
        <p>jl. Parak Anau no.10 <br>Simpang Damri Padang Sumatera Barat <br>@lpkhoshi_hikariofficial wa:
            +62-812-1838-8011</p>
    </div>
    <h2 style="text-align: center">Laporan Daftar Nilai per Kuis</h2>
    <p>
      {{-- <span class="periode">  Periode : {{ $periode . ' / ' . $tahun }} <br></span> --}}
        Nomor Kuis :  {{ $kuis->id }}<br>
        Judul Kuis :  {{ $kuis->judulkuis }}<br>
        Tipe Kuis : {{ $kuis->type }}<br>
    </p>
    <table>
        <thead style="text-align: left;">
           <tr>
            <th>Nama siswa</th>
            <th>Nilai</th>
            <th>Peringkat</th>
           </tr>
        </thead>
        <tbody>
            @foreach ($nilai as $item)
                <tr>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->nilai }}</td>
                    <td>{{ $loop->iteration }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="signature">
        <p>padang, {{ now()->translatedFormat('d F Y') }}</p>
        <br>
        <br>
        <p>Hormat Kami,
            <br>
            Hoshi Hikari
        </p>
    </div>
    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>

</html>
