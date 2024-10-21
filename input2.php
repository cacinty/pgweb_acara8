<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Kecamatan = isset($_POST['Kecamatan']) ? $_POST['Kecamatan'] : '';
    $Longitude = isset($_POST['Longitude']) ? $_POST['Longitude'] : '';
    $Latitude = isset($_POST['Latitude']) ? $_POST['Latitude'] : '';
    $Luas = isset($_POST['Luas']) ? $_POST['Luas'] : '';
    $Jumlah_Penduduk = isset($_POST['Jumlah_Penduduk']) ? $_POST['Jumlah_Penduduk'] : '';

    // Sesuaikan dengan setting MySQL
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "latihan";

    // Buat koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Periksa koneksi saat menghubungkan ke database
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Periksa apakah semua variabel POST diisi
    if (!empty($Kecamatan) && !empty($Longitude) && !empty($Latitude) && !empty($Luas) && !empty($Jumlah_Penduduk)) {
        $sql = "INSERT INTO penduduk (Kecamatan, Longitude, Latitude, Luas, Jumlah_Penduduk)
        VALUES ('$Kecamatan', $Longitude, $Latitude, $Luas, $Jumlah_Penduduk)";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "All fields are required.";
    }

    $conn->close();
}
?>

