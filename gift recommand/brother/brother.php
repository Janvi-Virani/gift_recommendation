<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/page.css">
    <link rel="stylesheet" href="styles/like.css">
    <link rel="stylesheet" href="styles/nav.css">
    <link rel="stylesheet" href="styles/heart.css">
    <link rel="stylesheet" href="heartlike.css">
    <script src="https://kit.fontawesome.com/3929e16ef5.js" crossorigin="anonymous"></script>
        <script src="{% static 'network/functions.js' %}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>brother</title>
</head>
<body>
<section>
        <header class="header">
            <a class="navbar-brand" href="#">
                <img src="./logogift2.png" width="200" height="60" class="d-inline-block align-top" alt="">
            </a>
            <div id="menu-btn" class="fas fa-bars"></div>
            <nav class="navbar">
                <a href="../index1.php#home">Home</a>
                <a href="../index1.php#relation">Relation</a>
                <a href="../index1.php#blogs">Blogs</a>
                <a href="../index1.php#feedback">Feedback</a>
                <a href="../signingift.php">Login</a>
            </nav>
        </header>
    </section>
    <br><br><br>
    <div class="title">
    <h2>BROTHER</h2></div>
    <section>
        <div class="wrapper">
            <a href="#" class="toggle-button">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </a>
            <div class="shadow">
                <ul>
                    <li><a href="#birthday">Birthday</a></li>
                    <li><a href="#wedding">Wedding</a></li>
                    <li><a href="#goodluck">Goodluck</a></li>
                </ul>
            </div>
        </div>
        <br>
        <br>

<!-- birthdaysection  -->

        <div class="gallery-section">
            <div class="gallery-wrap">
                <div id="Birthday">
                <div class="two alt-two">
                <h1>BIRTHDAY</h1>
                </div>
                <div class="gallery-images">
        <?php  
          $conn=mysqli_connect("localhost",'root','','brother') or die("connection faild!");
         $res=mysqli_query($conn,"SELECT * FROM `birthday` ORDER BY `birthday`.`like` DESC") or die("Query error!");
         if(isset($_POST['submit_like']))
         {
             $id=$_POST['id'];
             $sq="SELECT `like` FROM `birthday` WHERE  id={$id}";            
             $res=mysqli_query($conn,$sq) or die('querry error!!');
             $pre_like=mysqli_fetch_assoc($res);
             $pre_like=$pre_like['like']+1;    
           $sql="UPDATE `birthday` SET `like`='{$pre_like}' WHERE id=$id";
           if(mysqli_query($conn,$sql) or die("Query erroro"))
           {
               header("Location: ./brother.php");
           }  
         }
        while($data=mysqli_fetch_assoc($res)){
            ?>
            <div class="gallery">
                        <div class="image-section">
                            <img src="<?php echo $data['img'];?>" alt="" height="325px" width="460px">
                            <div class="caption">
                            <p><?php  echo $data['name'] ?></p>
                            </div>
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" >
                            <label for=""><?php echo $data['like']; ?></label>
                            <button class="button" title="like" type="submit" name="submit_like" > 
               <div class="h_container">
        <i id="heart" class="far fa-heart"></i></div>
    </button>
                                <input type="hidden" name="id" value="<?php echo $data['id'];  ?>">
                            </form>
                        </div>
                        </div>
        <?php } ?>
        </div>
        <br>
        <br>

<!--wedding -->

        <div class="gallery-section">
            <div class="gallery-wrap">
                <div id="wedding">
                <div class="two alt-two">
                <h1>WEDDING</h1>
                </div>
                <div class="gallery-images">
<?php  
          $conn=mysqli_connect("localhost",'root','','brother') or die("connection faild!");
         $res=mysqli_query($conn,"SELECT * FROM `wedding` ORDER BY `wedding`.`like` DESC") or die("Query error!");
if(isset($_POST['submit_like']))
         {
             $id=$_POST['id'];
             $sq="SELECT `like` FROM `wedding` WHERE  id={$id}";            
             $res=mysqli_query($conn,$sq) or die('querry error!!');
             $pre_like=mysqli_fetch_assoc($res);
             $pre_like=$pre_like['like']+1;    
           $sql="UPDATE `wedding` SET `like`='{$pre_like}' WHERE id=$id";
           if(mysqli_query($conn,$sql) or die("Query erroro"))
           {
               header("Location: ./brother.php");
           }  
         }
        while($data=mysqli_fetch_assoc($res)){
            ?>
            <div class="gallery">
                        <div class="image-section">
                            <img src="<?php echo $data['img'];?>" alt="" height="325px" width="460px">
                            <div class="caption">
                            <p><?php  echo $data['name'] ?></p>
                            </div>
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" >
                            <label for=""><?php echo $data['like']; ?></label>
                            <button class="button" title="like" type="submit" name="submit_like" > 
               <div class="h_container">
        <i id="heart" class="far fa-heart"></i></div>
    </button>
                                <input type="hidden" name="id" value="<?php echo $data['id'];  ?>">
                            </form>
                        </div>
                        </div>
        <?php } ?>
        </div>
        <br>
        <br>

<!-- goodluck section -->

        <div class="gallery-section">
            <div class="gallery-wrap">
                <div id="goodluck">
                <div class="two alt-two">
                <h1>GOODLUCK</h1>
                </div>
                <div class="gallery-images">
                    <?php  
          $conn=mysqli_connect("localhost",'root','','brother') or die("connection faild!");
         $res=mysqli_query($conn,"SELECT * FROM `goodluck` ORDER BY `goodluck`.`like` DESC") or die("Query error!");
         if(isset($_POST['submit_like']))
         {
             $id=$_POST['id'];
             $sq="SELECT `like` FROM `goodluck` WHERE  id={$id}";             
             $res=mysqli_query($conn,$sq) or die('querry error!!');
             $pre_like=mysqli_fetch_assoc($res);
             $pre_like=$pre_like['like']+1;    
           $sql="UPDATE `goodluck` SET `like`='{$pre_like}' WHERE id=$id";
           if(mysqli_query($conn,$sql) or die("Query erroro"))
           {
               header("Location: ./brother.php");
           }  
         }
         while($data=mysqli_fetch_assoc($res)){
            ?>
            <div class="gallery">
                        <div class="image-section">
                            <img src="<?php echo $data['img'];?>" alt="" height="325px" width="460px">
                            <div class="caption">
                            <p><?php  echo $data['name'] ?></p>
                            </div>
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" >
                            <label for=""><?php echo $data['like']; ?></label>
                            <button class="button" title="like" type="submit" name="submit_like" > 
               <div class="h_container">
        <i id="heart" class="far fa-heart"></i></div>
    </button>
                                <input type="hidden" name="id" value="<?php echo $data['id'];  ?>">
                            </form>
                        </div>
                        </div>
        <?php } ?>
        </div>
        <br>
        <br>
</div>
</div>       
</body>
</html>