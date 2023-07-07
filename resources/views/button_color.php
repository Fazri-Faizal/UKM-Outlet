<?php
    $colorId = 1;

    $default = "#FFFFFF";
    
    $orange = "#FF5722";
    $amber = "#FFC107";
    $lime = "#8BC34A";
    $teal = "#009688";
    $blue = "#2196F3";
    $indigo = "#3F51B5";

    $colors = array("FF5722", "FFC107", "8BC34A");
    $count = 0;
?>

<head>
    <link rel="stylesheet" href="/css/button_color.css">
</head>

<?php foreach($colors as $index) { ?>

    <a href="#" class="btn btn-white btn-animate text-box color" <?php echo "id = '$index'" ?>><p <?php echo "id = '$count'" ?>>●</p></a>

<?php $count++; } ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<?php $count = 0; foreach($colors as $index) { ?>

    <script>
        $(document).ready(function() {
            document.getElementById("<?php echo $index ?>").style.background = "<?php echo "#".$index ?>";
        });

        $('<?php echo "#".$index ?>').on('click', function(){
            if(document.getElementById("<?php echo "$index" ?>").classList.contains('selection') == true) {
                $('<?php echo "#".$index ?>').removeClass('selection');
                document.getElementById("<?php echo "$index" ?>").style.background = "<?php echo "#".$index ?>";
            }
            else if (document.getElementById("<?php echo "$index" ?>").classList.contains('selection') == false){
                $('<?php echo "#".$index ?>').addClass('selection');
                document.getElementById("<?php echo "$index" ?>").style.background = "<?php echo $default ?>";
                document.getElementById("<?php echo "$count" ?>").style.color = "<?php echo "#".$index ?>";
            }
        });
    </script>

<?php $count++; } ?>