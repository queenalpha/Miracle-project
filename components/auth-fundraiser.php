<?php
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    echo "kamu login";
    if (isset($_SESSION['status']) && $_SESSION['status'] != 'fundraiser') {
        echo "tapi kamu bukan fundraiser";
    }
}
?>