<?php
   $insert=false;
   $conn = mysqli_connect("localhost","root","","crud");
   if(isset($_POST['btn'])){
    $x = $_POST['username'];
    $y = $_POST['phone'];
    $sql = "INSERT INTO `users`( `Username`, `Phone`) VALUES ('$x','$y')";
    mysqli_query($conn,$sql);
    header("Location:crud.php");
}
  if(isset($_GET['delete_id'])){
    $deleteId= $_GET['delete_id'];
    $sql="DELETE FROM `users` WHERE Id = $deleteId";
    mysqli_query($conn,$sql);

  }

?>



<!-- INSERT INTO `users`(`Id`, `Username`, `Phone`) VALUES ('[value-1]','[value-2]','[value-3]') -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post"> 
    <input type="Username" name="username" placeholder="Username">
    <input type="Number" name="phone" placeholder="Phone Number">
    <input type="submit" name="btn">
</form>
<?php
$fetch_sql ="SELECT * FROM `users`";
$fetch_query = mysqli_query($conn,$fetch_sql);
while($row = mysqli_fetch_assoc($fetch_query)){
    echo $row['Username'].' - '.$row['Phone'];
    echo '<a href="Crud.php?delete_id='.$row['Id'].'">Delete</a>';
    echo '<br>';
}
?>
   
</body>
</html>