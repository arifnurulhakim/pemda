<?php
// Load file koneksi.php
$host = "localhost"; // Nama hostnya
$username = "root"; // Username
$password = ""; // Password (Isi jika menggunakan password)
$database = "dbpemda"; // Nama databasenya

$connect = mysqli_connect($host, $username, $password, $database); // Koneksi ke MySQL

// Ambil data ID kecamatan yang dikirim via ajax post
$id_kecamatan = $_POST['kecamatan'];

// Buat query untuk menampilkan data desa dengan kecamatan tertentu (sesuai yang dipilih user pada form)
$sql = mysqli_query($connect, "SELECT * FROM desa WHERE id_kecamatan='" . $id_kecamatan . "' ORDER BY nama");

// Buat variabel untuk menampung tag-tag option nya
// Set defaultnya dengan tag option Pilih
$html = "<option value=''>Pilih</option>";

while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
    $html .= "<option value='" . $data['id'] . "'>" . $data['nama'] . "</option>"; // Tambahkan tag option ke variabel $html
}

$callback = array('data_desa' => $html); // Masukan variabel html tadi ke dalam array $callback dengan index array : data_desa

echo json_encode($callback); // konversi varibael $callback menjadi JSON
