<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Pengiriman</h1>

    <table class="table">
        <thead class="bg-white">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Nama User</th>
                <th scope="col">Harga</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Total</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            <?php $i = 1; ?>
            <?php foreach ($produk as $p) : ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $p['nama_produk'] ?></td>
                    <td><?= $p['nama_user'] ?></td>
                    <td><?= $p['harga'] ?></td>
                    <td><?= $p['jumlah'] ?></td>
                    <td><?= $p['total'] ?></td>
                    <td><?= $p['status'] ?></td>
                    <td>
                        <a href="" class="badge badge-warning" data-toggle="modal" data-target="#inputResiModalCenter<?= $p['id_penjualan'] ?>">Input Resi</a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<!-- Modal Add Promo -->
<?php foreach ($produk as $b) :  ?>
    <div class="modal fade" id="inputResiModalCenter<?= $b['id_penjualan'] ?>" tabindex="-1" role="dialog" aria-labelledby="inputResiModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="inputResiModalLongTitle">Input Resi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open_multipart('resi'); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="id" value=" <?= $p['id_penjualan'] ?>">
                        <label for="resi">Resi</label>
                        <input type="text" class="form-control" id="resi" name="resi"">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark">Send</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>