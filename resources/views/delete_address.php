
<?php 
    include_once 'session.php';
    include 'database.php';

//Delete
    // if(isset($GET['deleteaddress'])) {
        $mysqli = new mysqli($servername, $username, $password,$dbname);
        $addressId = $_GET['address_id'];
        $stmt = $mysqli->prepare("DELETE FROM tbl_address WHERE address_id='".$addressId."'");
        $stmt->execute();
        $deleteAdd = $stmt->execute();
        // Ensure that this is before any HTML or echo statements.
        if ($deleteAdd) {
            // Redirect to cart.php if the delete was successful.
            header('Location: /user-profile');
            exit; // Always call exit after a redirect header.
        } else {
            // Handle error here if the deletion was not successful.
            exit('Error deleting row');
        }

        $stmt->close();

        

    // }

    ?>