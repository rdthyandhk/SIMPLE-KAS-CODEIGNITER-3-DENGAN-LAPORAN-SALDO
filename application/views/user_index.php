<div class="col-12">
	<a class="btn btn-success m-2" href="<?= base_url('user/tambah') ?>">Tambah User</a>
	<div class="bg-light rounded h-100 p-4">
		<h6 class="mb-4">Data User</h6>
		<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Username</th>
						<th scope="col">Nama</th>
						<th scope="col">Level</th>
						<th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; foreach($user as $a): ?>
						<tr>
							<th scope="row"><?= $no++ ?></th>
							<td><?= $a['username'] ?></td>
							<td><?= $a['nama'] ?></td>
							<td><?= $a['level'] ?></td>
							<td>
								<a href="<?= base_url('user/edit/' . $a['id_user']) ?>" class="btn btn-warning">
									<i class="fa fa-pen"></i>
								</a>
								|
								<a href="<?= base_url('user/hapus/' . $a['id_user']) ?>" class="btn btn-danger" onclick="">
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
