<div class="row">
    <?php
    include 'koneksi.php';

    $data = mysqli_query($koneksi, "select * from barang");
    while ($d = mysqli_fetch_array($data)) {
    ?>
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body d-flex justify-content-center">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center">
                            <img src="gambar/<?php echo $d['gambar'] ?>" class="rounded mb-2" width="85%" height="250px">
                        </div>
                        <div class="col-12">
                            <h3 class="fw-bold mb-1 px-3"><i class="fa fa" aria-hidden="true"> <?php echo $d['nama_barang'] ?></i></h3>
                            <p class="text-muted mb-0">The best clothes u ever buys</p>
                        </div>
                        <div class="col-12 border-bottom mt-3">
                            <h3 class="fw-bold mb-1"><i class="fa fa" aria-hidden="true"> <?php echo $d['stok'] ?></i></h3>
                            <p class="text-muted mb-0">Stok</p>
                        </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>