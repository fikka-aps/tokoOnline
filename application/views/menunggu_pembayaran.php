<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Menunggu Pembayaran</h1>

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
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>