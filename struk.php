<script>
    window.print();
</script>
<?php
include 'koneksi.php';
$id_transaksi = $_GET['id_transaksi'];
$query2 = mysqli_query($koneksi, "SELECT * FROM `v_struk` where id_transaksi = '$id_transaksi'");
$row = mysqli_fetch_array($query2);

?>
<div class="card justify-content-start" id="content" style="width:40%;margin:auto;margin-top:30px;">
    <div class="card-body" style="margin:auto;">
        <h4 class="card-title">Market</h4>
        <p class="card-text"><br>
            JL.Yos sudarso |
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
        Call Center : 08XXXXXXXXXX |
        Email : email@example.com
    </div>
</div>
<center>
    <div class="btn btn-primary mt-4" id="buttonprint" onclick="window.print();">Print</div>
</center>