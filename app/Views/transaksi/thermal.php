<!DOCTYPE html>
<html>
    <head>
        <title>Cetak Thermal Transaksi</title>
        <link href="<?= base_url('assets/sbadmin/css/sb-admin-2.min.css') ?>" rel="stylesheet">
        <style>
            * {
                font-size: 12px;
                font-family: 'Times New Roman';
            }

            td,
            th,
            tr,
            table {
                border-top: 1px solid black;
                border-collapse: collapse;
            }

            td.description,
            th.description {
                width: 70px;
                max-width: 70px;
            }

            td.quantity,
            th.quantity {
                width: 20px;
                max-width: 20px;
                word-break: break-all;
            }

            td.price,
            th.price {
                width: 65px;
                max-width: 65px;
                word-break: break-all;
            }

            .centered {
                text-align: center;
                align-content: center;
            }

            .ticket {
                width: 155px;
                max-width: 155px;
            }

            img {
                max-width: inherit;
                width: inherit;
            }

            @media print {
                .hidden-print,
                .hidden-print * {
                    display: none !important;
                }
            }
        </style>
    </head>
    <body onload="window.print();">
        <div class="ticket">
            <p class="centered"><b>Laundry</b>
                <br>Jl. Brawijaya No. 60, <br>Telp 082017051034
            </p>
            <p>Invoice # <?php echo $trans['no_invoice'];?><br>
                Tanggal <?php echo date('d/m/Y', strtotime($trans['tanggal_masuk']));?>
            </p>
            <P>
                Layanan <?php echo $trans['jenis_layanan']; ?>
            </P>
            <table>
                <thead>
                    <tr>
                        <th class="description"><center>Tarif</center></th>
                        <th><center>Berat</center></th>
                        <th class="price"><center>Biaya</center></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><center>Rp <?php echo number_format($trans['tarif'],0,',','.'); ?>/KG</center></td>
                        <td><center><?php echo $trans['berat']; ?></center></td>
                        <td class="price"><center>Rp <?php echo number_format($trans['biaya'],0,',','.'); ?></center></td>
                    </tr>

                </tbody>
            </table>
            <p class="centered">Terima kasih atas kepercayaan anda menggunakan jasa kami</p>
        </div>
    </body>
</html>