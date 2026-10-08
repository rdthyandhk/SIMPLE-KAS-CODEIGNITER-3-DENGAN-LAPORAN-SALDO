<div class="bg-light rounded h-100 p-4">
	<h2 class="mb-4 ms-1">Tambah User</h6>
	<form method="post" action="<?= base_url('user/simpan') ?>">
		<div class="form-floating mb-3">
			<input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username">
			<label for="floatingInput">Username</label>
		</div>
		<div class="form-floating mb-3">
			<input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
			<label for="floatingPassword">Password</label>
		</div>
		<div class="form-floating mb-3">
			<input type="text" class="form-control" id="floatingInput" placeholder="Nama Lengkap" name="nama">
			<label for="floatingInput">Nama</label>
		</div>
		<div class="form-floating mb-3">
			<select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="level">
				<option value="admin">Admin</option>
				<option value="user">User</option>
			</select>
			<label for="floatingSelect">Role User</label>
		</div>
		<button type="submit" class="btn btn-primary rounded-4 m-1">Tambah</button>
	</form>
</div>
