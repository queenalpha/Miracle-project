<?php $title = "Miracle - Edit Campaign"; ?>
<?php include('../server/conn.php');
if (isset($_POST['create'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $thumbnail = $_FILES['thumbnail']['name'];
    $target = $_POST['target'];
    $temp = explode(".", $thumbnail);
    $storename = preg_replace('/\s+/', '_', $name) . "_thumbnail" . '.' . end($temp);

    $query = "INSERT INTO `campaign` (`campaign_name`, `campaign_description`, `campaign_start`, `campaign_end`, `campaign_thumbnail`, `campaign_target`,  `campaign_creator`) VALUES ('$name', '$description', '$start', '$end', '$storename', '$target', 'ID_CREATOR')";
    if (mysqli_query($conn, $query)) {
        move_uploaded_file($_FILES["thumbnail"]["tmp_name"], "../assets/image/" . $storename);
        header('Location: ../pages/campaign.php');
    }
}

if (isset($_GET['edit-campaign'])) {
    #TODO: Tambahin user restrict biar gabisa edit selain creatornya/admin
    $id = $_GET['edit-campaign'];
    $query = "SELECT * FROM `campaign` WHERE `campaign_id` = $id";
    $result = $conn->query($query);
    if ($result->num_rows < 1) {
        header('Location: ../pages/campaign.php');
    }
    $row = $result->fetch_assoc();
}

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $description = $_POST['description'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $thumbnail = $_FILES['thumbnail']['name'];
    $target = $_POST['target'];
    $temp = explode(".", $thumbnail);
    $storename = preg_replace('/\s+/', '_', $name) . "_thumbnail" . '.' . end($temp);

    $query = "UPDATE `campaign` SET `campaign_description` = '$description', `campaign_start` = '$start', `campaign_end` = '$end', `campaign_thumbnail` = '$storename', `campaign_target` = '$target', `campaign_creator` = 'ID_CREATOR' WHERE `campaign`.`campaign_id` = $id";
    if (mysqli_query($conn, $query)) {
        move_uploaded_file($_FILES["thumbnail"]["tmp_name"], "../assets/image/" . $storename);
        header('Location: ../pages/campaign.php?edit-campaign=' . $id);
    }
}

if (isset($_GET['delete-campaign'])) {
    $id = $_GET['delete-campaign'];

    $getThumbnail = "SELECT campaign_thumbnail FROM campaign WHERE `campaign`.`campaign_id` = $id";
    $result = mysqli_query($conn, $getThumbnail);
    $row = mysqli_fetch_assoc($result);

    $query = "DELETE FROM campaign WHERE `campaign`.`campaign_id` = $id";
    if (mysqli_query($conn, $query)) {
        unlink("../assets/image/" . $row['campaign_thumbnail']);
        header('Location: ../pages/campaign.php');
    }
}
?>
<?php include('../components/header.php'); ?>
<main class="container my-5">
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php if (isset($_GET['edit-campaign'])) {
            echo $row['campaign_id'];
        } ?>">
        <label for="f1">Nama Event</label>
        <input class="form-control mb-5" type="text" name="name" placeholder="Enter name..." maxlength="255" id="f1"
            required value="<?php if (isset($_GET['edit-campaign'])) {
                echo $row['campaign_name'];
            } ?>" <?php if (isset($_GET['edit-campaign'])) {
                 echo "disabled";
             } ?>>
        <label for="f2">Deskripsi Event</label>
        <input class="form-control mb-5" type="text" name="description" placeholder="Enter description..."
            maxlength="255" id="f2" required value="<?php if (isset($_GET['edit-campaign'])) {
                echo $row['campaign_description'];
            } ?>">
        <label for="f3">Tanggal Mulai</label>
        <input class="form-control mb-5" type="date" name="start" id="f3" required value="<?php if (isset($_GET['edit-campaign'])) {
            echo $row['campaign_start'];
        } ?>">
        <label for="f4">Tanggal Berakhir</label>
        <input class="form-control mb-5" type="date" name="end" id="f4" required value="<?php if (isset($_GET['edit-campaign'])) {
            echo $row['campaign_end'];
        } ?>">
        <label for="f5">Target</label>
        <input class="form-control mb-5" type="number" name="target" id="f5" maxlength="11" required value="<?php if (isset($_GET['edit-campaign'])) {
            echo $row['campaign_target'];
        } ?>">
        <label for="f6">Thumbnail</label>
        <img class="img-fluid mb-5" src="<?php if (isset($_GET['edit-campaign'])) {
            echo "../assets/image/" . $row['campaign_thumbnail'];
        } ?>" alt="Campaign Thumbnail Preview" id="preview">
        <input class="form-control mb-5" type="file" name="thumbnail" id="f6" accept="image/*" required>
        <div class="row">
            <?php if (isset($_GET['edit-campaign'])) { ?>
                <div class="col">
                    <a class="form-control btn btn-danger" href="?delete-campaign=<?= $row['campaign_id'] ?>">Delete</a>
                </div>
            <?php } ?>
            <div class="col">
                <input class="form-control btn btn-secondary" type="reset" name="reset" value="Reset">
            </div>
            <div class="col">
                <?php if (isset($_GET['edit-campaign'])) {
                    ?>
                    <input class="form-control btn btn-primary" type="submit" name="edit" value="Save">
                    <?php
                } else {
                    ?>
                    <input class="form-control btn btn-primary" type="submit" name="create" value="Create">
                    <?php
                } ?>
            </div>
        </div>
    </form>
</main>
<?php include('../components/js.php'); ?>
<script type="text/javascript">
    f6.onchange = evt => {
        const [file] = f6.files
        if (file) {
            preview.src = URL.createObjectURL(file)
        }
    }
</script>
<?php include('../components/footer.php'); ?>