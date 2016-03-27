<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Kombinasi Framework Codeigniter & Database MongoDB</title>
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<style>
		html, body{
			background-color: #F7F7F7;
			font-family :Arial, Helvetica, sans-serif;
			padding: 0;
			margin: 0;
			font-size: 15px;
			color: #000;
		}
		#wrapper{
			width: 1200px;
			margin-left: auto;
			margin-right: auto;
		}
		#header, #content{
			padding: 10px;
		}
		#header{
			background: #EDEDED;
		}
		#content{
			position: relative;
		}
		#content .block{
			margin-right: 25px;
			float: left;
		}
		.block-2{
			border-left: 1px solid #DDD;
			padding-left: 10px;
		}
		table{
			border-collapse: collapse;
		}
		table, td, th{
			border: 1px solid #DDD;
		}
		td, th{
			padding: 10px;
		}
		form table, form td, form th{
			padding: 3px;
			border: none;
		}
		a{
			color: #3B6DCA;
			text-decoration: none;
		}
		a:hover, a:active{
			color: #31569C;
		}
	</style>
</head>
<body>

<div id="wrapper">
	<div id="header">
		<h1>Kombinasi Framework Codeigniter & Database MongoDB</h1>
		<p>Ini adalah aplikasi CRUD menggunakan PHP sebagai bahasa pemrograman dan MongoDB sebagai databasenya,<br>Serta menggunakan Framework Codeigniter versi <?php echo CI_VERSION; ?></p>
	</div>
	<div id="content">
		<div class="block">
			<h3>Hasil Data:</h3>
			<?php echo $pesan; ?>
			<table>
				<thead>
					<tr>
						<th>Nama</th>
						<th>Jenis Kelamin</th>
						<th>Usia</th>
						<th>Tindakan</th>
					</tr>		
				</thead>
				<tbody>
				<?php if (!empty($siswa)): ?>
					<?php foreach ($siswa as $item): ?>
						<tr>
							<td><?php echo $item['nama'] ?></td>
							<td><?php echo $item['jenis_kelamin'] ?></td>
							<td><?php echo $item['usia'] ?></td>
							<td align="center">
								<a href="<?php echo base_url('page/hapus_data/' . $item['_id']); ?>">Hapus</a>
								| <a href="javascript:void(0)" onclick="edit(this)" data-id="<?php echo $item['_id'] ?>">Edit</a>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php else: ?>
					<tr><td colspan="4" align="center">Tidak ada data, silahkan masukkan data</td></tr>
				<?php endif; ?>
				</tbody>
			</table>
		</div>
		<div class="block block-2">
			<h3>Tambah / Edit Data:</h3>
			<form action="<?php echo base_url('page/tambah_data'); ?>" method="POST">
				<table>
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td><input name="nama" type="text"></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td>:</td>
						<td>
							<select name="jenis_kelamin">
								<option value="Laki-laki">Laki-laki</option>
								<option value="Perempuan">Perempuan</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Usia</td>
						<td>:</td>
						<td><input name="usia" type="number" min="1"></td>
					</tr>
					<tr>
						<td colspan="2"></td>
						<td id="execution"><input type="submit" value="Simpan">&nbsp;</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</div>

<script>
// from
var form = document.getElementsByTagName('form')[0];
function edit (elem) {
	// dapatkan id dari document
	var id = elem.getAttribute('data-id');
	// area tombol simpan
	var execAria = document.getElementById('execution');
	// tombol [baru]
	var new_btn = document.getElementById('new-btn');
	// apakah tombol [baru] belum ada?
	if (!new_btn) {
		// tambah tombol [baru]
		execAria.innerHTML += '<a href="javascript:void(0)" id="new-btn" onclick="baru(this)">[Baru]</a>';
	};
	// ganti tujuan form action
	form.setAttribute('action', '<?php echo base_url('page/update_data'); ?>')
	// tambah input hidden (untuk menyimpan id sebagai referensi document yang akan di ubah)
	addHiddenInput('<input name="doc_id" id="uniqe_id" type="hidden" value="'+id+'" />');
}
function baru (elem) {
	// ganti tujuan form action
	form.setAttribute('action', '<?php echo base_url('page/tambah_data'); ?>')
	// hapus input hidden
	addHiddenInput('');
	// hapus tombol [baru]
	elem.outerHTML = '';
}
function addHiddenInput (html) {
	// input hidden (id refernsi)
	var el = document.getElementById('uniqe_id');
	// apakah element yang di maksud sudah ada?
	if (el){
		// bersihkan element tersebut
		el.outerHTML = '';
	}
	// apakah akan di tambah element?
	if (html !== '') {
		// tambahkan element
		form.innerHTML += html;
	};
}
</script>
</body>
</html>
