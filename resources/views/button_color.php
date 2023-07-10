<?php
    include_once 'database.php';
    $colorId = 1;

    $default = "#FFFFFF";
    
    $count = 0;
    $mysqli = new mysqli($servername, $username, $password,$dbname);
 
    $stmt = $mysqli->prepare("SELECT DISTINCT fld_product_color FROM tbl_product_variation where fld_product_id=$id");
    $stmt->execute();
   
    $colors = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
   
    if(!$colors) exit('No rows');
   
    $stmt->close();
?>

<head>
    <link rel="stylesheet" href="/css/button_color.css">
</head>

<?php foreach($colors as $index) {
    
    $lol1=$index['fld_product_color'];?>

    <a href="#" class="button-color button-color-white button-color-animate text-box color" <?php echo "id = '$lol1'" ?>><p <?php echo "id = '$count'" ?>>●</p></a>

<?php $count++; } ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<?php $count = 0; foreach($colors as $index) {
     $lol1=$index['fld_product_color']; ?>

    <script>
        $(document).ready(function() {
            document.getElementById("<?php echo $lol1?>").style.background = "<?php echo "#".$lol1 ?>";
        });

        $('<?php echo "#".$lol1 ?>').on('click', function(){
            if(document.getElementById("<?php echo "$lol1" ?>").classList.contains('selection') == true) {
                $('<?php echo "#".$lol1 ?>').removeClass('selection');
                document.getElementById("<?php echo "$lol1" ?>").style.background = "<?php echo "#".$lol1 ?>";
            }
            else if (document.getElementById("<?php echo "$lol1" ?>").classList.contains('selection') == false){
                $('<?php echo "#".$lol1 ?>').addClass('selection');
                document.getElementById("<?php echo "$lol1" ?>").style.background = "<?php echo $default ?>";
                document.getElementById("<?php echo "$count" ?>").style.color = "<?php echo "#".$lol1 ?>";
            }
        });
    </script>

<?php $count++; } ?>