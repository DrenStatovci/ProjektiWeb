<?php
use Admin\Lib\User;

include 'inc/header.php';
include 'inc/sidebar.php';
include 'lib/User.php';

if ($_SESSION['role'] == 'user') {
    header("Location:../index.php");
}
?>

</div>
</div>
</body>