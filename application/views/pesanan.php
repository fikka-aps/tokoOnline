<div class="bg0 m-t-23 p-b-140">
    <div class="container">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active text-dark" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Belum Dibayar</a>
                <a class="nav-item nav-link text-dark" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Menunggu Konfirmasi</a>
                <a class="nav-item nav-link text-dark" id="nav-profile-tab" data-toggle="tab" href="#nav-pengiriman" role="tab" aria-controls="nav-profile" aria-selected="false">Menunggu Pengiriman</a>
                <a class="nav-item nav-link text-dark" id="nav-profile-tab" data-toggle="tab" href="#nav-dikirim" role="tab" aria-controls="nav-profile" aria-selected="false">Dikirim</a>
                <a class="nav-item nav-link text-dark" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Pesanan Selesai</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <table class="table">
                    <thead class="bg-white">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Total</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        <?php $i = 1; ?>
                        <?php foreach ($belum_bayar as $p) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $p['nama_produk'] ?></td>
                                <td><?= $p['harga'] ?></td>
                                <td><?= $p['jumlah'] ?></td>
                                <td><?= $p['total'] ?></td>
                                <td><img src="<?= base_url('img/produk/') . $p['foto']; ?>" width="150" alt=""></td>
                                <td><?= $p['status'] ?></td>
                                <td>
                                    <a href="" class="badge badge-light" data-toggle="modal" data-target="#bayarProdukModalCenter<?= $p['id_penjualan'] ?>">Bayar</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <table class="table">
                    <thead class="bg-white">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Total</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        <?php $i = 1; ?>
                        <?php foreach ($menunggu_konfirmasi as $p) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $p['nama_produk'] ?></td>
                                <td><?= $p['harga'] ?></td>
                                <td><?= $p['jumlah'] ?></td>
                                <td><?= $p['total'] ?></td>
                                <td><img src="<?= base_url('img/produk/') . $p['foto']; ?>" width="150" alt=""></td>
                                <td><?= $p['status'] ?></td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="nav-pengiriman" role="tabpanel" aria-labelledby="nav-pengiriman-tab">
                <table class="table">
                    <thead class="bg-white">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Total</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        <?php $i = 1; ?>
                        <?php foreach ($pengiriman as $p) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $p['nama_produk'] ?></td>
                                <td><?= $p['harga'] ?></td>
                                <td><?= $p['jumlah'] ?></td>
                                <td><?= $p['total'] ?></td>
                                <td><img src="<?= base_url('img/produk/') . $p['foto']; ?>" width="150" alt=""></td>
                                <td><?= $p['status'] ?></td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="nav-dikirim" role="tabpanel" aria-labelledby="nav-dikirim-tab">
                <table class="table">
                    <thead class="bg-white">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Total</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        <?php $i = 1; ?>
                        <?php foreach ($dikirim as $p) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $p['nama_produk'] ?></td>
                                <td><?= $p['harga'] ?></td>
                                <td><?= $p['jumlah'] ?></td>
                                <td><?= $p['total'] ?></td>
                                <td><img src="<?= base_url('img/produk/') . $p['foto']; ?>" width="150" alt=""></td>
                                <td><?= $p['status'] ?></td>
                                <td>
                                <a href="<?= base_url('diterima /' . $p['id_penjualan']) ?>" class="badge badge-success">Diterima</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <table class="table">
                    <thead class="bg-white">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Total</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        <?php $i = 1; ?>
                        <?php foreach ($selesai as $p) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $p['nama_produk'] ?></td>
                                <td><?= $p['harga'] ?></td>
                                <td><?= $p['jumlah'] ?></td>
                                <td><?= $p['total'] ?></td>
                                <td><img src="<?= base_url('img/produk/') . $p['foto']; ?>" width="150" alt=""></td>
                                <td><?= $p['status'] ?></td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                    Belum Dibayar
                </button>

                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".women">
                    Menunggu Konfirmasi
                </button>

                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".men">
                    Pesanan Selesai
                </button>
            </div> 
        </div> -->
        <!-- Page Heading -->

    </div>
</div>
<!-- Modal Add Promo -->
<?php foreach ($belum_bayar as $b) :  ?>
    <div class="modal fade" id="bayarProdukModalCenter<?= $b['id_penjualan'] ?>" tabindex="-1" role="dialog" aria-labelledby="bayarProdukModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="margin-top:200px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bayarProdukModalLongTitle">Bayar Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <?= form_open_multipart('buktiBayar'); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="Bimbel" name="Bimbel" value="<?= $b['id_penjualan'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="pict">Bukti Pembayaran</label>
                        <input type="hidden" class="form-control" id="id" name="id" value="<?= $b['id_penjualan'] ?>" size="30">
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
<?php endforeach; ?>