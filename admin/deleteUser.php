<?php

include 'inc/header.php';
include 'inc/sidebar.php';
include 'lib/User.php';

if ($_SESSION['role'] == 'journalist') {
    header("Location:user.php");
}

$user = new Admin\Lib\User();
if (isset($_GET['uid'])) {
    $user = $user->getUserId($_GET['uid']);
}


if (isset($_POST['delete'])) {
    if ($user->deleteUser()) {
        echo "<script>alert('Succesfully created account!')</script>";
        header('Location:user.php');
    } else {
        echo "<script>alert('Creation failed!')</script>";
    }
}

?>
<div class="container">
    <div class="registerBox">
        <h1>Edit User</h1>
        <form method="post" id="signupForm">
            <!-- <label for="name">Name</label> -->
            <input type="text" name="name" id="name" placeholder="Name" disabled value="<?php if (!empty($user->getName())) {
                echo $user->getName();
            } ?>">
            <div id="errorName" style="color: red;"></div>

            <!-- <label for="email">Email</label> -->
            <input type="email" name="email" id="email" placeholder="Email" disabled value="<?php if (!empty($user->getEmail())) {
                echo $user->getEmail();
            } ?>">
            <div id="errorEmail" style="color: red;"></div>


            <!-- <label for="password">Password</label> -->
            <input type="password" name="password" id="password" placeholder="Password" disabled value="<?php if (!empty($user->getPassword())) {
                echo $user->getPassword();
            } ?>">
            <div id="errorPassword" style="color: red;"></div>

            <select name="role" disabled>
                <?php
                $rolesArray = ['admin', 'journalist', 'user'];
                foreach ($rolesArray as $role) {
                    if ($role == $user->getRole()) {
                        echo "<option value='$role' selected>" . ucfirst($role) . "</option>";
                    } else {
                        echo "<option value='$role'>" . ucfirst($role) . "</option>";

                    }
                }
                ?>
            </select>
            <input type="submit" value="Delete" name="delete" class="btn">
        </form>
    </div>
</div>
</div>
</body>