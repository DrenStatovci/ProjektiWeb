<?php

include 'inc/header.php';
include 'inc/sidebar.php';
include 'lib/User.php';

if ($_SESSION['role'] == 'user') {
    header("Location:../index.php");
}

if (isset($_POST['create'])) {
    $user = new Admin\Lib\User();
    $user->setName($_POST['name']);
    $user->setEmail($_POST['email']);
    $user->setPassword($_POST['password']);
    $user->setRole($_POST['role']);
    if ($user->createUser()) {
        echo "<script>alert('Succesfully created account!')</script>";
        header('Location:user.php');
    } else {
        echo "<script>alert('Creation failed!')</script>";

    }
}

?>
<div class="container">
    <div class="registerBox">
        <h1>Create User</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="signupForm">
            <!-- <label for="name">Name</label> -->
            <input type="text" name="name" id="name" placeholder="Name" required>
            <div id="errorName" style="color: red;"></div>

            <!-- <label for="email">Email</label> -->
            <input type="email" name="email" id="email" placeholder="Email" required>
            <div id="errorEmail" style="color: red;"></div>


            <!-- <label for="password">Password</label> -->
            <input type="password" name="password" id="password" placeholder="Password" required>
            <div id="errorPassword" style="color: red;"></div>

            <select name="role">
                <option value="">Select role</option>
                <option value="admin">Admin</option>
                <option value="journalist">Journalist</option>
                <option value="user">User</option>
            </select>


            <input type="submit" value="Create" name="create" class="btn" onclick="signupValidation()">
        </form>
    </div>
</div>
</div>
</body>