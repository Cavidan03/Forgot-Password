<?php
include 'connect.php';
session_start();



if ($_SESSION['email']) {

} else {
  header("location: login.php");
}

?>

<!DOCTYPE html>
<html>

<head>
  <title>
    Home Pages
  </title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content=" ">
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
      .container{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 60vh;
        
      }
    </style>
</head>

<body>
  <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
          </ul>
          <form class="d-flex">
            <a href="logout.php" class="nav-link">Logout</a>
          </form>
        </div>
      </div>
    </nav>
  </div>
<?php
$sql=$db->prepare("Select * from users");
$sql->execute([]);
$row=$sql->fetch(PDO::FETCH_ASSOC);

?>
  <div class="container">
    
    <h1> <strong>Hello <?=$row['name']?> </strong> </h1>

  </div>




</body>

</html>