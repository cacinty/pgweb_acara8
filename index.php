<?php
// Sesuaikan dengan setting MySQL
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "latihan";

    // Variabel yang menyimpan objek koneksi ke basis data ; Membuat objek koneksi baru menggunakan kelas mysqli dengan parameter
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if  ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM penduduk";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1px'><tr>
              <th>Kecamatan</th>
              <th>Longitude</th>
              <th>Latitude</th>
              <th>id</th>
              <th>Luas</th>
              <th>Jumlah Penduduk</th>";

        // Loop mengambil satu baris data sebagai hasil query
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["Kecamatan"]."</td><td>".
                $row["Longitude"]."</td><td>".
                $row["Latitude"]."</td><td>".
                $row["id"]."</td><td>".
                $row["Luas"]."</td><td align='right'>".
                $row["Jumlah_Penduduk"]."</td></tr>";
        }
        echo "</table>";
        } else {
        echo "0 results";
        }
        $conn->close();
?>




