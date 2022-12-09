<?php
$conn=mysqli_connect("localhost","root","","kids");

if(!$conn){
    echo "connection failed....";
}
else{
    echo "connect successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doc kids</title>
</head>
<body>
    

<form action="" method="post" enctype="multipart/form-data">

upload image multiple
<input type="file" name="images" >
<br>
name
<input type="text" name="name">
<input type="submit" value="upload" name="uploadbtn">

</form>

<?php
if(isset($_POST['uploadbtn'])){
    $image_name=$_FILES['images']['name'];
    $image_tmp_name=$_FILES['images']['tmp_name'];
    $image_type=$_FILES['images']['type'];
    $image_size=$_FILES['images']['size'];
    $name=$_POST['name'];
    $folder="images/";

    if(strtolower($image_type)=="image/jpg" || strtolower($image_type)=="image/jpeg" || strtolower($image_type)== "image/png")
    {
        if($image_size <1000000){
            $folder=$folder. $image_name;
            move_uploaded_file($image_tmp_name,$folder);

            // $query="insert into birthday(name,img) values ('$name','$folder')";
            $query="insert into school(name,img) values ('$name','$folder')";
            
            $run=mysqli_query($conn,$query);
            echo "image inserted!";
        }
        else{
            echo "image can not be proper size";
            exit();
        }
    }
    else{
        echo " image can not be inserted! it can not supported format ";
    }

}

?>

</body>
</html>