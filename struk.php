<script>
    window.print();
</script>


<!DOCTYPE html>
<html lang="en">

<style>
    @media print {
        body * {
            visibility: hidden;
        }

        #content,
        #content * {
            visibility: visible;
        }

        #buttonprint {
            display: none;
        }
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Belanja</title>

    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png">
    <link rel="stylesheet" href="assets/extensions/simple-datatables/style.css">
    <link rel="stylesheet" href="assets/css/pages/simple-datatables.css">






    <!-- toastify -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>



<body width="600px">


    <script>
        window.print();
    </script>
    <?php
    include 'koneksi.php';
    $id_transaksi = $_GET['id_transaksi'];
    $query2 = mysqli_query($koneksi, "SELECT * FROM `v_struk` where id_transaksi = '$id_transaksi'");
    $row = mysqli_fetch_array($query2);

    ?>
    <div class="col-12   d-flex justify-content-center mt-4" id="content" style="width:100%">
        <div class="card  ">
            <div class="card-body border ">
                <h4 class="card-title justify-content-center">Super Market</h4>
                <p class="card-text"><br>
                    JL.MAWAR |
                    No. Telp : 08XXXXXXXX
                    <hr>
                    <?php echo $id_transaksi ?>&nbsp; | &nbsp;
                    MEMBER &nbsp; | &nbsp;
                    BAYAR TUNAI <br>
                    KASIR : <?= $row['nama_user'] ?>
                    <hr>
                <table cellpadding="4">
                    <tr>
                        <th>Nama</th>
                        <th>Qty</th>
                        <th>Harga(pcs)</th>
                        <th>Harga Total*</th>
                    </tr>
                    <tr>
                        <td><?php echo $row['nama_barang'] ?>&nbsp;&nbsp;</td>
                        <td><?php echo $row['jumlah'] ?>&nbsp;&nbsp;</td>
                        <td><?php echo $row['harga'] ?>&nbsp;&nbsp;</td>
                        <td><?php echo $row['total'] ?>&nbsp;</td>
                        </p>
                    </tr>
                    <tr>
                        <td colspan="3">Total : </td>
                        <td>Rp. <?php echo $row['total'] ?></td>
                    </tr>
                </table>
                <hr>
                Call Center : 028XXXXXXXXXX |
                Email : Super_market@example.com
            </div>
        </div>
    </div>
    <center>
        <div class="btn btn-primary mt-4" id="buttonprint" onclick="window.print();">Print</div>
    </center>
</body>

</html>