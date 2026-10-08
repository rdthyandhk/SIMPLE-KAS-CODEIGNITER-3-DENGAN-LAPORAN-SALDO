<div class="bg-light rounded h-100 p-4">
	<h2 class="mb-4 ms-1">Edit User</h2>
	<form method="post" action="<?= base_url('user/update') ?>">
		<input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">
		<div class="form-floating mb-3">
			<input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username" value="<?= $user['username'] ?>">
			<label for="floatingInput">Username</label>
		</div>
		<div class="form-floating mb-3">
			<input type="password" class="form-control" id="floatingPassword" placeholder="Kosongkan jika tidak diubah" name="password" value="<?= $user['password'] ?>">
			<label for="floatingPassword">Password</label>
		</div>
		<div class="form-floating mb-3">
			<input type="text" class="form-control" id="floatingInput" placeholder="Nama Lengkap" name="nama" value="<?= $user['nama'] ?>">
			<label for="floatingInput">Nama</label>
		</div>
		<div class="form-floating mb-3">
			<select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="level">
				<option value="admin" <?= $user['level'] === 'admin' ? 'selected' : '' ?>>Admin</option>
				<option value="user" <?= $user['level'] === 'user' ? 'selected' : '' ?>>User</option>
			</select>
			<label for="floatingSelect">Role User</label>
		</div>
		<button type="submit" class="btn btn-primary rounded-4 m-1">Simpan Perubahan</button>
	</form>
</div>
