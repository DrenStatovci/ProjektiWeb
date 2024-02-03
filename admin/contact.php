<?php
use Admin\Lib\Contact;

include 'inc/header.php';
include 'inc/sidebar.php';
include 'lib/Contact.php';

?>


<div class="dashboardContainer">
    <h1>Contacts</h1>
    <div class="tableContainer">
        <table>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Message</th>
            </tr>
            <?php
            $allContacts = new Contact();
            $allContacts = $allContacts->getAllContacts();
            foreach ($allContacts as $contacts) {
                echo "  
                    <tr>
                        <td>" . $contacts->getId() . "</td>
                        <td>" . $contacts->getEmail() . "</td>
                        <td>" . $contacts->getMessage() . "</td>
                        <td><a href='deleteContact.php?cid=" . $contacts->getId() . "'>Delete</a></td>      
                    </tr>
                    ";
            }
            ?>
        </table>
    </div>
</div>
</div>
</body>