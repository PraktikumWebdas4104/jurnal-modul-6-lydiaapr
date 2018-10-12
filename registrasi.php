<body bgcolor="red" align="center">
	<h1>FORM REGISTRASI MAHASISWA</h1>
<form method="POST">
<table>
	<tr>
		<td>NAMA :</td>
		<td><input type="text" name="nama"></td>
	</tr>
	<tr>
		<td>NIM :</td>
		<td><input type="text" name="nim"></td>
	</tr>
	<tr>
		<td>KELAS:</td>
		<td><input type="text" name="kelas"></td>
	</tr>
	<tr>
		<td><input type="radio" name="jk" value="laki-laki" checked>Laki-laki<br></td>
  		<td><input type="radio" name="jk" value="perempuan">Perempuan<br></td>
	</tr>
	<tr>
		<td>Hobi : <br/>
			<input type="checkbox" name="hobi" value="berenang">Berenang<br/>
			<input type="checkbox" name="hobi" value="hiking">Hiking<br/>
			<input type="checkbox" name="hobi" value="diving">Diving<br/>
			<input type="checkbox" name="hobi" value="mancing">Mancing<br/>
			<input type="checkbox" name="hobi" value="nonton film">Nonton Film<br/><br/>
			<input type="reset" name="delete" value="Delete Hobi"><br/><br/>
		</td>
	</tr>
		<tr>
		<td><select name="fakultas" required>
 			<option value="fit">FAKULTAS ILMU TERAPAN</option>
  			<option value="fik">FAKULTAS INDUSTRI KREATIF</option>
  			<option value="feb">FAKULTAS EKONOMI BISNIS</option>
  			<option value="fkb">FAKULTAS KOMUNIKASI BISNIS</option>
		</td>
	</tr>
	<tr>
		<td>ALAMAT:</td>
		<td><input type="textarea" name="alamat"></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td><input type="submit" name="submit" value="DAFTAR"></td>
	</tr>
</table>
</form>
</body>

<?php 
	if(isset($_POST['submit'])){
		include("koneksiDB.php");
		$nim = $_POST['nim'];
		$nama = $_POST['nama'];
		$password= $_POST['password'];
		$email = $_POST['kelas'];
		$jk = $_POST['jk'];
		$prodi = $_POST['hobi'];
		$fakultas = $_POST['fakultas'];
		$hobi = $_POST['alamat'];
		$status=true;

		if (!is_int($nim) and (strlen($nim)<10) or (strlen($nim)>10)) {
			echo("NIM harus angka dan 10 karakter");
			$status=false;
		}

		if (!preg_match('/^[a-z A-Z]$/i', $nama) and strlen($nama)>25) {
			echo("Nama harus huruf dengan maksimal 35 karakter");
			$status=false;
		}

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {