<?php
$title = 'Catatan';
include 'layouts/head.php';

$servername = "localhost";
    $username = "Hadooyy";
    $password = "123";
    $dbname = "peduli_diri";
    $conn = new mysqli($servername, $username, $password, $dbname);
// Mengecek apakah NIK ada di database dan mengambil data catatan
$sql = "SELECT * FROM data WHERE id='".$_SESSION['nik']."'";
$result = $conn->query($sql);
?>
<div class="card">
    <div class="card-header text-center">
        Catatan
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md">
                <select class="form-select mb-3" id="urut" onchange="urutkan(this)">
                    <option selected disabled>Urutkan berdasarkan</option>
                    <option value="0">Tanggal</option>
                    <option value="1">Waktu</option>
                    <option value="2">Lokasi</option>
                    <option value="3">Suhu</option>
                </select>
            </div>
            <div class="col-md">
                <a href="isi_data.php" class="btn btn-danger float-end">Isi Data</a>
            </div>
        </div>
        <table class="table table-bordered" id="catatanTable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Suhu Tubuh</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><?= $row['tanggal']; ?></td>
                        <td><?= $row['jam']; ?></td>
                        <td><?= $row['lokasi']; ?></td>
                        <td><?= $row['suhu']; ?>°C</td>
                    </tr>
                <?php 
                    }
                } else {
                    echo '<td colspan="5" class="fw-light fst-italic">Maaf data tidak ada.</td>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php include 'layouts/footer.php'; ?>