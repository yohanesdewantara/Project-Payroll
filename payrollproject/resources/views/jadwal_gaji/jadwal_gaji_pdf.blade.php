<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Gaji PDF</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>

    <h1>Laporan Gaji - {{ $currentMonth }} {{ $currentYear }}</h1>

    <p>(Bulan: {{ \Carbon\Carbon::create()->month($bulan)->year($tahun ?: now()->year)->translatedFormat('F Y') }})</p>

    <p>Nama Perusahaan: <strong>{{ $perusahaan->nama_perusahaan }}</strong></p>




    <p>Saldo Perusahaan Sekarang: Rp{{ number_format($perusahaan->saldo, 2, ',', '.') }}</p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Bank</th>
                <th>Nomor Rekening</th>
                <th>Status</th>
                <th>Jadwal</th>
                <th>Gaji</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user_perusahaan as $daf_user)
                <tr>
                    <td>{{ $daf_user->id_user }}</td>
                    <td>{{ $daf_user->nama_user }}</td>
                    <td>{{ $daf_user->alamat }}</td>
                    <td>{{ $daf_user->norek_user }}</td>
                    <td>{{ $daf_user->status }}</td>
                    <td>
                        @if($daf_user->jadwal_gaji_tanggal)
                            {{ \Carbon\Carbon::parse($daf_user->jadwal_gaji_tanggal)->isValid() ? \Carbon\Carbon::parse($daf_user->jadwal_gaji_tanggal)->format('d-m-Y') : 'Tanggal tidak valid' }}
                            at {{ $daf_user->jadwal_gaji_jam ?? '---' }}
                        @else
                            'Belum Dijadwalkan'
                        @endif
                    </td>
                    <td>Rp{{ number_format($daf_user->gaji, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6" style="text-align: right;"><strong>Total Gaji</strong></td>
                <td><strong>Rp{{ number_format($total_gaji, 2, ',', '.') }}</strong></td>
            </tr>
        </tfoot>
    </table>
</body>

</html>
