<?php 
	include('dbconnect.php');
	include('storage.php');
    $storage = new storage();
?>
<?php

try
{
    if(isset($_POST['submit']))
    {
        $sn3=trim(strip_tags($_REQUEST['sn1']));
        $sql = "INSERT INTO main_user (mcust_name, mcust_mobile, mcust_email, mcust_photo) VALUES (:mcust_name, :mcust_mobile, :mcust_email, :mcust_photo)";
        $stmt = $pdo->prepare($sql);

        // Bind parameters to statement
        $stmt->bindParam(':mcust_name', $sn3);
        $stmt->bindParam(':mcust_mobile', $_REQUEST['mn1']);
        $stmt->bindParam(':mcust_email', $_REQUEST['em1']);
        $stmt->bindParam(':mcust_photo', $_FILES['sr']['name']);

        // Execute the prepared statement
        $stmt->execute();
        $storage->uploadObject('us.artifacts.surajsojas.appspot.com', $_FILES['sr']['name'], $_FILES['sr']['tmp_name']);
        echo "Records inserted successfully.";
    }
}
catch(PDOException $e)
{
    die("ERROR: Could not prepare/execute query: $sql. " . $e->getMessage());
}

    /*{
        $sn3=$_POST['sn1'];
        $mn3=$_POST['mn1'];
        $em3=$_POST['em1'];


    $sql = "INSERT INTO main_user (mcust_name, mcust_mobile, mcust_email)
  VALUES ('$sn3', '$mn3', '$em3')";

    $pdo->exec($sql);
    }
    


    echo $sn3;
    echo $mn3;
    echo $em3;*/
?>
<!DOCTYPE html>
<html>
<head>
<title>Maezoz</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<h1>What Is your name</h1>
<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="sn1" class="form-control">
    </div>

    <div class="form-group">
        <label>Mobile No</label>
        <input type="number" name="mn1" class="form-control">
    </div>

    <div class="form-group">
        <label>Email Id</label>
        <input type="email" name="em1"  class="form-control">
    </div>

    <input type="file" name="sr">


    <input type="submit" name="submit" class="btn btn-primary">

</form>
<br>

<img src="https://storage.cloud.google.com/us.artifacts.surajsojas.appspot.com/containers/images/Contact-page.png?authuser=1" alt="hi" class="img-fluid">
<br>
<br>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>