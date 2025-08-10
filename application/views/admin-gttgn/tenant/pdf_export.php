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
        <p>Total Data: <?= count($tenants) ?> tenant</p>
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="15%">Nama</th>
                <th width="15%">Produk Utama</th>
                <th width="10%">No. Telepon</th>
                <th width="10%">Email</th>
                <th width="15%">Alamat</th>
                <th width="25%">PIC</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach($tenants as $tenant): ?>
                <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td><?= htmlspecialchars($tenant->nama_tenant) ?></td>
                    <td><?= htmlspecialchars($tenant->produk_utama ?: '-') ?></td>
                    <td><?= htmlspecialchars($tenant->no_telp ?: '-') ?></td>
                    <td><?= htmlspecialchars($tenant->email ?: '-') ?></td>
                    <td><?= htmlspecialchars($tenant->address ?: '-') ?></td>
                    <td>
                        <?= htmlspecialchars($tenant->user_name) ?> / 
                        <?= htmlspecialchars($tenant->user_whatsapp) ?>
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
