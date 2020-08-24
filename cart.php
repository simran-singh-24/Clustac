<?php

error_reporting(E_ERROR | E_PARSE);

session_start();
$connect = mysqli_connect('localhost', 'root', '', 'clustacdb');

if(isset($_POST["add_to_cart"]))
{

	if(!isset($_SESSION["shopping_cart"]))
	{
   
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");

		if(!in_array($_GET["c_id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'				=>	$_GET['c_id'],
				'item_name'				=>	$_POST["hidden_name"],
				'item_description'		=>	$_POST["hidden_description"],
				'item_review'			=>	$_POST["hidden_review"],
				'item_cost'				=>	$_POST["hidden_cost"],
				'item_duration'			=>	$_POST["hidden_duration"],
				'item_level'			=>	$_POST["hidden_level"],
				'item_rating'			=>	$_POST["hidden_rating"],
				'item_image'			=>	$_POST["hidden_image"],
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo "Item Already Added";
		}
	}
	else
	{
		$item_array = array(
			'item_id'				=>	$_GET['c_id'],
			'item_name'				=>	$_POST["hidden_name"],
			'item_description'		=>	$_POST["hidden_description"],
			'item_review'			=>	$_POST["hidden_review"],
			'item_cost'				=>	$_POST["hidden_cost"],
			'item_duration'			=>	$_POST["hidden_duration"],
			'item_level'			=>	$_POST["hidden_level"],
			'item_rating'			=>	$_POST["hidden_rating"],
			'item_image'			=>	$_POST["hidden_image"],
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}

}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["c_id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo "Item Removed";
			}
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="stylesheet" type="text/css" href="./css/stylecart.css">
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


<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
                            $total = 0;

                            foreach($_SESSION["shopping_cart"] as $keys => $values)
                            {

?>

<div class="card">

<div class="card-container">
        <nav>
          <svg class="arrow" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><polygon points="352,115.4 331.3,96 160,256 331.3,416 352,396.7 201.5,256 " stroke="#727272"/></svg>
          Back 
          <svg class="heart" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve" stroke="#727272" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M340.8,98.4c50.7,0,91.9,41.3,91.9,92.3c0,26.2-10.9,49.8-28.3,66.6L256,407.1L105,254.6c-15.8-16.6-25.6-39.1-25.6-63.9  c0-51,41.1-92.3,91.9-92.3c38.2,0,70.9,23.4,84.8,56.8C269.8,121.9,302.6,98.4,340.8,98.4 M340.8,83C307,83,276,98.8,256,124.8  c-20-26-51-41.8-84.8-41.8C112.1,83,64,131.3,64,190.7c0,27.9,10.6,54.4,29.9,74.6L245.1,418l10.9,11l10.9-11l148.3-149.8  c21-20.3,32.8-47.9,32.8-77.5C448,131.3,399.9,83,340.8,83L340.8,83z" stroke="#727272"/></svg>
        </nav>

						<div class="photo">
                          <img src="./images/<?php echo $values['item_image']; ?>" style="width: 300px;">
                        </div>
            
						<div class="description">
                                <h2><?php echo $values['item_name']; ?></h2>
                                <p><?php echo $values['item_description'];?></p>
                                <span>(<?php echo $values['item_review'];?> reviews)</span> 
                                <h3 style="padding: 3px;">₹ <?php echo $values['item_cost'];?></h3>
                                <h4>Course Duration - <?php echo $values['item_duration']; ?> hours</h4>
                                <h4>Level - <?php echo $values['item_level']; ?></h4>
								<h4>Rating - <?php echo $values['item_rating']; ?>/5</h4>
						<a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a>
                    </div>

                    <?php
                    
                }
                
                ?>



</div>
</div>


<a href="allcourses.php"><input class="sub-cart-button" type="submit" value="Continue Exploring"/></a>

                    <?php
                    
                    }
                    
                    ?>


</div>

			
	


