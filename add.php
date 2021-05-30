<?php 
include 'connection.php';
$activePage ='add.php';
include 'header.php'; 

 $sql = 'SELECT * FROM visitor_type';
 $retval = mysqli_query($conn,$sql);
   
 if(! $retval ) {
      die('Could not get data: ' . mysql_error());
  }
   
  $visitor_type = array();
   while($row = mysqli_fetch_array($retval)) {
    $visitor_type[$row['id']] = $row['type'];
  }


  if(isset($_POST["submit"])){
   

    $insertsql = "INSERT INTO `visitor_master` ( `name`, `email`, `visit_type`, `person_to_visit`, `entry_time`, `exit_time`, `created_at`) VALUES ( '$_POST[name]', '$_POST[email]', '$_POST[visit_type]', '$_POST[person_to_visit]','$_POST[entry]', '$_POST[exit_time]', NOW())";
   
    $result = mysqli_query($conn,$insertsql);
    
    if ($result) {
      //echo "New record created successfully";
      //header("Location: http://localhost/EMS/index.php");
      header("Location:index.php");
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error; exit();
    }

    
  }


?>
<div class="container-fluid">
  <div class="row">
      <div class="col-md-4 offset-md-4">
        <h1>Add Visitor </h1>
      </div>
  </div>
  <div calss="row">
    <div class="col-md-4 offset-md-4"> 
        <form method="post" action="#">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter name" name="name" required>
            <!--<small id="emailerror" class="form-text text-muted"></small>-->
          </div>
          <div class="form-group">
            <label for="Email">Email Address</label>
            <input type="email" class="form-control" id="Email" placeholder="Enter email" name="email" required>
            <!--<small id="emailerror" class="form-text text-muted"></small>-->
          </div>
          <div class="form-group">
            <label for="visit_type">Visit Type</label>
            <select class="form-control" id="visit_type" name="visit_type" required>
              <option value="">Select Visit Type </option>
              <?php 
              foreach ($visitor_type as $key => $value) 
              {
              ?>      
              <option value="<?php echo $key; ?>"><?php echo ucfirst($value); ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group">
            <label for="person_to_visit">Person To Visit</label>
            <input type="text" class="form-control" id="person_to_visit"  placeholder="Enter Person Name To Visit" name="person_to_visit" required>
            <!--<small id="emailerror" class="form-text text-muted"></small>-->
          </div>

          <div class="form-group">
            <label for="entry">Visitor Entry Date Time</label>
            <input type="text" class="form-control" id="entry"  placeholder=" Entry date and time" name="entry" required>
            <!--<small id="emailerror" class="form-text text-muted"></small>-->
          </div>

          <div class="form-group">
            <label for="exit_time">Visitor Exit Date Time</label>
            <input type="text" class="form-control" id="exit_time"  placeholder=" Entry Exit time" name="exit_time">
            <!--<small id="emailerror" class="form-text text-muted"></small>-->
          </div>
          
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
  </div>
</div>
<script>
  $( document ).ready(function() {
    $('#entry').datetimepicker();
    $('#exit_time').datetimepicker();
  });
  
</script>

</body>
</html>
