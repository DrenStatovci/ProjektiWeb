<?php include_once 'inc/header.php'; ?>

<div class="container">
    <div class="contactBox">
        <h1>Contact Us</h1>
        <form action="">

            <!-- <label for="email">Email</label> -->
            <input type="email" name="email" id="email" placeholder="Email" value="<?php if (!empty($_SESSION['email'])) {
                echo $_SESSION['email'];
            } ?>" required>
            <div id="errorEmail" class="error"></div>
            <!-- <label for="password">Password</label> -->
            <input type="text" name="description" id="description" placeholder="Contact Us!" required>
            <div id="errorDescription" class="error"></div>

            <input type="submit" name="submit" onclick="contactValidation()">
        </form>
    </div>
</div>

<?php include_once 'inc/footer.php' ?>