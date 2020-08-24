<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./css/styleallco.css">
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
					<li >Home </li>
					<a href="./categories.php"><li> Categories </li></a>
					<li id="fisrtlist"> ALL COURSES</li>
					<a href="./aboutus.html"><li> Aboust us</li></a>
          <a href="./contact.php"><li>contact</li></a>
          <a href="./profile.php"><li class="profile-drop">My Profile<span><i class="fa fa-user-circle-o" style="font-size:24px;padding: 7px;"></i></span></li></a>
				</ul>
			</div>

        </div>

<form action="filtercourses.php" method="post">

<form method="post" action="cart.php?action=add&id=<?php echo $row["c_id"]; ?>">
        <div id="filter-it">
  <br>
  <div id="filter-by-label">Filter by:</div>

  <br>

  <div id="dropdown-it">

    <button id="dropbtn-it">Levels
      <i class="fa fa-caret-down"></i>
    </button>


  <div id="dropdown-content-it">
  <a><input type="submit" value="Beginner" class="input-id-c" name="level1"/></a>
  <a><input type="submit" value="Intermediate" class="input-id-c" name="level2"/></a>
  <a><input type="submit" value="Advanced" class="input-id-c" name="level3"/></a>
  </div>
  </div>

  <br>
    

  <div id="dropdown-it-1">

    <button id="dropbtn-it-1">Ratings
      <i class="fa fa-caret-down"></i>
    </button>


  <div id="dropdown-content-it-1">
  <a><input type="submit" value=4.5 class="input-id-c" name="rating1"/></a>
  <a><input type="submit" value=4 class="input-id-c" name="rating2"/></a>
  <a><input type="submit" value=3.5 class="input-id-c" name="rating3"/></a>
  <a><input type="submit" value=3 class="input-id-c" name="rating4"/></a>
  </div>

  </div>

  <br>

  <div id="dropdown-it-3">

    <button id="dropbtn-it-3">Site
      <i class="fa fa-caret-down"></i>
    </button>


  <div id="dropdown-content-it-3">
  <a><input type="submit" value="Udemy" class="input-id-c" name="site1"/></a>
  <a><input type="submit" value="Coursera" class="input-id-c" name="site2"/></a>
  <a><input type="submit" value="edX" class="input-id-c" name="site3"/></a>
  </div>

  </div>

  <br>

</div>

<?php 

global $connection;

$connection = mysqli_connect('localhost','root','','clustacdb');


$page=$_GET["page"];

if($page=="" || $page== 1 ){

  $page1=0;
}

else { 

$page1=($page*5)-5;
}

$query = "SELECT * FROM coursedata LIMIT $page1,5";
$select = mysqli_query($connection,$query);


while($row=mysqli_fetch_assoc($select)) {

?>



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

<!-- </form> -->
      
        <?php echo "<br>"; echo "<br>"; echo "\n"; echo "\t";  ?>

        <?php } ?>       


 
 
<?php 

$query = "SELECT * FROM coursedata";
$select = mysqli_query($connection,$query);
$count=mysqli_num_rows($select);

$a=$count/5;
$a=ceil($a); 

  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp" ;
  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp" ;
  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp" ;
  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;

          for($b=1;$b<=$a;$b++){ 

            echo "<a class='pagelink'  href='allcourses.php?page=".$b."'>".$b."</a> "; 

          }
          ?>

          <!-- <a href='allcourses.php?page= <?php echo "$b"; ?>'><i class="fa fa-angle-double-right" style="font-size:24px"></i> </a> -->

         <?php  echo "<br>"; echo "<br>"; echo "<br>"; echo "<br>"; echo "<br>"; echo "<br>"; 

?>

</form>