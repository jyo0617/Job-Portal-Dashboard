<?php
$server='localhost';
$username='root';
$password='';
$database='jobs';
$conn=mysqli_connect($server,$username,$password,$database);
if($conn->connect_error){
die("connection failed".$conn->connect_error);
}
echo"";
if(isset($_POST['submit'])){
$name=$_POST['name'];
$email=$_POST['email'];
$number=$_POST['phone_no'];
$password=$_POST['password'];
$sql="INSERT INTO `users`(`Name`, `email`, `password`, `phone_no`) VALUES 
('$name','$email','$password','$number')";
if(mysqli_query($conn,$sql)){
echo"Records inserted successfully";
}
else{
echo"ERROR:Could not able to execute $sql.".mysqli_error($conn);
}
}
session_start();
if(isset($_POST['Login'])){
$email=$_POST['email'];
$password=$_POST['password'];
$query="SELECT * FROM users WHERE 'email'='$email' AND 'password'='$password'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
if(mysqli_num_rows($result)==1){
header("location:index2.php");
}
else{
$error='emailID or password is incorrect';
}
}
if(isset($_POST['job'])){
$cname=$_POST['cname'];
$pos=$_POST['position'];
$jdesc=$_POST['jdesc'];
$skills=$_POST['skills'];
$CTC=$_POST['CTC'];
$sql1="INSERT INTO `jobs`( `cname`, `position`, `jdesc`, `skills`, `CTC`) VALUES 
('$cname','$pos','$jdesc','$skills','$CTC')";
if(mysqli_query($conn,$sql1)){
echo" ";
}
else{
echo"ERROR:Failed to post the job $sql1.".mysqli_error($conn);
}
}
if(isset($_POST['sub'])){
$name=$_POST['name'];
$qual=$_POST['qual'];
$apply=$_POST['apply'];
$year=$_POST['year'];
$sql2="INSERT INTO `candidates`(`name`, `apply`, `qual`, `year`) VALUES 
('$name','$apply','$qual','$year')";
mysqli_query($conn,$sql2);
}
mysqli_close($conn);
?>
<html>
<head>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fontawesome/6.3.0/css/all.min.css" integrity="sha512-
SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGK
HEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-
EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
crossorigin="anonymous">
<title>Dashboard</title>
</head>
<body>
<div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container-fluid">
<a class="navbar-brand" href="#"></a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bstarget="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle 
navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNav">
</div>
</div>
</nav>
<!-- The sidebar -->
<div class="sidebar">
<a class="active" href="index2.php">Jobs</a>
<a href="jobs.php">Candidates Applied</a>
<a href="#contact">Contact</a>
<a href="#about">About</a></div>