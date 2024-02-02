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

$html = '<table class="table table-bordered">';
$html .= '<tr><th>#</th><th>Tanggal</th><th>Waktu</th><th>Lokasi</th><th>Suhu Tubuh</th></tr>';

$no = 1;
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $html .= '<tr>';
        $html .= '<td>' . $no++ . '</td>';
        $html .= '<td>' . $row['tanggal'] . '</td>';
        $html .= '<td>' . $row['jam'] . '</td>';
        $html .= '<td>' . $row['lokasi'] . '</td>';
        $html .= '<td>' . $row['suhu'] . '°C</td>';
        $html .= '</tr>';
    }
} else {
    $html .= '<tr><td colspan="5" class="fw-light fst-italic">Maaf data tidak ada.</td></tr>';
}
$html .= '</table>';
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
        <?php echo $html; ?>
        <form method="POST" action="generate_pdf.php">
            <input type="hidden" name="html" value="<?php echo htmlspecialchars($html); ?>">
            <button type="submit" class="btn btn-primary">Print to PDF</button>
        </form>
    </div>
</div>

<?php include 'layouts/footer.php'; ?>
