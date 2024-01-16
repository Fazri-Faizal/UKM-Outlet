<?php
include_once 'session.php';
include 'database.php';

// Create a single mysqli object for the database connection.
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$stmt1 = $mysqli->prepare("SELECT * FROM tbl_products WHERE product_id = $id");
$stmt1->execute();
$result1 = $stmt1->get_result();

foreach($result1 as $description) {
	$prod_desc = $description['product_Description'];
  }

$stmt1->close();

// Prepare the statement to select product reviews.
$stmt3 = $mysqli->prepare("SELECT * FROM tbl_product_review LEFT JOIN tbl_customer ON tbl_product_review.cust_Id = tbl_customer.Id WHERE product_id = $id");
$stmt3->execute();
$result3 = $stmt3->get_result();

if (!$arrview = $result3->fetch_all(MYSQLI_ASSOC)) {
    
}

$stmt3->close();


// Close the database connection.
$mysqli->close();
?>
<!-- bootstrap? -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

<link href="/css/product-description.css" rel="stylesheet">

<!-- font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap" rel="stylesheet">

    <div class="pd-wrap">
		<div class="container">
	        <div class="product-info-tabs">
		        <ul class="nav nav-tabs" id="myTab" role="tablist">
				  	<li class="nav-item">
				    	<a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
				  	</li>
				  	<li class="nav-item">
				    	<a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews</a>
				  	</li>
				</ul>
				<div class="tab-content" id="myTabContent">
				  	<div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
				  		<?php echo $prod_desc?>
				  	</div>
					<!-- form review -->
				  	<div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
					  <div class="reviews-container" id="display-reviews" style=" margin-top: 20px;" >
                    <?php
                        foreach($arrview as $reviewlist) {
								$rating = $reviewlist['rating'];
							
                    ?>

                    <!-- Review Item -->
                    <div class="review-item">
                        <div class="review-header">
                            <strong><span class="reviewer-name"><?php echo $reviewlist['Fullname'] ?></span></strong>
                            
                        </div>
                        <div class="review-rating">
						<?php
							$rate = $rating;

							for($i=1; $i<=$rate; $i++) {
							if($i>0.5)
								echo '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#FEC20C" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg>';

							if(($rate-$i) == 0.5)
								echo '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#FEC20C" class="bi bi-star-half" viewBox="0 0 16 16"><path d="M5.354 5.119 7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.548.548 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.52.52 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.58.58 0 0 1 .085-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.565.565 0 0 1 .162-.505l2.907-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.001 2.223 8 2.226v9.8z"/></svg>';
							}
                  			?>

						</div>
                        <div class="review-title">Subject: <?php echo $reviewlist['subject'] ?></div>
                        <div class="review-text">Review: <?php echo $reviewlist['review'] ?></div>
						<hr>
						
                    </div>
                    <?php
                        }
                    ?>
                </div> 
						
				  		<div class="review-heading">Add a review</div>
				  		<form class="review-form"  action="/crud_product_review">
		        			<div class="form-group">
			        			<label>Your rating</label>
			        			<div class="reviews-counter">
									<div class="rate">
									    <input type="radio" id="star5" name="rate" value="5" />
									    <label for="star5" title="text">5 stars</label>
									    <input type="radio" id="star4" name="rate" value="4" />
									    <label for="star4" title="text">4 stars</label>
									    <input type="radio" id="star3" name="rate" value="3" />
									    <label for="star3" title="text">3 stars</label>
									    <input type="radio" id="star2" name="rate" value="2" />
									    <label for="star2" title="text">2 stars</label>
									    <input type="radio" id="star1" name="rate" value="1" />
									    <label for="star1" title="text">1 star</label>
									</div>
								</div>
							</div>
							<div class="col-md-6" style="padding-left:0">
				        		<div class="form-group">
									<label>Subject</label>
					        		<input type="text" name="subjectReview" class="form-control">
					        	</div>
					        </div>
		        			<div class="form-group">
			        			<label>Your review</label>
			        			<textarea class="form-control" rows="10" name="review"></textarea>
			        		</div>
			        		
							<input type="hidden" name="userid" value="<?php echo $custId ?>"> 
							<input type="hidden" name="prodid" value="<?php echo $id ?>"> 
					        <button class="round-black-btn" name="insertReview">Submit Review</button>
			        	</form>
						 <!-- review list  -->
						<div class="reviewlist">
						
							<!-- box1  -->
							<div class="testimonial-box"></div>
						</div>
				  	</div>
				</div>
			</div>
        </div>
	</div>