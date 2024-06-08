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
    </style>

</head>

<body>
    <div class="kopsurat">
        <h3 style="margin-bottom:-1rem ">LPK Hoshi Hikari</h3>
        <p>jl. Parak Anau no.10 <br>Simpang Damri Padang Sumatera Barat <br>@lpkhoshi_hikariofficial wa:
            +62-812-1838-8011</p>
    </div>
    <h2 style="text-align: center">Laporan Daftar Kelas</h2>
    {{-- <p> Periode : {{ $periode . ' / ' . $tahun }}</p> --}}
    @php
        $jmlkelas = count($kelas[0]->anggotakelas);
    @endphp
    <table>
        <thead style="text-align: left;">
            <tr>
                <th>Nomor</th>
                <th>Nama Kelas</th>
                <th>Jumlah Anggota</th>
                <th>Materi yang dibagikan</th>
                <th>Tanggal Dibuat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kelas as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $jmlkelas -=2 }}</td>
                    <td>{{ count($item->materi) }}</td>
                    <td>{{ $item->created_at->translatedFormat('d F Y') }}</td>
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
