<?php
use Admin\Lib\User;

include 'inc/header.php';
include 'inc/sidebar.php';
include 'lib/User.php';
?>


<div class="dashboardContainer">
    <h1>News</h1>
    <div class="tableContainer">
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
            $users = new User();
            $users = $users->getAllUsers();
            foreach ($users as $user) {
                echo "  
                    <tr>
                        <td>" . $user->getId() . "</td>
                        <td>" . $user->getName() . "</td>
                        <td>" . $user->getEmail() . "</td>
                        <td>" . $user->getRole() . "</td>
                        <td><a href='editUser.php?uid=" . $user->getId() . "'>Edit</a></td>
                        <td><a href='deleteUser.php?uid=" . $user->getId() . "'>Delete</a></td>      
                    </tr>
                    ";
            }
            ?>

        </table>
        <?php if ($_SESSION['role'] == 'admin') { ?>
            <a href="createUser.php" class="createUser">Create User</a>
        <?php } ?>
    </div>
</div>
</div>
</body>