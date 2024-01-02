<?php 
  include_once 'session.php';
  include 'database.php';
    
    $mysqli = new mysqli($servername, $username, $password, $dbname);
    try {
      $stmt = $mysqli->prepare("SELECT id FROM tbl_customer WHERE username = '$sessionname'");
      $stmt->execute();
      $handler = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

      if(count($handler) == 0) {
        header("Location: \login-web");
      }
      
      $sellerId = 0;
      
      foreach($handler as $seller) {
        $sellerId = $seller['id'];
      }

      $stmt->close();
    
    } catch(PDOException $e) {
      echo "salahhhhhhhh";
    }
?>

<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="seller_dashboard">
            <i class="bi bi-house"></i> Dashboard
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="seller_analytics">
            <i class="bi bi-bar-chart"></i> Analytics
        </a>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link" href="seller_messages">
            <i class="bi bi-chat"></i> Messages
            <span class="badge bg-soft-primary text-primary rounded-pill d-inline-flex align-items-center ms-auto">6</span>
        </a>
    </li> -->
    <li class="nav-item">
        <a class="nav-link" href="seller_products">
            <i class="bi bi-bookmarks"></i> Products
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="seller_order">
            <i class="bi bi-people"></i>Orders
        </a>
    </li>
</ul>
                <!-- Divider -->
                <hr class="navbar-divider my-5 opacity-20">
                <!-- Navigation -->
                <!-- Push content down -->
                <div class="mt-auto"></div>
                <!-- User (md) -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="seller_profile">
                            <i class="bi bi-person-square"></i> Account
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/home">
                            <i class="bi bi-box-arrow-left"></i> Back To Homepage
                        </a>
                    </li>
                </ul>