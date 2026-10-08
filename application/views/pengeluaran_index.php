<div class="col-12">
	<a class="btn btn-success m-2" href="<?= base_url('pengeluaran/tambah') ?>">Tambah Pengeluaran</a>
	<div class="bg-light rounded h-100 p-4">
		<h6 class="mb-4">Data Pengeluaran</h6>
		<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Keterangan</th>
						<th scope="col">Tanggal</th>
						<th scope="col">Username</th>
						<th scope="col">Jenis Transaksi</th>
						<th scope="col">Nominal</th>
						<th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; foreach($pengeluaran as $a): ?>
						<tr>
							<th scope="row"><?= $no++ ?></th>
							<td><?= $a['keterangan'] ?></td>
							<td><?= $a['tanggal'] ?></td>
							<td><?= $a['username'] ?></td>
							<td><?= $a['jenis_transaksi'] ?></td>
							<td>Rp <?= number_format((float) $a['nominal'], 2, ',', '.') ?></td>
							<td>
								<a href="<?= base_url('pengeluaran/edit/' . $a['id_transaksi']) ?>" class="btn btn-warning">
									<i class="fa fa-pen"></i>
								</a>
								|
								<a href="<?= base_url('pengeluaran/hapus/' . $a['id_transaksi']) ?>" class="btn btn-danger" onclick="">
									<i class="fa fa-trash"></i>
								</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
