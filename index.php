<?php 
include 'connection.php';
$activePage ='index.php';
include 'header.php'; 

 $sql = 'SELECT vm.*,vt.type FROM visitor_master as vm LEFT JOIN visitor_type as vt ON vm.visit_type = vt.id';
 $retval = mysqli_query($conn,$sql);
   
 if(! $retval ) {
      die('Could not get data: ' . mysql_error());
  }
 
  $count = 0;
  $data = array();
   while($row = mysqli_fetch_array($retval)) {
    $data[$count]['id']                 = $row['id'];
    $data[$count]['name']               = $row['name'];
    $data[$count]['email']              = $row['email'];
    $data[$count]['visit_type']         = $row['visit_type'];
    $data[$count]['type']               = $row['type'];
    $data[$count]['person_to_visit']    = $row['person_to_visit'];
    $data[$count]['entry_time']         = $row['entry_time'];
    $data[$count]['exit_time']          = $row['exit_time'];
    $data[$count]['created_at']         = $row['created_at'];
    $data[$count]['updated_at']         = $row['updated_at'];
    $count++;
  }

?>
<div class="container-fluid">
  <div class="row">
      <div class="col-md-2 offset-md-5">
        <h1>Visitor List </h1>
      </div>
  </div>
  <div calss="row">
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Type</th>
          <th scope="col">Person To Visit</th>
          <th scope="col">Entry Time</th>
          <th scope="col">Exit Time</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php if(count($data) > 0){?>
        <?php foreach($data as $datakey => $datavalue){ ?>  
        <tr>
          <th scope="row"><?php echo $datavalue['id']; ?></th>
          <td><?php echo $datavalue['name']; ?></td>
          <td><?php echo $datavalue['email']; ?></td>
          <td><?php echo $datavalue['type']; ?></td>
          <td><?php echo $datavalue['person_to_visit']; ?></td>
          <td><?php echo ($datavalue['entry_time'] == '0000-00-00 00:00:00')? '-':$datavalue['entry_time'] ; ?></td>
          <td><?php echo ($datavalue['exit_time'] == '0000-00-00 00:00:00')? '-':$datavalue['exit_time'] ; ?></td>
          <td><a class="btn btn-warning" href="edit.php?id=<?php echo $datavalue['id']; ?>">Edit</a></td>
        </tr>
        <?php }?>
        <?php }else{?>

        <?php }?>  
      </tbody>
    </table>
  </div>
</div>


</body>
</html>
