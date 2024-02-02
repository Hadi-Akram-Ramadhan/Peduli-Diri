<?php
$title = 'Home';
include 'layouts/head.php';

$servername = "localhost";
    $username = "Hadooyy";
    $password = "123";
    $dbname = "peduli_diri";
    $conn = new mysqli($servername, $username, $password, $dbname);
    
// Mengecek apakah NIK ada di database
$sql = "SELECT * FROM config WHERE nik='".$_SESSION['nik']."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $user = [
            'nik' => $row['nik'],
            'nama' => $row['nama']
        ];
    }
}
?>
<div class="card text-center">
    <div class="card-header">
        Home
    </div>
    <div class="card-body">
        <h5 class="card-title">Hai, <?= $user['nama']; ?></h5>
        <p class="card-text">Selamat datang di aplikasi catatan perjalanan Peduli Diri, catat setiap perjalanan yang anda lakukan untuk membantu tracking penyebaran COVID-19.</p>
        <a href="catatan.php" class="btn btn-danger">Lihat Catatan</a>
    </div>
</div>
<?php include 'layouts/footer.php'; ?>
