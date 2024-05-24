<?php
require 'config.php';

// Pastikan hanya pengguna yang telah login yang dapat mengakses dashboard
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Query untuk mengambil data kamar dari database
$sql = "SELECT * FROM kamar";
$result = $conn->query($sql);

$kamars = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $kamars[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css"> <!-- Gaya CSS opsional -->
</head>
<body>
    <header>
        <div class="container">
            <h1>Welcome to Your Dashboard</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <div class="container">
            <h2>Kamar Hotel</h2>
            <table>
                <thead>
                    <tr>
                        <th>No Kamar</th>
                        <th>Tipe Kamar</th>
                        <th>Harga Kamar</th>
                        <th>Status Kamar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($kamars as $kamar): ?>
                        <tr>
                            <td><?php echo $kamar['id_kamar']; ?></td>
                            <td><?php echo $kamar['tipe_kamar']; ?></td>
                            <td><?php echo $kamar['harga_kamar']; ?></td>
                            <td><?php echo $kamar['status_kamar']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
