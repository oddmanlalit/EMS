<!DOCTYPE html>
<html lang="en">
<head>
  <title>Entry Managment System</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="datepicker/css/bootstrap-datetimepicker.min.css">
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="datepicker/js/bootstrap-datetimepicker.min.js"></script>
  
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#"><h1>EMS</h1></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
<?php      
$pages = array();
$pages["index.php"] = "Home";
$pages["add.php"] = "Add";
$pages["news.php"] = "Latest News";
?>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
 <ul class="navbar-nav mr-auto"> 
<?php foreach($pages as $url=>$title){?>
  <li nav-item <?php if($url === $activePage){?> class=" nav-item active" <?php }?>>
      <a class="nav-link" href="<?php echo $url; ?>"><?php echo $title; ?></a>
  </li>

<?php }?>
 </ul>
</div>
</nav>