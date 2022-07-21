<?php
$conn = mysqli_connect("localhost","root","","practice");
//submitting in the database
if(isset($_POST['sbmt'])){
    $uname = $_POST['username'];
    $phn = $_POST['phone'];

if($uname=="" || $phn==""){
    header("Location:practice.php?error=1");
    die();
}
    $sql ="INSERT INTO `users`(`Username`, `Phone`) VALUES ('$uname','$phn')";
    mysqli_query($conn,$sql);
    header("Location:practice.php");
}
//Delete button connect
if(isset($_GET['delete_id'])){
    $delete = $_GET['delete_id'];
    $sql = "DELETE FROM `users` WHERE Id = $delete";
    mysqli_query($conn,$sql);
}
//empty syntax input error logic
if(isset($_GET['error'])){
    echo'field must not be empty';
}

if(isset($_POST['updt'])){
    $uname = $_POST['username'];
    $phn = $_POST['phone'];
    $id = $_POST['update_id'];

if($uname=="" || $phn==""){
    header("Location:practice.php?error=1");
    die();
}
    $sql ="UPDATE `users` SET `Username`='$uname',`Phone`='$phn' WHERE Id = $id ";
    mysqli_query($conn,$sql);
    header("Location:practice.php");
}
if(isset($_GET['edit_id'])){
    $id = $_GET['edit_id'];
    $fetch ="SELECT * FROM `users` WHERE Id = $id" ;
    $query = mysqli_query($conn,$fetch);
    $row = mysqli_fetch_assoc($query);
    $Uname= $row['Username'];
    $Phone= $row['Phone'];    
}

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
    <form action="" method="post">
<?php
if(isset($_GET['edit_id'])){?>
    <input type="hidden" name="update_id" value="<?php echo $_GET['edit_id'];?>">
<?php } ?>
        
<?php
if(isset($_GET['edit_id'])){?>
    <input type="text" name="username" placeholder="enter your name" value="<?php echo $Uname?>">
    <input type="text" name="phone" placeholder="enter your number"  value="<?php echo $Phone?>">
    <input type="submit" value="update" name="updt">
<?php }else{?>
        <input type="text" name="username" placeholder="enter your name" >
        <input type="text" name="phone" placeholder="enter your number"  >
        <input type="submit" value="submit" name="sbmt">
<?php } ?>
    </form>
<?php
//fetching from the database
   $fetch_sql = "SELECT * FROM `users`";
   $fetch_query = mysqli_query($conn,$fetch_sql);
   while($row=mysqli_fetch_assoc($fetch_query)){
    echo $row['Username'].'-'.$row['Phone'];
    echo '<a href="practice.php?delete_id='.$row['Id'].'">detete</a>';
    echo '<a href="practice.php?edit_id='.$row['Id'].'"> edit</a>';
    echo '<br>';
   }
?>
</body>
</html>
<!-- INSERT INTO `users`(`Id`, `Username`, `Phone`) VALUES ('[value-1]','[value-2]','[value-3]') -->
<!-- SELECT * FROM `users` WHERE 1 -->
<!-- DELETE FROM `users` WHERE 0 -->
<!-- UPDATE `users` SET `Id`='[value-1]',`Username`='[value-2]',`Phone`='[value-3]' WHERE 1 -->