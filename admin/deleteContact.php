<?php

include 'inc/header.php';
include 'inc/sidebar.php';
include 'lib/contact.php';


$contact = new Admin\Lib\Contact();
if (isset($_GET['cid'])) {
    $contact = $contact->getContactId($_GET['cid']);
}


if (isset($_POST['delete'])) {
    if ($contact->deleteContact()) {
        echo "<script>alert('Succesfully deleted message!')</script>";
        header('Location:contact.php');
    } else {
        echo "<script>alert('Deleting failed!')</script>";
    }
}

?>
<div class="container">
    <div class="registerBox">
        <h1>Delete Contact</h1>
        <form method="post" id="signupForm" enctype="multipart/form-data">
            <!-- <label for="title">Title</label> -->
            <input type="text" title="email" id="email" name="email" placeholder="Email" disabled  value="<?php if (!empty($contact->getEmail())) {
                echo $contact->getEmail();
            } ?>">
            <div id="errorTitle" style="color: red;"></div>

            <!-- <label for="description">Description</label> -->
            <input type="text" title="message" name="message" id="message" disabled placeholder="Message"  value="<?php if (!empty($contact->getMessage())) {
                echo $contact->getMessage();
            } ?>">
            <div id="errorDescription" style="color: red;"></div>

            <input type="submit" value="Delete" name="delete" title="delete" class="btn">
        </form>
    </div>
</div>
</div>
</body>