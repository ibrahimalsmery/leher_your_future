<?php


$username = "tenderfu_rizvi17";
$password = "#Rizvi175";
$dbname = "tenderfu_there";
$con=mysqli_connect($servername,$username,$password,$dbname);

$email=$_POST['email'];
$sql="SELECT * FROM `Users`  where email='$email'";
$result=mysqli_query($con,$sql);
 
$data=array();

 if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   $data["data"][]=$row;
  }
} else {
  echo "notfound";
}

 
 
 
 
 header('Content-Type:Application/json');
 
 echo json_encode($data);

	

?>