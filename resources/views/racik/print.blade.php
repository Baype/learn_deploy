<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Print Racikan </title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f3f3f3;
        }
    </style>
</head>

<body>
    <h2>Detail Racikan</h2>

    <p><strong>Jenis Racikan:</strong> {{ $racikan->jenis_racikan ?? '-' }}</p>
    <p><strong>Nama Racikan:</strong> {{ $racikan->racikan_details->first()->nama_racikan ?? '-' }}</p>
    <p><strong>Pasien:</strong> {{ $racikan->pasien->nama_pasien }}</p>
    <p><strong>User:</strong> {{ $racikan->user->name }}</p>
    <p><strong>Catatan:</strong> {{ $racikan->racikan_details->first()->catatan ?? '-' }}</p>

    <h3>Daftar Obat</h3>
    <table>
        <thead>
            <tr>
                <th>Nama Obat</th>
                <th>Signa</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($racikan->racikan_details as $detail)
                <tr>
                    <td>{{ $detail->obat->nama_obat }}</td>
                    <td>{{ $detail->signa->nama_signa }}</td>
                    <td>{{ $detail->jumlah }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p style="margin-top: 50px;">Dicetak pada: {{ now()->format('d-m-Y H:i') }}</p>
</body>

</html>
