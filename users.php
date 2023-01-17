<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Gabriela&display=swap" rel="stylesheet">
<style>



body {
	background: linear-gradient(-45deg, #23a6d5, skyblue);
	background-size: 400% 400%;
	animation: gradient 15s ease infinite;
	height: 100vh;
    font-family: sans-serif;
	font-weight: 100;
}

table {

    width: 85%;
    color:black;
    align:center;
    font-size: 25px;
    text-align: left;
    border-collapse: collapse;
	overflow: hidden;
	box-shadow: 0 0 20px rgba(0,0,0,0.1);
 
}
th {
    background-color:black;
    color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
tr:nth-child(odd) {background-color: #A9EBCE}
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
<div style="  font-family: 'Gabriela', serif;   
    font-size: 50px;
    font-weight:bold;
    text-align: center;
    margin: 20px;
    color: black;
    display:flex;
    flex-direction:row;
    align-items:center;
    justify-content:center;
}"><img src="images/logo.png" width="60px" height="60px" class="d-inline-block align-top" alt="">AK Bank's  Customers</div>
<table>
<tr>
<th>Sr.No.</th>
<th>Name</th>
<th>Email</th>
<th>Gender</th>
<th>Balance</th>
<th>Details</th>
</tr>





<?php
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


$sql = "SELECT * FROM `users`";
$result = mysqli_query($conn, $sql);

// Find the number of records returned
$num = mysqli_num_rows($result);

// Display the rows returned by the sql query
if($num> 0){
    

    // We can fetch in a better way using the while loop
    while($row = mysqli_fetch_assoc($result)){
        // echo var_dump($row);
       
        
        echo "<tr>";
    echo '<form method ="post" action = "Details.php">';
    echo "<td>" . $row["S.No."]. "</td><td>" . $row["name"] . "</td>
    <td>" . $row["email"] . "</td><td>" . $row["gender"] . "</td><td>Rs. " . $row["balance"] . "</td>";
    echo "<td ><a href='Details.php?user={$row["name"]}&message=no' type='button' name='user'  id='users1' ><span>Transfer</span></a></td>";
    echo "</tr>";
}
echo "</table>";
}
?>
 </section>
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
        </script>
</table>
</body>
</html>