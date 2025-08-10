<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
        }
        .header p {
            margin: 5px 0;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            vertical-align: top;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
            text-align: center;
        }
        .text-center {
            text-align: center;
        }
        .badge-success {
            background-color: #28a745;
            color: white;
            padding: 2px 6px;
            border-radius: 3px;
            font-size: 10px;
        }
        .badge-secondary {
            background-color: #6c757d;
            color: white;
            padding: 2px 6px;
            border-radius: 3px;
            font-size: 10px;
        }
        .footer {
            margin-top: 30px;
            text-align: right;
            font-size: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1><?= $title ?></h1>
        <p>Tanggal Export: <?= date('d F Y H:i:s') ?></p>
        <p>Total Data: <?= count($participants) ?> participant</p>
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="25%">Nama</th>
                <th width="15%">No. Wa</th>
                <th width="15%">Jabatan</th>
                <th width="15%">Status</th>
                <th width="25%">PIC</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach($participants as $participant): ?>
                <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td><?= htmlspecialchars($participant->nama_lengkap) ?></td>
                    <td><?= htmlspecialchars($participant->no_whatsapp) ?></td>
                    <td><?= htmlspecialchars($participant->jabatan) ?></td>
                    <td class="text-center">
                        <span class="<?= $participant->is_present ? 'badge-success' : 'badge-secondary' ?>">
                            <?= $participant->is_present ? 'Hadir' : 'Tidak Hadir' ?>
                        </span>
                    </td>
                    <td>
                        <?= htmlspecialchars($participant->user_name) ?> / 
                        <?= htmlspecialchars($participant->user_whatsapp) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="footer">
        <p>Digenerate oleh sistem GTTGN CMS pada <?= date('d F Y H:i:s') ?></p>
    </div>
</body>
</html>
