<?php 
session_start();

$firstname ="";
$lastname ="";
$email    = "";
$username = "";
$_SESSION['success']="";


global $connection;

$connection = mysqli_connect('localhost','root','','clustacdb');

  
if (isset($_POST['submit_reg'])) { 


    $firstname = mysqli_real_escape_string($connection, $_POST['firstname']);    
    $lastname = mysqli_real_escape_string($connection,  $_POST['lastname']);
    $email    = mysqli_real_escape_string($connection, $_POST['email']);
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $upassword = mysqli_real_escape_string($connection, $_POST['upassword']);

    $upassword = password_hash( $upassword, PASSWORD_BCRYPT, array('cost' => 12));
        
        
    $query = "INSERT INTO users (firstname, lastname, email,username, upassword) VALUES ('{$firstname}','{$lastname}','{$email}','{$username}','{$upassword}')";
   
    $register_user_query = mysqli_query($connection, $query);

    $_SESSION["firstname"]= $firstname;
    $_SESSION["lastname"]= $lastname;
    $_SESSION["email"]= $email;
    $_SESSION["username"]= $username;
    

    header("Location: profile.php");
} 


if(isset($_POST['submit_log'])) {


    $username = mysqli_real_escape_string($connection, $_GET['username']);
   $upassword = mysqli_real_escape_string($connection, $_POST['upassword']);

$upassword = password_hash( $upassword, PASSWORD_BCRYPT, array('cost' => 12));

   
    
    $query = "SELECT * FROM users WHERE username = '{$username}' AND upassword = '{$upassword}'";
    
    $select_user_profile_query = mysqli_query($connection, $query);

    
if($select_user_profile_query) {

    while($row = mysqli_fetch_array($select_user_profile_query)) {
    
    
    //   $userid = $row['userid'];
      $_SESSION["firstname"] = $row['firstname'];
      $_SESSION["lastname"] = $row['lastname'];
      $_SESSION["email"] = $row['email'];
      $_SESSION["username"] = $row['username'];
    //   $upassword = $row['upassword'];

    }

    // $_SESSION["firstname"]= $firstname;
    // $_SESSION["lastname"]= $lastname;
    // $_SESSION["email"]= $email;
    // $_SESSION["username"]= $username;

    header("Location: profile.php");

}

else{
    mysqli_error($connection);
    header("Location: index.php");
}

}


