<?php 

include('./php/functions.php');
include('./php/logindb.php'); 

session_start();

$resfil = checkfiltertype();
$search = $_POST[$resfil];

$tagvalue = checktagtype();

if($search){
 

?>                    

<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="stylesheet" type="text/css" href="./css/stylefilter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		 <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700%7CPT+Serif:400,700,400italic' rel='stylesheet'>
		  <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
</head>
<body>

	<div class="bgimage">
		<div class="menu">
			
			<div class="leftmenu">
				<img src="./images/giflogo.gif" style="width: 101px;">
				<h4> CLUSTAC </h4>
			</div>

			<div class="rightmenu">
				<ul>
        <li >Home</li>
        <a href="./categories.php"><li>Categories </li></a>
        <a href="./allcourses.php"><li id="fisrtlist">ALL COURSES</li></a>
        <a href="./aboutus.html"><li> Aboust us</li></a>
        <a href="./contact.php"><li>contact</li></a>
        <a href="./profile.php"><li class="profile-drop">My profile<span><i class="fa fa-user-circle-o" style="font-size:24px;padding: 7px;"></i></span></li></a>
				</ul>
			</div>

        </div>

        <div id="filter-it">
  <br>
  <div id="filter-by-label">Filter Applied:  <div class="filter-data-display"><?php echo $search; ?></div></div>

  <br>

  <div class="display-text" >
    <p style="font-size: 16px;font-weight: 700; color: black;"> Note - The results are shown in increasing order of the cost. </p>
  </div>

  <br>

  <br>

</div>
 
 <?php

                    global $connection;

                    $connection = mysqli_connect('localhost','root','','clustacdb');

                    $query = "SELECT * FROM coursedata WHERE $tagvalue LIKE '%$search%' ORDER BY c_cost ASC";
                    $select = mysqli_query($connection,$query);


                    while($row = mysqli_fetch_array($select)) {

?>



<form method="post" action="cart.php?action=add&id=<?php echo $row["c_id"]; ?>">


    <div class="card">

        <div class="card-container">
                <nav>
                  <svg class="arrow" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><polygon points="352,115.4 331.3,96 160,256 331.3,416 352,396.7 201.5,256 " stroke="#727272"/></svg>
                  Back 
                  <svg class="heart" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve" stroke="#727272" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M340.8,98.4c50.7,0,91.9,41.3,91.9,92.3c0,26.2-10.9,49.8-28.3,66.6L256,407.1L105,254.6c-15.8-16.6-25.6-39.1-25.6-63.9  c0-51,41.1-92.3,91.9-92.3c38.2,0,70.9,23.4,84.8,56.8C269.8,121.9,302.6,98.4,340.8,98.4 M340.8,83C307,83,276,98.8,256,124.8  c-20-26-51-41.8-84.8-41.8C112.1,83,64,131.3,64,190.7c0,27.9,10.6,54.4,29.9,74.6L245.1,418l10.9,11l10.9-11l148.3-149.8  c21-20.3,32.8-47.9,32.8-77.5C448,131.3,399.9,83,340.8,83L340.8,83z" stroke="#727272"/></svg>
                </nav>
                        <div class="photo">
                          <img src="./images/<?php echo $row['c_image']; ?>" style="width: 300px;">
                        </div>

                        
                            <div class="description">
                                <h2><?php echo $row['c_name']; ?></h2>
                                <p><?php echo $row['c_description']; ?></p>
                                <span>(<?php echo $row['c_review']; ?> reviews)</span> 
                                <h3 style="padding: 3px;">₹ <?php echo $row['c_cost']; ?></h3>
                                <h4>Course Duration - <?php echo $row['c_duration']; ?> hours</h4>
                                <h4>Level - <?php echo $row['c_level']; ?></h4>
                                <h4>Rating - <?php echo $row['c_rating']; ?>/5</h4>
                                <input class="sub-cart-button" type="submit" style="margin-top: 17px;" name="add_to_cart" value="Add to Cart"/>
                                <input class="sub-cart-button" type="submit" value="Wishlist"/>
                                

                                <input type="hidden" name="hidden_name" value="<?php echo $row["c_name"]; ?>" />
                                <input type="hidden" name="hidden_description" value="<?php echo $row["c_description"]; ?>" />
                                <input type="hidden" name="hidden_review" value="<?php echo $row["c_review"]; ?>" />
                                <input type="hidden" name="hidden_cost" value="<?php echo $row["c_cost"]; ?>" />
                                <input type="hidden" name="hidden_duration" value="<?php echo $row["c_duration"]; ?>" />
                                <input type="hidden" name="hidden_level" value="<?php echo $row["c_level"]; ?>" />
                                <input type="hidden" name="hidden_rating" value="<?php echo $row["c_rating"]; ?>" />
                                <input type="hidden" name="hidden_image" value="<?php echo $row["c_image"]; ?>" />
                          

                              

                            </div>


                           

        </div>
  </div>


                    </form>
      
        <?php echo "<br>"; echo "<br>"; echo "\n"; echo "\t";  ?>

        <?php } ?>       





</div>
 

</div>

<?php }  ?>

</div>


  </div>

  </div>

  </div>
  </div>
  </div>