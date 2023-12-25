<?php

include 'connect.php';

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];

    $sql="INSERT INTO `crud` (name,email,mobile,password)
    values('$name','$email','$mobile','$password')";

    $result=mysqli_query($con,$sql);
    if($result){
        // echo "inserted successfully";
        header('location:display.php');
    }else{
        die(mysqli_error($con));
    }
}

?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">

    <title>CRUD OPERATIONS!</title>
</head>

<body>
    <h1 class="container my-5">Registration Form</h1>
    <div class="container my-5">
        <form method="post">

                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name" autocomplete="off">

                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter your email" autocomplete="off">

                <label>Mobile</label>
                <input type="text" class="form-control" name="mobile" placeholder="Enter your number" autocomplete="off">

                <label>Password</label>
                <input type="text" class="form-control" name="password" placeholder="Enter your password" autocomplete="off">

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>


</body>

</html>


<?php

include 'connect.php';
$id=$_GET['updateid'];

$sql = "Select * from `crud` where id=$id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$email = $row['email'];
$mobile = $row['mobile'];
$password = $row['password'];

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $sql = "update `crud` set id=$id, name='$name',
    email='$email', mobile='$mobile', password='$password' where id=$id";

    $result = mysqli_query($con, $sql);
    if ($result) {
        // echo "Updated successfully";
        header('location:display.php');
    } else {
        die(mysqli_error($con));
    }
}

?>