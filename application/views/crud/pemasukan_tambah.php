<div class="bg-light rounded h-100 p-4">
	<h2 class="mb-4 ms-1">Tambah Pemasukan</h6>
	<form method="post" action="<?= base_url('pemasukan/simpan') ?>">
		<div class="form-floating mb-3">
			<input type="text" class="form-control" id="floatingInput" placeholder="Keterangan" name="keterangan">
			<label for="floatingInput">Keterangan</label>
		</div>
		<div class="form-floating mb-3">
			<input type="date" class="form-control" id="floatingInput" placeholder="Tanggal Transaksi" name="tanggal">
			<label for="floatingInput">Tanggal</label>
		</div>
		<div class="form-floating mb-3">
			<input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username" disabled>
			<label for="floatingInput"><?= $this->session->userdata('username') ?></label>
		</div>
        <div class="form-floating mb-3">
			<select name="jenis_transaksi" class="form-select" id="jenisTransaksi" hidden>
                <option value="pemasukan">Pemasukan</option>
            </select>
			<label for="jenisTransaksi">Jenis Transaksi</label>
		</div>
		<div class="form-floating mb-3">
			<input type="number" class="form-control" id="nominal" placeholder="Nominal Transaksi" name="nominal">
			<label for="nominal">Nominal</label>
		</div>
		<button type="submit" class="btn btn-primary rounded-4 m-1">Tambah</button>
	</form>
</div>
