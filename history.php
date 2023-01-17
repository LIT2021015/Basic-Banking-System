<!DOCTYPE html>
<html>
<head>
<title>Transaction history</title>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Anton&family=Gabriela&display=swap" rel="stylesheet">
    <style>

body{
    background-image: url("images/bac.jpg");
 background-color: #cccccc;
 background-size:cover ;
 
 

}


table{
    width: 90%;
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
    <div style="font-family: 'Gabriela', serif;   font-size: 50px;
        text-align: center;
        margin: 20px;
        color:white;
    }">Transaction History</div>
    <table>
    <tr>
    <th>Sender's Name</th>
    <th>Sender's Account Number</th>
    <th>Reciever's Name</th>
    <th>Reciever's Account Number</th>
    <th>Amount</th>
    <th>Date </th>
    <th>Time</th>
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


        $sql = "SELECT * FROM `transfer`";
        $result = mysqli_query($conn, $sql);

        // Find the number of records returned
        $num = mysqli_num_rows($result);

        // Display the rows returned by the sql query
        if($num> 0){
            

            // We can fetch in a better way using the while loop
            while($row = mysqli_fetch_assoc($result)){
                // echo var_dump($row);
                echo "<tr>";
                echo "<td>" . $row["s_name"]. "</td><td>" . $row["s_acc_no"] . "</td>
                <td>" . $row["r_name"] . "</td><td>" . $row["r_acc_no"] . "</td><td>Rs. " . $row["amount"] . "   </td><td>" . $row["dates"] . "</td><td>" . $row["timess"] . "</td>";
                 echo "</tr>";
        }
        echo "</table>";
        }
    ?>


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
            }
            else{
                sideNav.style.right = '-250px';
                condition = true;
            }
            })
    </script>
    </table>
    </body>
</html>