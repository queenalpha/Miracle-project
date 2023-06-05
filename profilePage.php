<?php
session_start();
include ('server/connection.php');

if (!isset($_SESSION['logged_in'])) {
    header('location: profilePage.php');
    exit;   
} 

if (isset($_GET['logout'])) {
    if (isset($_SESSION['logged_in'])) {
        unset($_SESSION['logged_in']);
        unset($_SESSION['email_akun']);
        header('location: login.php');
        exit;
    } else {
        echo "Session logged_in tidak ditemukan.";
    }
  exit;
}

if (isset($_POST['up'])) {

    $ID_akun = $_POST['ID_akun'];

$nama_akun = $_POST['nama_akun'];
$email_akun = $_POST['email_akun'];
$Telephone = $_POST['Telephone'];
$path = "../images/" . basename($_FILES['pict_akun']['name']);
$image = $_FILES['pict_akun']['name'];

// if (!empty($_FILES['skill_image']['name'])) {
// }
move_uploaded_file($_FILES['pict_akun']['name'], $path);

$query = "UPDATE akun SET nama_akun = '$nama_akun', email_akun = '$email_akun', Telephone = '$Telephone', pict_akun = '$image' WHERE ID_akun = '$ID_akun'";
$y_hasil = mysqli_query($conn, $query);
}



$x_akun = 'SELECT * FROM akun';
$y_akun = mysqli_query($conn, $x_akun);
$row = mysqli_fetch_assoc($y_akun);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="CSS/user.css">
    <link rel="stylesheet" href="CSS/main.css">
    <script src="CSS/bootstrap-5.3.0-alpha3-dis/dist/js/bootstrap.bundle.min.js"></script> 
    <link rel="icon" type="image/png" href="Assets/icon/icon.png">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg p-md-3 nav-scrolled fixed-top">
        <img src="Assets/icon/typograph.png" class="ms-5" width="100px" alt="">
    </nav>
    
    <div class="side-bar">
        <div class="side-text">
            <ul>
                <li>
                    <a href="">Profile</a>
                </li>
                <li>
                    <a href="riwayatDonasi.php">Riwayat Donasi</a>
                </li>
                <li>
                    <a href="campaign.php">Program  Campaign</a>
                </li>
            </ul>

            <div  class="link-bottom">
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="profilePage.php?logout=1">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
   
    <div class="container profile">
        <div class="profile-content d-flex">
        <?php echo "<img src='images/" . $row['pict_akun'] . "'>"; ?>
            <div class="bio">
            <input type="text" name="nama_akun" class="" value="<?php echo $row['nama_akun'] ?>" readonly>
            <input type="text" name="Telephone" class="" value="<?php echo $row['Telephone'] ?>" readonly>
                <p>#temanbaik #BeMiracle</p>
            </div>
        </div>

        <div class="container">
            <form method="post" action="" enctype="multipart/form-data">
                <input type="hidden" name="ID_akun" value="<?php echo $row['ID_akun']; ?>">
                <div class="form-row my-3 ">
                  <div class="col-4">
                    <label for="Email">Name</label>
                    <input type="username" name="nama_akun" class="form-control" placeholder="Name" value="<?php echo $row['nama_akun']; ?>">
                  </div>
                  <div class="form-email col-4 ms-5">
                    <label for="Email">Email</label>
                    <input type="email" name="email_akun" class="form-control" placeholder="Email" value="<?php echo $row['email_akun']; ?>">
                  </div>
                  <div class="form-tel col-4">
                    <label for="tel">Telephone</label>
                    <input type="tel" name="Telephone" class="form-control"  value="<?php echo $row['Telephone']; ?>">
                  </div>
                  <div class="form-photo col-4 ms-5">
                    <label for="Email">Photo</label>
                    <input type="file" name="pict_akun" class="form-control">
                    <img src="<?php echo $row['pict_akun'];?>" alt="">
                  </div>
                </div>
                <input type="submit" value="Submit" name="up" class="edit-btn btn-second">
              </form>
        </div>
    </div>
</body>
</html>