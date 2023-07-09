<?php 
include 'database.php';
include 'header.php';

$mysqli = new mysqli($servername, $username, $password, $dbname);

$stmt = $mysqli->prepare("SELECT * FROM tbl_faculty");
$stmt->execute();

$arr = $stmt->get_result() ->fetch_all(MYSQLI_ASSOC);

if(!$arr) exit("No rows");


$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/faculty-list-web.css"/>
    <title>Faculty List</title>
</head>

<body>
    <!-- Html for desktop view -->
    <div class="title">
        <h2 style="color: #804444; face: verdana; text-align: center; padding-top: 20px; font-size: 30px;">Faculty</h2>
        <br>
        <h3 style="color: #846565; face: verdana; text-align: center; padding-bottom: 20px; font-size: 20px;">Choose your faculty !</h3>
    </div> 
    <div class="faculty">
            <?php foreach($arr as $facultyrow) { ?>
                <div>
                    <?php $facultyId = $facultyrow['faculty_Id']; ?>

                    <form action="/product-list-faculty-web" method="get">
                        <button class="facultybutton" onclick="window.location.href='product-list-faculty-web'" name="facultybtn" <?php echo "value = '$facultyId'" ?> type="submit">
                            <span><?php echo $facultyrow['faculty_SName'];?><br><b><?php echo $facultyrow['faculty_Name'];?></b</span>
                        </button>
                    </form>
                </div>      
			<?php } ?>
        </div>
    </div>
    <div style="position: sticky;position: -webkit-sticky;">
        <?php include 'footer.php'?>
    </div>
</body>
