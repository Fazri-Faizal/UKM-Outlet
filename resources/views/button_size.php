<?php $size = array("S", "M", "L", "XL"); ?>

<head>
    <link rel="stylesheet" href="/css/button_size.scss.css">
</head>

<?php foreach($size as $index) { ?>

    <a href="#" class="btn btn-white btn-animate text-box size" <?php echo "id = '$index'" ?>><?php echo $index; ?></a>

<?php } ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<?php foreach($size as $index) { ?>

    <script>
        $('<?php echo "#".$index ?>').on('click', function(){
            if(document.getElementById("<?php echo "$index" ?>").classList.contains('selected') == true) {
                $(this).removeClass('selected');
            }
            else if(document.getElementById("<?php echo "$index" ?>").classList.contains('selected') == false) {
                $(this).addClass('selected');
            }
        });
    </script>

<?php } ?>