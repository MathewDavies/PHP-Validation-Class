<?php include 'filters.class.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Practicing filtering</title>
</head>
<body>
<div class="flex-container">
<form method="post">
<h1>Input Data</h1>

    <input class= "text-field" type="text" placeholder = "User Name" name = "user" method="post"><br><br>
    <input class= "text-field" type="text" placeholder = "Email"name = "email" method="post"><br><br>
    <input class= "text-field" type="text" placeholder= "Password" name = "pwd" method="post"><br><br>
    <input class= "text-field" type="text" placeholder= "Confirm Password" name = "confirm-pwd" method="post"><br><br>

    <button class= "submit-btn" type="submit">Submit</button>
</form>
 <br>   
  
  
  <div class="errors">
  <h1>Errors</h1>

  <?php
  if(!empty (isset ($_POST['user']))){
    $class = new Filtering($_POST);
    $classResult = $class->validateData();
    
    if ($classResult==null) {
        echo "data valid";
    }else{
        echo "<ul>";
        foreach ($classResult as $key => $value){
            echo "<li>".$value."</li>";
        }
        echo "</ul>";

//        var_dump($classResult);
        //echo out each error
   }
}
?>
</div>
</div>

</body>
</html>
