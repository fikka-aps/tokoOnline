<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Produk</h1>

    <?= form_error('name', '<div class="alert alert-danger" role="alert">', '</div>') ?>
    <?= form_error('email', '<div class="alert alert-danger" role="alert">', '</div>') ?>
    <?= form_error('password', '<div class="alert alert-danger" role="alert">', '</div>') ?>

    <a href="" class="btn btn-dark mb-3" data-toggle="modal" data-target="#newBimbelModalCenter">Tambah Data</a>
    <table class="table">
        <thead class="bg-white">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Harga</th>
                <th scope="col">Stok</th>
                <th scope="col">Foto</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            <?php $i = 1; ?>
            <?php foreach ($produk as $p) : ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $p['nama_produk'] ?></td>
                    <td><?= $p['deskripsi'] ?></td>
                    <td><?= $p['harga'] ?></td>
                    <td><?= $p['stok'] ?></td>
                    <td><img src="<?= base_url('img/produk/') . $p['foto']; ?>" width="150" alt=""></td>
                    <td>
                        <a href="" class="badge badge-light" data-toggle="modal" data-target="#editBimbelModalCenter<?= $p['id_produk'] ?>"><i class="fas fa-edit"></i></a>
                        <a href="" class=" badge badge-dark" data-toggle="modal" data-target="#deleteBimbelModalCenter<?= $p['id_produk'] ?>"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->

<!-- Modal Add -->
<div class="modal fade" id="newBimbelModalCenter" tabindex="-1" role="dialog" aria-labelledby="newBimbelModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newBimbelModalLongTitle">Data Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?= form_open_multipart('addProduk'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Nama Produk</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="desc">Deskripsi</label>
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi"></input>
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga">
                </div>
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="number" class="form-control" id="stok" name="stok">
                </div>
                <div class="form-group">
                    <label for="pict">Foto</label>
                    <input type="file" class="form-control" id="pict" name="pict" size="30">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-dark">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->

<?php foreach ($produk as $p) :  ?>
    <div class="modal fade" id="editBimbelModalCenter<?= $p['id_produk'] ?>" tabindex="-1" role="dialog" aria-labelledby="editBimbelModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editBimbelModalLongTitle">Edit Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open_multipart('editProduk'); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="id" value=" <?= $p['id_produk'] ?>">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $p['nama_produk'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= $p['deskripsi'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" value="<?= $p['harga'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="number" class="form-control" id="stok" name="stok" value="<?= $p['stok'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="pict">Foto</label>
                        <input type="file" class="form-control" id="pict" name="pict" size="30">
                        <img src="<?= base_url('img/produk/') . $p['foto']; ?>" width="100" class="mt-3" alt="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Modal Delete -->
<?php foreach ($produk as $p) :  ?>
    <div class="modal fade" id="deleteBimbelModalCenter<?= $p['id_produk'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteBimbelModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteBimbelModalLongTitle">Hapus Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin untuk menghapus produk ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                    <a href="<?= base_url('deleteProduk/' . $p['id_produk']) ?>" class="btn btn-dark">Ya</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>