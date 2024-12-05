<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Karyawan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2>Daftar Karyawan</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Bank</th>
                <th>Gaji</th>
                <th>Nomor Rekening</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user_perusahaan as $daf_user)
                <tr>
                    <td>{{ $daf_user->id_user }}</td>
                    <td>{{ $daf_user->nama_user }}</td>
                    <td>{{ $daf_user->jabatan }}</td>
                    <td>{{ $daf_user->alamat }}</td>
                    <td>Rp{{ number_format($daf_user->gaji, 2, ',', '.') }}</td>
                    <td>{{ $daf_user->norek_user }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
