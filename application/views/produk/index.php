<!DOCTYPE html>
<html>
<head>
	<title>Data Produk</title>
	<style>
	body {
		font-family: 'Segoe UI', sans-serif;
		background: #f4f6f9;
		padding: 40px;
	}

	.container {
		max-width: 1100px;
		margin: auto;
		background: white;
		padding: 25px;
		border-radius: 10px;
		box-shadow: 0 5px 15px rgba(0,0,0,0.08);
	}

	h2 {
		margin-bottom: 20px;
	}

	/* Navigasi tombol */
	.nav-buttons {
		display: flex;
		justify-content: center;
		margin-bottom: 20px;
	}

	.nav-buttons button {
		padding: 10px 20px;
		margin: 0 10px;
		border: none;
		border-radius: 6px;
		cursor: pointer;
		font-size: 14px;
		background: #4e73df;
		color: white;
		transition: background 0.3s;
	}

	.nav-buttons button:hover {
		background: #2e59d9;
	}

	.nav-buttons button.active {
		background: #1cc88a;
	}

	/* Konten halaman */
	.page {
		display: none;
	}

	.page.active {
		display: block;
	}

	table {
		width: 100%;
		border-collapse: collapse;
		table-layout: fixed;
	}

	th {
		background: #4e73df;
		color: white;
		padding: 12px;
		text-align: left;
	}

	td {
		padding: 10px;
		border-bottom: 1px solid #eee;
	}

	tr:hover {
		background: #f1f3ff;
	}

	th, td {
		vertical-align: middle;
		word-break: break-word;
		white-space: normal;
	}

	tbody tr {
		min-height: 70px;
	}

	.badge {
		padding: 5px 10px;
		border-radius: 6px;
		color: white;
		font-size: 12px;
	}

	.jual {
		background: #1cc88a;
	}

	.tidak {
		background: #e74a3b;
	}

	.btn {
		padding: 6px 10px;
		border: none;
		border-radius: 6px;
		cursor: pointer;
		font-size: 12px;
	}

	.edit {
		background: #f6c23e;
		color: white;
	}

	.hapus {
		background: #e74a3b;
		color: white;
	}

	.btn-nav { padding: 10px 20px; margin: 0 10px; border: none; border-radius: 6px; cursor: pointer; font-size: 14px; background: #4e73df; color: white; text-decoration: none; transition: background 0.3s; 
	} 

	.btn-nav:hover { 
		background: #2e59d9; 
	} 

	.btn-nav.active { 
		background: #1cc88a; 
	}

	.tambah{
		background:#1cc88a;
		color:white;
		padding:8px 14px;
		border-radius:6px;
		text-decoration:none;
	}

	.action-bar{
		margin: 20px 0;
	}

	.action-bar .tambah{
		display:inline-block;
	}

	.nama-produk {
		max-width: 420px;
		line-height: 1.4;
	}


</style>
</head>
<body>
	<!-- MAIN -->
	<div class="main">
		<div class="container">
			<!-- Navigasi Tombol -->
			<div class="nav-buttons">
				<a href="<?= site_url('produk') ?>" class="btn-nav active">Produk</a>
				<a href="<?= site_url('kategori') ?>" class="btn-nav">Kategori</a>
				<a href="<?= site_url('status') ?>" class="btn-nav">Status</a>
			</div>
			<!-- Halaman Produk -->
			<div id="page-produk" class="page active">
				<div class="panel">
					<div class="panel-heading">
						<h2>📦 Data Produk</h2>
					</div>
					<div class="panel-body">
						<div class="action-bar">
							<a href="<?php echo site_url('produk/tambah') ?>" class="btn tambah">Tambah Produk</a>
						</div>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>NO</th>
									<th>ID PRODUK</th>
									<th>NAMA PRODUK</th>
									<th>HARGA</th>
									<th>KATEGORI</th>
									<th>STATUS</th>
									<th>AKSI</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1; foreach($produk as $data): ?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?php echo $data->id_produk ?></td>
									<td class="nama-produk"><?= $data->nama_produk ?></td>
									<td><?php echo $data->harga ?></td>
									<td><?php echo $data->nama_kategori ?></td>
									<td><?php echo $data->nama_status ?></td>
									<td width="250">
										<a href="<?php echo site_url('produk/editproduk/'.$data->id_produk) ?>" class="btn edit" role="button">Edit</a>
										<a href="javascript:void(0)" onclick="confirmDelete('<?php echo site_url('produk/hapusproduk/'.$data->id_produk) ?>')" class="btn hapus" role="button">Hapus</a>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>

<script>
	// Fungsi konfirmasi hapus
	function confirmDelete(url) {
		if (confirm("Apakah Anda yakin ingin menghapus produk ini?")) {
			window.location.href = url; // Redirect ke URL hapus jika OK
		}
	}

	// Fungsi untuk mengganti halaman
	function showPage(pageId, buttonId) {
		// Sembunyikan semua halaman
		const pages = document.querySelectorAll('.page');
		pages.forEach(page => page.classList.remove('active'));

		// Hapus class active dari semua tombol
		const buttons = document.querySelectorAll('.nav-buttons button');
		buttons.forEach(button => button.classList.remove('active'));

		// Tampilkan halaman yang dipilih
		document.getElementById(pageId).classList.add('active');

		// Tambahkan class active ke tombol yang diklik
		document.getElementById(buttonId).classList.add('active');
	}

	// Event listener untuk tombol
	document.getElementById('btn-produk').addEventListener('click', () => showPage('page-produk', 'btn-produk'));
	document.getElementById('btn-kategori').addEventListener('click', () => showPage('page-kategori', 'btn-kategori'));
	document.getElementById('btn-status').addEventListener('click', () => showPage('page-status', 'btn-status'));
</script>
</body>
</html>