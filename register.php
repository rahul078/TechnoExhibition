<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Thank you</title>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" >

</head>
<body>
<?php
$target_path = "uploads/";
$target_path = $target_path.basename( $_FILES['fileToUpload']['name']);
$name=$_POST["name"];
$phone=$_POST["phone"];
$college=$_POST["college"];
$email=$_POST["email"];
$proj=$_POST["proj_name"];
//echo $target_path;
//echo "$name";
//echo "$college , $phone , $email";
if (file_exists($target_path)) {?>
  <div class="jumbotron text-xs-center">
    <h1 class="display-3">Sorry , Couldnot register</h1>
    <p class="lead"><strong>Note</strong> File name should be same as project name provided</p>

  <hr>

  <p class="lead">
    <a class="btn btn-primary btn-sm" href="index.html" role="button">Continue to homepage</a>
  </p>
</div><?php
exit();
}

$conn = mysqli_connect("localhost", "Techno_organizers", "SecuredPwd","Applied_candidates");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "INSERT INTO candidate_list (project_name,name, email, phone,file_url,college_name)VALUES ('$proj','$name','$email','$phone','$target_path','$college')";
if (mysqli_query($conn, $sql)) {
  if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_path)) {?>
    <div class="jumbotron text-xs-center">
      <h1 class="display-3">Congrats on registering to the event!</h1>
      <p class="lead"><strong>Scrutinzed names</strong> will be announced soon.</p>
    <hr>

    <p class="lead">
      <a class="btn btn-primary btn-sm" href="index.html" role="button">Continue to homepage</a>
    </p>
  </div><?php
  } else{
      echo "Sorry, file not uploaded, please try again!";
  }
} else {?>
  <div class="jumbotron text-xs-center">
  <h1 class="display-3">Sorry Registration was not successfull !</h1>
  <p class="lead">Contact organzers for more info.</p>
  <hr>

  <p class="lead">
    <a class="btn btn-primary btn-sm" href="index.html" role="button">Continue to homepage</a>
  </p>
</div><?php
}

mysqli_close($conn);




?>
</body>
