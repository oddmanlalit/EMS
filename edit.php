<?php 
include 'connection.php';
$activePage ='edit.php';
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

  $visitor_id  = $_GET['id'];
  
  if(!empty($visitor_id)){
    $selectsql    = "SELECT * FROM visitor_master where  id = '$visitor_id' ";
    $visitor_data = mysqli_query($conn,$selectsql);
    $old_visitor =  array();
    while($datarow = mysqli_fetch_array($visitor_data)) {
       $old_visitor['id']               = $datarow['id'];
       $old_visitor['name']             = $datarow['name'];
       $old_visitor['email']            = $datarow['email'];
       $old_visitor['visit_type']       = $datarow['visit_type'];
       $old_visitor['person_to_visit']  = $datarow['person_to_visit']; 
       $old_visitor['entry_time']       = $datarow['entry_time'];
       $old_visitor['exit_time']        = $datarow['exit_time'];
    }

  }

  if(isset($_POST["submit"])){
   
    $updatesql = "UPDATE `visitor_master` SET `name` = '$_POST[name]',`email` = '$_POST[email]',`visit_type` = '$_POST[visit_type]',`person_to_visit` = '$_POST[person_to_visit]',`entry_time` = '$_POST[entry]',`exit_time` = '$_POST[exit_time]' WHERE `visitor_master`.`id` ='$visitor_id'";
   
    $result = mysqli_query($conn,$updatesql);
    
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
        <h1>Edit Visitor </h1>
      </div>
  </div>
  <div calss="row">
    <div class="col-md-4 offset-md-4"> 
        <form method="post" action="#">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter name" name="name" value="<?php echo $old_visitor['name']; ?>" required>
          </div>
          <div class="form-group">
            <label for="Email">Email Address</label>
            <input type="email" class="form-control" id="Email" placeholder="Enter email" name="email" value="<?php echo $old_visitor['email']; ?>" required>
          </div>
          <div class="form-group">
            <label for="visit_type">Visit Type</label>
            <select class="form-control" id="visit_type" name="visit_type" required>
              <option value="">Select Visit Type </option>
              <?php 
              foreach ($visitor_type as $key => $value) 
              {
              ?>      
              <option value="<?php echo $key; ?>"  <?php echo ($old_visitor['visit_type'] == $key)?'selected':''; ?> ><?php echo ucfirst($value); ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group">
            <label for="person_to_visit">Person To Visit</label>
            <input type="text" class="form-control" id="person_to_visit"  placeholder="Enter Person Name To Visit" name="person_to_visit" value="<?php echo $old_visitor['person_to_visit']; ?>" required>
           
          </div>

          <div class="form-group">
            <label for="entry">Visitor Entry Date Time</label>
            <input type="text" class="form-control" id="entry"  placeholder=" Entry date and time" name="entry" value="<?php echo $old_visitor['entry_time']; ?>" disabled>
            <input type="hidden" name="entry" value="<?php echo $old_visitor['entry_time']; ?>" >
          </div>

          <div class="form-group">
            <label for="exit_time">Visitor Exit Date Time</label>
            <input type="text" class="form-control" id="exit_time"  placeholder=" Entry Exit time" name="exit_time"  value="<?php echo $old_visitor['exit_time']; ?>">
           
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
