<?php

session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

require 'get_stok_barang.php';

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Stok Barang</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">

        <?php require 'templates/topnavigation.php'; ?>
        
        <div id="layoutSidenav">
            
            <?php require 'templates/sidenavigation.php'; ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-sm-4">
                        <h1 class="my-4">Stok Barang</h1>
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-sm-center flex-column flex-sm-row">
                                <div class="py-2">
                                    <i class="fas fa-table me-1"></i>
                                    Data Stok Barang
                                </div>
                                <button type="button" class="btn btn-primary mr-auto" data-bs-toggle="modal" data-bs-target="#tambah">
                                    Tambah Barang
                                </button>
                            </div>
                            <?php foreach($data_stok_barang as $item): ?>
                                <?php if ($item['stock'] == 0): ?>
                                    <div class="alert alert-danger alert-dismissible fade show mt-2 mb-0 mx-3">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        <strong>Perhatian!</strong> Stok barang <?php echo $item['namabarang']; ?> sudah habis.
                                    </div>
                                    <?php endif ?>
                            <?php endforeach ?>
                            <div class="card-body">
                                <table id="datatablesSimple" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Stok</th>
                                            <th>Deskripsi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach($data_stok_barang as $item): ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td>
                                                    <a href="detail_barang.php?id=<?php echo $item['idbarang']; ?>" class="fw-bold text-black text-decoration-none""><?php echo $item['namabarang']; ?></a>
                                                </td>
                                                <td><?php echo $item['stock']; ?></td>
                                                <td><?php echo $item['deskripsi']; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning mb-1" data-bs-toggle="modal" data-bs-target="#edit<?php echo $item['idbarang']; ?>">
                                                        Edit
                                                    </button>
                                                    <button type="button" class="btn btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $item['idbarang']; ?>">
                                                        Hapus
                                                    </button>
                                                </td>
                                            </tr>

                                            <?php $i++; ?>

                                            <div class="modal fade" id="edit<?php echo $item['idbarang']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form method="POST" action="edit_stok_barang.php">
                                                            <div class="modal-body">
                                                                <input type="hidden" name="idbarang" value="<?php echo $item['idbarang']; ?>">
                                                                <input type="text" name="namabarang" value="<?php echo $item['namabarang']; ?>" class="form-control mb-3" required />
                                                                <input type="text" name="deskripsi" value="<?php echo $item['deskripsi']; ?>" class="form-control mb-3" required />
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="hapus<?php echo $item['idbarang']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Barang</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form method="POST" action="hapus_stok_barang.php">
                                                            <div class="modal-body">
                                                                <p>Apakah anda yakin ingin menghapus <?php echo $item['namabarang']; ?> ?</p>
                                                                <input type="hidden" name="idbarang" value="<?php echo $item['idbarang']; ?>">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>

                <?php require 'templates/footer.php'; ?>

            </div>
        </div>

        <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="tambah_stok_barang.php">
                        <div class="modal-body">
                            <input type="text" name="namabarang" placeholder="Nama barang" class="form-control mb-3" required />
                            <input type="number" name="stok" placeholder="Stok barang" min="1" class="form-control mb-3" required />
                            <input type="text" name="deskripsi" placeholder="Deskripsi barang" class="form-control mb-3" required />
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
