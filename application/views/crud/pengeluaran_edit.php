<div class="bg-light rounded h-100 p-4">
	<h2 class="mb-4 ms-1">Edit Pengeluaran</h2>
	<form method="post" action="<?= base_url('pengeluaran/update/' . $pengeluaran['id_transaksi']) ?>">
		<div class="form-floating mb-3">
			<input type="text" class="form-control" id="keterangan" placeholder="Keterangan" name="keterangan" value="<?= html_escape($pengeluaran['keterangan']) ?>">
			<label for="keterangan">Keterangan</label>
		</div>
		<div class="form-floating mb-3">
			<input type="date" class="form-control" id="tanggal" placeholder="Tanggal Transaksi" name="tanggal" value="<?= html_escape($pengeluaran['tanggal']) ?>">
			<label for="tanggal">Tanggal</label>
		</div>
		<div class="form-floating mb-3">
			<input type="text" class="form-control" id="username" placeholder="Username" value="<?= html_escape($pengeluaran['username']) ?>" disabled>
			<label for="username">Username</label>
		</div>
        <div class="form-floating mb-3">
			<select name="jenis_transaksi" class="form-select" id="jenisTransaksi" hidden>
                <option value="pengeluaran">Pengeluaran</option>
            </select>
			<label for="jenisTransaksi">Jenis Transaksi</label>
		</div>
		<div class="form-floating mb-3">
			<input type="number" class="form-control" id="nominal" placeholder="Nominal Transaksi" name="nominal" value="<?= html_escape($pengeluaran['nominal']) ?>">
			<label for="nominal">Nominal</label>
		</div>
		<button type="submit" class="btn btn-primary rounded-4 m-1">Edit</button>
	</form>
</div>
