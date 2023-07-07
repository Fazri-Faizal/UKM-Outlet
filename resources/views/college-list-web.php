<?php 
    include 'header.php'; 

    include 'database.php';

    $mysqli = new mysqli($servername, $username, $password,$dbname);
    
    $stmt = $mysqli->prepare("SELECT * FROM tbl_college");
    $stmt->execute();

    $arr = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

    if(!$arr) exit('No rows');

    $stmt->close();    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/college-list-web.css"/>
    <title>College List</title>
</head>

<body>
    <div class="title">
        <h2 style="color: #804444; face: verdana; text-align: center; padding-top: 20px; font-size: 30px;">College</h2>
        <br>
        <h3 style="color: #846565; face: verdana; text-align: center; padding-bottom: 20px; font-size: 20px;">Choose your college !</h3>
    </div>
   <div class="college">
        <?php foreach($arr as $college) { ?>
            <div>
                <button class="collegebutton" onclick=window.location.href="#">
                    <span><?php echo $college['college_SName'] ?><br><b><?php echo $college['college_Name'] ?></b</span>
                </button>
            </div>
        <?php } ?>
    </div>
</body>

<?php include 'footer.php'?>