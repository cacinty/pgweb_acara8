<?php
// Pengaturan koneksi basis data
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "latihan";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data dari tabel penduduk
$sql = "SELECT id, Kecamatan, Longitude, Latitude, Luas, Jumlah_Penduduk FROM penduduk";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1px'><tr>
        <th>ID</th>
        <th>Kecamatan</th>
        <th>Longitude</th>
        <th>Latitude</th>
        <th>Luas</th>
        <th>Jumlah Penduduk</th>
        <th>Aksi</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . 
        $row["id"]. "</td><td>" . 
        $row["Kecamatan"]. "</td><td>" . 
        $row["Longitude"]. "</td><td>" . 
        $row["Latitude"]. "</td><td>" . 
        $row["Luas"]. "</td><td>" . 
        $row["Jumlah_Penduduk"]. 
        //menambahkan link “Hapus” yang mengarah ke delete.php dengan parameter id dari baris yang bersangkutan. 
        "</td><td><a href='delete.php?id=" . $row["id"] . "'>Hapus</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
