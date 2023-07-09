<?php 
 include 'database.php';


 $mysqli = new mysqli($servername, $username, $password,$dbname);
 
 $stmt = $mysqli->prepare("SELECT DISTINCT fld_product_size FROM tbl_product_variation where fld_product_id='1'");
 $stmt->execute();

 $size = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

 if(!$size) exit('No rows');

 $stmt->close();    
?>

<head>
    <link rel="stylesheet" href="/css/button_size.scss.css">
</head>

<?php foreach($size as $index) { ?>
    <?php $lol1=$index['fld_product_size'];
        ?>
        <a href="#" class="button-size button-size-white button-size-animate text-box size" <?php echo "id = '$lol1'" ?>><?php echo $lol1; ?></a>
        <?php
    ?>
<?php } ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<?php foreach($size as $index) { ?>
    <?php $lol=$index['fld_product_size'];?>
    <script>
        $('<?php echo "#".$lol?>').on('click', function(){
            if(document.getElementById("<?php echo "$lol" ?>").classList.contains('selected') == true) {
                $(this).removeClass('selected');
            }
            else if(document.getElementById("<?php echo "$lol" ?>").classList.contains('selected') == false) {
                $(this).addClass('selected');
            }
        });
    </script>

<?php } ?>