<?php

if(isset($_POST["id"]) && !empty($_POST["id"])){
   
   
// Include config file

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'tenderfu_rizvi17');
define('DB_PASSWORD', '#Rizvi175');
define('DB_NAME', 'tenderfu_there');
 

try{
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
   
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
    
 
    $sql = "DELETE from quiz WHERE  quizid = :id";
    
    if($stmt = $pdo->prepare($sql)){
   
        $stmt->bindParam(":id", $param_id);
        
      
        $param_id = trim($_POST["id"]);
  
        if($stmt->execute()){
       
            header("location: quizlist.php");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
  
    unset($stmt);
    

    unset($pdo);
} else{


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Delete Record</h1>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>Are you sure you want to delete this record?</p><br>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="quizlist.php" class="btn btn-default">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>