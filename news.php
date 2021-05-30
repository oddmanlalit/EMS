<?php  
    include 'connection.php';
	$activePage ='news.php';
	include 'header.php'; 


	$apiURL = 'http://newsapi.org/v2/everything?q=bitcoin&from=2021-05-21&sortBy=publishedAt&apiKey=f208231d34074810b9a1de5db045ffea';

     
	//CURL
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $apiURL);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, [
	'x-api-key:f208231d34074810b9a1de5db045ffea',
	]);

	
	$result =  curl_exec($ch);
	if($result === false)
	{
	    echo 'Curl error: ' . curl_error($ch);
	}
	
	$output = json_decode($result);
	$finaloutput = cvf_convert_object_to_array($output);
	curl_close($ch);
    
    function cvf_convert_object_to_array($data) {

		    if (is_object($data)) {
		        $data = get_object_vars($data);
		    }

		    if (is_array($data)) {
		        return array_map(__FUNCTION__, $data);
		    }
		    else {
		        return $data;
		    }
    }  
    
?>  
<div class="container-fluid">
  <div class="row">
      <div class="col-md-5 offset-md-4">
        <h1>Latest News List </h1>
      </div>
  </div>
  <?php if(count($finaloutput['articles']) > 0){?>
  <?php foreach($finaloutput['articles'] as $key => $value){ ?>
  <div calss="row ">
  	<div class='col-md-4'>
  		<img src="<?php echo $value['urlToImage']; ?>" class="rounded float-left" alt="No image"
  		width="400" height="300"></a>
  	</div>
    <div class='col-md-8' style="  height: 300px;">
      <ul class="list-group list-group-flush">
	  <li class="list-group-item"><h6><?php echo (!empty($value['title']))?$value['title']:'No Title' ?></h6></li>
	  <li class="list-group-item"><?php echo (!empty($value['description']))?$value['description']:'' ?></li>
	  <li class="list-group-item">Author -<?php echo (!empty($value['author']))?$value['author']:'' ?><a href="<?php echo $value['url']; ?>" class="float-right">view</a></li>
	  </ul>   	 
    </div>
  </div>
  <?php } ?>
  <?php } ?>
</div>


</body>
</html>



