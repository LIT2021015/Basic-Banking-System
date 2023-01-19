
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
         
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <title>Create user!</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">

 <style>
    .btn1{
        height:50px;
        width:50%;
        border:none;
        outline: none;
        border-radius: 60px;
        font-weight: 600;
        background: rgb(223,56,56);
        color: white;
    }
    .btn1:hover{
        background: rgb(143, 61, 61);
        transition:0.5s;
    } 
    

    #sideNav{
        width: 250px;
        height: 100vh;
        position: fixed;
        right: -250px;
        top:0;
        background: black;
        z-index: 2;
        transition: .5s;
    }
    nav ul li{
        list-style: none;
        margin: 50px 20px;
    }
    nav ul li a{
        text-decoration: none;
        color: #fff;
    }
    #menuBtn{
        width: 50px;
        position: fixed;
        right: 0px;
        top: 0px;
        z-index: 2;
        cursor: pointer;
        width: 60px;
        height:60px;
    }
</style>
  </head>
  <body>




    <section class="vh-110" style="background-color: black;"> 
       <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $gender = $_POST['gender'];
                    $balance=$_POST['balance'];
                
                // Connecting to the Database
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "login";

                // Create a connection
                $conn = mysqli_connect($servername, $username, $password, $database);
                // Die if connection was not successful
                if (!$conn){
                    die("Sorry we failed to connect: ". mysqli_connect_error());
                }
                else{ 

                    $Acc_Number=10000;
                    $S_No=0;
                     
            
                    $sql = "SELECT * FROM `users`";
                    $result = mysqli_query($conn, $sql);
                    
            
                    $num = mysqli_num_rows($result);
                      if($num> 0)
                     {   while ($row = mysqli_fetch_array($result)) {
                         $Acc_Number=   $row["Acc_Number"];
                         $S_No=$row["S.No."];
                        }}
                    

                      $S_No=$S_No+1;

                      $Acc_Number=$Acc_Number+101;

                    // Submit these to a database
                    // Sql query to be executed 
                    $sql = "INSERT INTO `users` (`S.No.`,`Acc_Number`,`name`, `email`, `gender`, `balance`) VALUES ('$S_No','$Acc_Number','$name', '$email', '$gender', $balance)";
                    $result = mysqli_query($conn, $sql);
            
                    if($result){
                    echo "<div class='alert alert-success alert-dismissible fade show hide' role='alert'>
                    <strong>Success!</strong> Your entry has been submitted successfully!
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span class='errorClose' aria-hidden='true'>×</span>
                    </button>
                    </div>";
                    }
                    else{
                        // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
                        echo "<div class='alert alert-danger alert-dismissible fade show hide' role='alert'>
                    <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span class='errorClose' aria-hidden='true'>×</span>
                    </button>
                    </div>";
                    }

                }

            }

                
        ?>
  <div class="container h-100" >
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px; background-color: skyblue;">
        <p class="text-center h1 my-3 " style=" font-family: 'Gabriela', serif;;  font-size: 50px; font-weight:bold;"><img src="images/logo.png" width="60px" height="60px" class="d-inline-block align-top" alt="">Ak Bank</p>
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Create Your Account</p>

                <form class="mx-1 mx-md-4" action="/project/Register.php" method="post">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="name" id="form3Example1c" class="form-control" />
                      <label class="form-label" for="form3Example1c">Username</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" name="email" type="email" class="form-control" />
                      <label class="form-label" for="form3Example3c">Your Email</label>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4 ">
                  <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                <div  class="form-outline flex-fill mb-0">
                                    <select  name="gender" class="form-control form-selec " aria-label="Default select example">
                                        <option selected>Select Gender</option>
                                        <option value="F">Female</option>
                                        <option value="M">Male</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                    <input id="balance" name="balance" type="text" class="form-control" placeholder="Balance">
                                </div>
                            </div>

                

                  <div class="form-check d-flex justify-content-center mb-5">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                    <label class="form-check-label" for="form2Example3">
                      I agree all statements in <a href="#!">Terms of service</a>
                    </label>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg">Register</button>
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

              <img src="images/Customer-3.png" class="img-fluid"/>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>




<div>
        <nav id="sideNav">
            <ul>
                <li><a href="index.html">HOME</a></li>
                <li><a href="users.php">OUR CUSTOMERS</a></li>
                <li><a href="history.php">TRANSACTION HISTORY</a></li>
                <li><a href="users.php">TRANSFER MONEY</a></li>
                <li><a href="Register.php">NEW USER</a></li>
            </ul>
        </nav>
        <div id="hojaplz">
        <img src="images/menu.png" id="menuBtn">
</div>

        <script>
           let menuBtn = document.querySelector('#hojaplz');
            let sideNav = document.querySelector('#sideNav')
            let errorClose = document.querySelector('.errorClose')
            let hide= document.querySelector('.hide')
            let balance= document.querySelector('balance')
        
            let condition = true;

           menuBtn.addEventListener('click',function(){
               if(condition){
                   sideNav.style.right = '0px';
                   condition = false;
               }else{
                sideNav.style.right = '-250px';
                condition = true;
               }

           })

           errorClose.addEventListener('click',function(){
             hide.style.display='none'
           })
           
        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

    
  </body>
</html>
