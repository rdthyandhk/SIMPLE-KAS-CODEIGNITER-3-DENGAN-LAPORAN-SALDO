<?php
$pemasukan = $this->Admin_M->pemasukan();
$pengeluaran = $this->Admin_M->pengeluaran();
$saldo_akhir = $pemasukan - $pengeluaran;
?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
	Laporan
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Laporan</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div>
				<form action="<?= base_url('home/laporan') ?>" method="get" target="_blank">
					<div class="modal-body">
						<div class="row mb-3">
							<label class="col-sm-2 col-form-label">Tanggal Awal</label>
							<div class="col-sm-10">
								<input type="date" class="form-control" name="tanggal1" required>
							</div>
						</div>
						<div class="row mb-3">
							<label class="col-sm-2 col-form-label">Tanggal Akhir</label>
							<div class="col-sm-10">
								<input type="date" class="form-control" name="tanggal2" required>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Cetak PDF</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="col-xs-12">
	<div class="box box-solid">
		<div class="box-body">
			<div class="col-xs-12">
				<table class="table table-striped">
					<tbody>
						<tr>
							<td colspan="3" style="text-align: center; font-size: 18px;">TOTAL SEMUA PEMASUKAN
							</td>
						</tr>
						<tr>
							<td style="text-align: center;">HARI INI</td>
							<td style="text-align: center;">BULAN INI</td>
							<td style="text-align: center;">TOTAL PEMASUKAN</td>
						</tr>
						<tr>
							<td style="text-align: center;">Rp.
								<?= number_format((float) $this->Admin_M->pemasukan_hari_ini(), 2, ',', '.') ?></td>
							<td style="text-align: center;">Rp.
								<?= number_format((float) $this->Admin_M->pemasukan_bulan_ini(), 2, ',', '.') ?></td>
							<td style="text-align: center;">Rp.
								<?= number_format((float) $pemasukan, 2, ',', '.') ?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-xs-12">
				<table class="table table-striped">
					<tbody>
						<tr>
							<td colspan="4" style="text-align: center; font-size: 18px;">TOTAL SEMUA PENGELUARAN
							</td>
						</tr>
						<tr>
							<td style="text-align: center;">HARI INI</td>
							<td style="text-align: center;">BULAN INI</td>
							<td style="text-align: center;">TOTAL PENGELUARAN</td>
							<td style="text-align: center;">SALDO AKHIR</td>
						</tr>
						<tr>
							<td style="text-align: center;">Rp.
								<?= number_format((float) $this->Admin_M->pengeluaran_hari_ini(), 2, ',', '.') ?></td>
							<td style="text-align: center;">Rp.
								<?= number_format((float) $this->Admin_M->pengeluaran_bulan_ini(), 2, ',', '.') ?></td>
							<td style="text-align: center;">Rp.
								<?= number_format((float) $pengeluaran, 2, ',', '.') ?>
							<td style="text-align: center;">Rp. <?= number_format((float) $saldo_akhir, 2, ',', '.') ?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
