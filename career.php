<?php include 'configure.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
.navbar{
overflow:hidden;
background-color:#333;
position:sticky;
top:0;
width:100%;
}
.jumbotron{
background-image:url(banner2.png);
background-size:100%;
}
.col-md-4{
box-sizing: border-box;
display: inline;
box-shadow: 8px 5px #888888;
padding:10px;
width: 30%;
float: left;
}
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-
GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" 
crossorigin="anonymous">
<title>Career.php</title>
</head>
<body>
<div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="jumbotron jumbotron-fluid">
<div class="container">
<h1 class="display-4" style="color:black; padding-top:65px; padding-left:400px;">Job 
Portal</h1>
<p class="lead" style="color:black;padding-left:350px;">Best jobs available matching your 
skills</p>
</div>
</div>
</div>
</div>
</div>
<div class="row m-0">
<?php
$server='localhost';
$username='root';
$password='';
$database='jobs';
$conn=mysqli_connect($server,$username,$password,$database);
$sql="SELECT `cname`, `position`, `jdesc`, `skills`, `CTC` FROM `jobs`";
$result=mysqli_query($conn,$sql);
if($result->num_rows>0){
while($rows=$result->fetch_assoc()){
echo'
<div class="col-md-4">
<div class="jobs mx-4">
<h3 style="text-align:center;">'.$rows['position'].'</h3>
<h4 style="text-align:center;">'.$rows['cname'].'</h4>
<p style="color:black;text-align:justify;">'.$rows['jdesc'].'</p>
<p style="color:black;"><b>Skills Required:</b>'.$rows['skills'].'</p>
<p style="color:black;"><b>CTC:</b>'.$rows['CTC'].'</p>
<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bstarget="#exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
Apply Now
</button>
</div>
</div>';
}
}
else{
echo"";
}
?>
<div class="modal fade" id="exampleModal" tabindex="-1" arialabelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h1 class="modal-title fs-5" id="exampleModalLabel">Apply for a job</h1>
<button type="button" class="btn-close" data-bs-dismiss="modal" arialabel="Close"></button>
</div>
<div class="modal-body">
<form method="POST">
<div class="mb-3">
<label for="recipient-name" class="col-form-label">Name</label>
<input type="text" class="form-control" id="recipient-name" name="name">
</div>
<div class="mb-3">
<label for="recipient-name" class="col-form-label">Qualification</label>
<input type="text" class="form-control" id="recipient-name" name="qual">
</div><div class="mb-3">
<label for="recipient-name" class="col-form-label">Year Passout</label>
<input type="text" class="form-control" id="recipient-name" name="year">
</div>
<div class="mb-3">
<label for="message-text" class="col-form-label">Applying For</label>
<input class="form-control" id="message-text" name="apply">
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
<button type="submit" name="apply"class="btn btn-primary">Apply</button>
</form>
</div>
</div>
</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-
alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-
w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" 
crossorigin="anonymous"></script>
</body>
</html>