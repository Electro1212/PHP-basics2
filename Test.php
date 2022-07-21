<?php
//database connectrion
   $conn = mysqli_connect("localhost","root","","crud");
   if(isset($_POST['btn'])){
    $x = $_POST['username'];
    $y = $_POST['phone'];
//field must not be empty logic
   if($x == "" || $y == ""){
      header("Location:Crud.php?error=1");
      die();
   }
    $sql = "INSERT INTO `users`( `Username`, `Phone`) VALUES ('$x','$y')";
    mysqli_query($conn,$sql);
    header("Location:Crud.php");

   } 
//delele button database connection
   if(isset($_GET['delete_id'])){
    $delete = $_GET['delete_id'];
    $sql = "DELETE FROM `users` WHERE Id = $delete";
    mysqli_query($conn,$sql);
    header("Location:Crud.php");
   }
//update button connection
   if(isset($_POST['updt'])){
      $x = $_POST['username'];
      $y = $_POST['phone'];
      $z = $_POST['update_id'];
  
     if($x == "" || $y == ""){
        header("Location:Crud.php?error=1");
        die();
     }
      $sql = "UPDATE `users` SET `Username`='$x',`Phone`='$y' WHERE Id = $z";
      mysqli_query($conn,$sql);
      header("Location:Crud.php");
  
     } 
//update fetch field
     if(isset($_GET['edit_id'])){
      $id= $_GET['edit_id'];
      $fetch = "SELECT * FROM `users` WHERE Id = $id";
      $query = mysqli_query($conn,$fetch);
      $row = mysqli_fetch_assoc($query);
      $name =$row['Username'];
      $phone =$row['Phone'];

     }
   

//    if(isset($_GET['error'])){
//     echo 'field must not be emptied';
//    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="Test.php" method="post"> 
   <input type="hidden" name="update_id" value="<?php echo $_GET['edit_id'];?>">
    <input type="Username" name="username" placeholder="Username" value="<?php echo $name ?>">
    <input type="Number" name="phone" placeholder="Phone Number" value="<?php echo $phone ?>">
    <input type="submit" name="updt" value="update">
</form>
<?php
// $fetch_sql ="SELECT * FROM `users`";
// $fetch_query = mysqli_query($conn,$fetch_sql);
// while($row = mysqli_fetch_assoc($fetch_query)){
//     echo $row['Username'].' - '.$row['Phone'];
//     echo '<a href="Test.php?delete_id='.$row['Id'].'"> delete</a>';
//     echo '<a href="Test.php?edit_id='.$row['Id'].'"> edit</a>';
//     echo '<br>';
// }
?>
   
</body>
</html>