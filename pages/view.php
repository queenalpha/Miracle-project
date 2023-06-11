<!-- Model -->
<?php
$title = "Miracle - Admin Dashboard";
$prevent = 'user';
include('../server/connection.php');
?>
<!-- Controller -->
<?php
if (isset($_GET['account']) && !empty($_GET['account'])) {
    $target = $_GET['account'];
    $query = "SELECT * FROM accounts WHERE account_id = $target";
    $result = mysqli_query($conn, $query);
}
if (isset($_GET['account']) && isset($_GET['delete'])) {
    $target = $_GET['account'];
    $query = "UPDATE `accounts` SET `account_level` = 'deactive' WHERE `accounts`.`account_id` = $target";
    if (mysqli_query($conn, $query)) {
        header('Location: ../pages/manage.php?manage=accounts');
        exit();
    }
}
if (isset($_GET['campaign']) && !empty($_GET['campaign'])) {
    $target = $_GET['campaign'];
    $query = "SELECT * FROM campaigns WHERE campaign_id = $target";
    $result = mysqli_query($conn, $query);
}
if (isset($_GET['campaign']) && isset($_GET['approve'])) {
    $target = $_GET['campaign'];
    $query = "UPDATE `campaigns` SET `campaign_approval` = '1' WHERE `campaigns`.`campaign_id` = $target";
    if (mysqli_query($conn, $query)) {
        header('Location: ../pages/view.php?campaign=' . $target);
        exit();
    }
}
if (isset($_GET['campaign']) && isset($_GET['delete'])) {
    $target = $_GET['campaign'];
    $query = "UPDATE `campaigns` SET `campaign_approval` = '2' WHERE `campaigns`.`campaign_id` = $target";
    if (mysqli_query($conn, $query)) {
        header('Location: ../pages/manage.php?manage=campaigns');
        exit();
    }
}
if (isset($_GET['donation']) && !empty($_GET['donation'])) {
    $target = $_GET['donation'];
    $query = "SELECT donations.donation_id, donations.donation_date, accounts.account_name, accounts.account_avatar, campaigns.campaign_name, campaigns.campaign_thumbnail, donations.donation_amount
    FROM donations
    JOIN accounts ON accounts.account_id = donations.donation_account
    JOIN campaigns ON campaigns.campaign_id = donations.donation_campaign
    WHERE donations.donation_id = '$target'
    ORDER BY donations.donation_date DESC";
    $result = mysqli_query($conn, $query);
}
if (isset($_POST['edit-account'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $avatar = $_FILES['avatar']['name'];
    $level = $_POST['level'];
    $temp = explode(".", $avatar);
    $storename = preg_replace('/\s+/', '_', $id . '_' . $name) . '.' . end($temp);
    $query = "UPDATE `accounts` SET `account_name` = '$name', `account_email` = '$email', `account_password` = '$password', `account_phone` = '$phone', `account_avatar` = '$storename', `account_level` = '$level' WHERE `accounts`.`account_id` = $id";
    if (mysqli_query($conn, $query)) {
        move_uploaded_file($_FILES["avatar"]["tmp_name"], "../assets/image/profile/" . $storename);
        header('Location: ../pages/view.php?account=' . $id);
    }
}
if (isset($_POST['edit-campaign'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $target = $_POST['target'];
    $thumbnail = $_FILES['thumbnail']['name'];
    $temp = explode(".", $thumbnail);
    $storename = preg_replace('/\s+/', '_', $id . '_' . $name) . '.' . end($temp);
    $query = "UPDATE `campaigns` SET `campaign_name` = '$name', `campaign_description` = '$description', `campaign_start` = '$start', `campaign_end` = '$end', `campaign_thumbnail` = '$storename', `campaign_target` = '$target' WHERE `campaigns`.`campaign_id` = $id";
    if (mysqli_query($conn, $query)) {
        move_uploaded_file($_FILES["thumbnail"]["tmp_name"], "../assets/image/campaign/" . $storename);
        header('Location: ../pages/view.php?campaign=' . $id);
    }
}
?>
<!-- View -->
<?php include('../components/header.php'); ?>
<main id="dt-container">
    <?php include('../components/admin/topbar.php'); ?>
    <div class="d-flex">
        <aside class="flex-shrink-1">
            <?php include('../components/admin/sidebar.php'); ?>
        </aside>
        <article id="dt-content" class="w-100">
            <div class="row g-0 p-4">
                <?php
                if (isset($_GET['account']) && !empty($_GET['account'])) {
                    while ($row = mysqli_fetch_assoc($result)): ?>
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-md-3 p-3">
                                    <div class="ratio ratio-1x1">
                                        <img class="img-thumbnail object-fit-cover"
                                            src="<?= "../assets/image/profile/" . $row['account_avatar'] ?>"
                                            alt="Profile Picture Preview" id="preview">
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="card-body">
                                        <form class="row g-4" action="" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?= $row['account_id'] ?>">
                                            <div class="col col-12 col-md-6">
                                                <label for="f-1" class="form-label">Nama</label>
                                                <input name="name" type="text" id="f-1" class="form-control"
                                                    placeholder="Enter data..." <?php if (!isset($_GET['editable'])) {
                                                        echo 'disabled';
                                                    } ?> value="<?= $row['account_name'] ?>" required>
                                            </div>
                                            <div class="col col-12 col-md-6">
                                                <label for="f-2" class="form-label">No Telepon</label>
                                                <input name="phone" type="text" id="f-2" class="form-control"
                                                    placeholder="Enter data..." <?php if (!isset($_GET['editable'])) {
                                                        echo 'disabled';
                                                    } ?> value="<?= $row['account_phone'] ?>" required>
                                            </div>
                                            <div class="col col-12 col-md-6">
                                                <label for="f-3" class="form-label">Email</label>
                                                <input name="email" type="email" id="f-3" class="form-control"
                                                    placeholder="Enter data..." <?php if (!isset($_GET['editable'])) {
                                                        echo 'disabled';
                                                    } ?> value="<?= $row['account_email'] ?>" required>
                                            </div>
                                            <div class="col col-12 col-md-6">
                                                <label for="f-4" class="form-label">Password</label>
                                                <input name="password" type="password" id="f-4" class="form-control"
                                                    placeholder="Enter data..." <?php if (!isset($_GET['editable'])) {
                                                        echo 'disabled';
                                                    } ?> value="<?= $row['account_password'] ?>" required>
                                            </div>
                                            <div class="col col-12" <?php if (!isset($_GET['editable'])) {
                                                echo 'style="display:none;"';
                                            } ?>>
                                                <label for="f-5" class="form-label">Gambar Profil</label>
                                                <input id="uploadPicture" name="avatar" id="f-5" class="form-control"
                                                    type="file" name="thumbnail" accept="image/*" required>
                                            </div>
                                            <div class="col col-12">
                                                <label for="f-6" class="form-label">Role</label>
                                                <select id="f-6" name="level" class="form-select" <?php if (!isset($_GET['editable'])) {
                                                    echo 'disabled';
                                                } ?>>
                                                    <option value="fundraiser" <?php if ($row['account_level'] == 'fundraiser') {
                                                        echo 'selected';
                                                    } ?>>Fundraiser</option>
                                                    <option value="admin" <?php if ($row['account_level'] == 'admin') {
                                                        echo 'selected';
                                                    } ?>>Admin</option>
                                                </select>
                                            </div>
                                            <div class="col col-12 col-md-6">
                                                <?php
                                                if (isset($_GET['editable']) && $_GET['editable'] == true) {
                                                    ?>
                                                    <input name="edit-account" type="submit" class="btn btn-primary w-100"
                                                        value="Simpan Edit">
                                                    <?php
                                                } else {
                                                    ?>
                                                    <a class="btn btn-secondary w-100"
                                                        href="../pages/view.php?account=<?= $row['account_id'] ?>&editable=true">
                                                        Edit
                                                    </a>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="col col-12 col-md-6">
                                                <?php
                                                if (isset($_GET['editable']) && $_GET['editable'] == true) {
                                                    ?>
                                                    <a class="btn btn-secondary w-100"
                                                        href="../pages/view.php?account=<?= $row['account_id'] ?>">
                                                        Tidak Jadi Ubah
                                                    </a>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <a class="delete btn btn-danger w-100" data-type="account"
                                                        data-title="Hapus Akun <?= $row['account_name'] ?>?"
                                                        data-description="Apakah anda yakin untuk mendeaktivasi akun ini?"
                                                        data-id="<?= $row['account_id'] ?>">
                                                        Hapus Akun
                                                    </a>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="col col-12">
                                                <a class="btn btn-secondary w-100" href="../pages/manage.php?manage=accounts">
                                                    Kembali Ke Daftar Akun
                                                </a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                } ?>
                <?php
                if (isset($_GET['campaign']) && !empty($_GET['campaign'])) {
                    while ($row = mysqli_fetch_assoc($result)): ?>
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-md-3 p-3">
                                    <div class="ratio ratio-1x1">
                                        <img class="img-thumbnail object-fit-cover"
                                            src="<?= "../assets/image/campaign/" . $row['campaign_thumbnail'] ?>"
                                            alt="Profile Picture Preview" id="preview">
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="card-body">
                                        <form class="row g-4" action="" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?= $row['campaign_id'] ?>">
                                            <div class="col col-12 col-md-6">
                                                <label for="f-1" class="form-label">Nama</label>
                                                <input name="name" type="text" id="f-1" class="form-control"
                                                    placeholder="Enter data..." <?php if (!isset($_GET['editable'])) {
                                                        echo 'disabled';
                                                    } ?> value="<?= $row['campaign_name'] ?>" required>
                                            </div>
                                            <div class="col col-12 col-md-6">
                                                <label for="f-2" class="form-label">Deskripsi</label>
                                                <input name="description" type="text" id="f-2" class="form-control"
                                                    placeholder="Enter data..." <?php if (!isset($_GET['editable'])) {
                                                        echo 'disabled';
                                                    } ?> value="<?= $row['campaign_description'] ?>" required>
                                            </div>
                                            <div class="col col-12 col-md-6">
                                                <label for="f-3" class="form-label">Tanggal Mulai</label>
                                                <input name="start" type="date" id="f-3" class="form-control"
                                                    placeholder="Enter data..." <?php if (!isset($_GET['editable'])) {
                                                        echo 'disabled';
                                                    } ?> value="<?= $row['campaign_start'] ?>" required>
                                            </div>
                                            <div class="col col-12 col-md-6">
                                                <label for="f-4" class="form-label">Tanggal Berakhir</label>
                                                <input name="end" type="date" id="f-4" class="form-control"
                                                    placeholder="Enter data..." <?php if (!isset($_GET['editable'])) {
                                                        echo 'disabled';
                                                    } ?> value="<?= $row['campaign_end'] ?>" required>
                                            </div>
                                            <div class="col col-12">
                                                <label for="f-5" class="form-label">Target Donasi</label>
                                                <input name="target" type="number" id="f-5" class="form-control"
                                                    placeholder="Enter data..." <?php if (!isset($_GET['editable'])) {
                                                        echo 'disabled';
                                                    } ?> value="<?= $row['campaign_target'] ?>" required>
                                            </div>
                                            <div class="col col-12" <?php if (!isset($_GET['editable'])) {
                                                echo 'style="display:none;"';
                                            } ?>>
                                                <label for="f-5" class="form-label">Thumbnail</label>
                                                <input id="uploadPicture" name="thumbnail" id="f-5" class="form-control"
                                                    type="file" name="thumbnail" accept="image/*" required>
                                            </div>
                                            <?php
                                            if (!isset($_GET['editable']) && empty($row['campaign_id'])) {
                                                ?>
                                                <div class="col col-12 col-md-4">
                                                    <a class="btn btn-primary w-100"
                                                        href="../pages/view.php?campaign=<?= $row['campaign_id'] ?>&approve=true">
                                                        Setujui Campaign
                                                    </a>
                                                </div>
                                                <?php
                                            } ?>
                                            <div class="col col-12 col-md-4">
                                                <?php
                                                if (isset($_GET['editable']) && $_GET['editable'] == true) {
                                                    ?>
                                                    <input name="edit-campaign" type="submit" class="btn btn-primary w-100"
                                                        value="Simpan Edit">
                                                    <?php
                                                } else {
                                                    ?>
                                                    <a class="btn btn-secondary w-100"
                                                        href="../pages/view.php?campaign=<?= $row['campaign_id'] ?>&editable=true">
                                                        Edit
                                                    </a>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="col col-12 col-md-4">
                                                <?php
                                                if (isset($_GET['editable']) && $_GET['editable'] == true) {
                                                    ?>
                                                    <a class="btn btn-secondary w-100"
                                                        href="../pages/view.php?campaign=<?= $row['campaign_id'] ?>">
                                                        Tidak Jadi Ubah
                                                    </a>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <a class="delete btn btn-primary w-100" data-type="campaign"
                                                        data-title="Selesaikan Campaign <?= $row['campaign_name'] ?>?"
                                                        data-description="Apakah anda yakin untuk menyelesaikan campaign ini?"
                                                        data-id="<?= $row['campaign_id'] ?>">
                                                        Selesaikan Campaign
                                                    </a>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="col">
                                                <a class="btn btn-secondary w-100" href="../pages/manage.php?manage=campaigns">
                                                    Kembali Ke Daftar Campaign
                                                </a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                } ?>
                <?php
                if (isset($_GET['donation']) && !empty($_GET['donation'])) {
                    while ($row = mysqli_fetch_assoc($result)): ?>
                        <div id="printarea" class="card">
                            <h5 class="card-header">Donation Receipt</h5>
                            <div class="card-body">
                                <img class="img-thumbnail mb-3 w-25" src="../assets/icon/typograph.png" alt="Miracle">
                                <div class="row">
                                    <p class="my-0">PT. Miracle Indonesia</p>
                                    <small class="mb-5">#TemanBaik</small>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p class="m-0 fs-5">Donatur</p>
                                        <p class="m-0 fs-1">
                                            <?= $row['account_name'] ?>
                                        </p>
                                    </div>
                                    <div class="col">
                                        <p class="m-0 fs-5">Untuk Kampanye</p>
                                        <p class="m-0 fs-1">
                                            <?= $row['campaign_name'] ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col">
                                        <p class="m-0 fs-5">Tanggal</p>
                                        <p class="m-0 fs-1">
                                            <?= date("d F Y", strtotime($row['donation_date'])); ?>
                                        </p>
                                    </div>
                                    <div class="col">
                                        <p class="m-0 fs-5">Sebesar</p>
                                        <p class="m-0 fs-1">
                                            <?= "Rp." .
                                                number_format($row['donation_amount'])
                                                . ",-" ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                Donation ID:
                                <?= $row['donation_id'] ?>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <input class="btn btn-primary mt-3" type='button' id='btn' value='Print' onclick='window.print();'>
                            <a class="btn btn-secondary mt-3" href="../pages/manage.php?manage=donations">Kembali Ke Histori
                                Donasi</a>
                        </div>
                    <?php endwhile;
                } ?>
            </div>
            <?php include('../components/admin/footer.php'); ?>
        </article>
    </div>
</main>
<?php include('../components/js.php'); ?>
<script type="text/javascript">
    uploadPicture.onchange = evt => {
        const [file] = uploadPicture.files
        if (file) {
            preview.src = URL.createObjectURL(file)
        }
    }
    $(".delete").click(function () {
        Swal.fire({
            title: $(this).data("title"),
            text: $(this).data("description"),
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Ya, lakukan!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "../pages/view.php?" + $(this).data("type") + "=" + $(this).data("id") + " & delete=true";
            }
        });
    })
</script>
<?php include('../components/close.php'); ?>