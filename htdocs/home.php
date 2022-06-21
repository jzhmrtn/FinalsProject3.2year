<?php

    include 'config.php';
    session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Final Project</title>
        
        <link href="styleHome.css" rel="stylesheet" type="text/css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@1,700&display=swap" rel="stylesheet"> 
    </head>
    <body>
        <div class="floating-btn" id="notifBtn" onclick="document.getElementById('notifMdl').showModal()">
            <img id ="notifPic" width="25" height="25">
        </div>

        <div class="container">

            <dialog class="notifMdl" id="notifMdl">
                <h3 style="font-family: Verdana; font-size: 1.6rem; color:Red"> The following are low on some/all of its stocks:</h3>
                    <table> 
                        <tr>    
                            <th>Item Code</th>
                            <th>Item Name</th>
                            <th>Price</th>
                            <th>38</th>
                            <th>39</th>
                            <th>40</th>
                            <th>Quantity</th>
                            <th>Status</th>
                        </tr>
                        <?php                                
                                
                                $sql = "SELECT * FROM stonks WHERE sz38 < 20 OR sz39 < 20 OR sz40 < 20 OR itmQuan < 50";
                                $result = $conn-> query($sql);

                                if ($result-> num_rows > 0) {
                                    ?>
                                    <script>
                                        document.getElementById("notifPic").src="images/notification.png";
                                    </script>
                                    <?php

                                    while($row = $result-> fetch_assoc()) {

                                        ?>
                                        <tr>
                                            <td><?= $row['itmCode']; ?></td>
                                            <td><?= $row['itmName']; ?></td>
                                            <td><?= "₱" , number_format($row['itmPrice']); ?></td>
                                            <td><?= $row['sz38']; ?></td>
                                            <td><?= $row['sz39']; ?></td>
                                            <td><?= $row['sz40']; ?></td>
                                            <td><?= $row['itmQuan']; ?></td>
                                            <td><?= $row['itmStat']; ?></td>
                                            
                                        </tr>
                                        <?php

                                    }

                                } else {

                                    ?>
                                        <script>
                                            document.getElementById("notifPic").src="images/bell.png";
                                        </script>
                                        <tr>
                                            <td align="center" colspan="9"> No items are low on stocks! </td>                                                 
                                        </tr>
                                        <?php

                                }
                        
                        ?>                  
                    </table>

            </dialog>

            <div class="sbCont">
                <div class ="sbHeader">
                    <img src="images/woman.png" alt="">
                    <h3><?php echo $_SESSION['username']; ?></h3>       
                    <span>Admin</span>
                </div>
                <div class="sbNavi">

                    <br>
                    <ul class ="nav">                          
                        <li><img src="images/home.png"><a href="#"> Home </a></li>
                        <li><img src="images/about.png"><a href="about.php"> About Us </a></li>
                        <li><img src="images/contact.png"><a href="contact.php"> Contact Us</a></li>
                        <li style="position: relative; top: 35%;"><img src="images/logout.png" id="lagawt"><a href="logout.php" style="left:-15%;"> Logout</a></li>
                    </ul>

                </div>

            </div>
            <div class="mainCont">
                <div class="syuman">
                    <img src="images/logo.png">
                    <h3> SHOEMAN </h3>                       
                </div>

                <div class="dBoard">
                    <h3> DASHBOARD </h3>       
                </div>

                <div class="buttonCont">

                    <div class="buttons">
                        <button name="buttonDb" class="dbButton" onclick="window.location.href = 'database.php'">

                            <span style="font-size: 5vh; position: absolute; bottom: 18%; left: 30%;"> Database </span>
                            <img src="images/database.png" style="width: 30%; height: 40%; position: relative; top: -10%;">

                        </button>
                        <button name="buttonPr" class="printButton" onclick="window.location.href = 'print.php'">
                            
                            <span style="font-size: 5vh; position: absolute; bottom: 18%; left: 41%;"> Print </span>
                            <img src="images/printer.png" style="width: 30%; height: 40%; position: relative; top: -10%;">
                        
                        </button>
                    </div>

                </div>

            </div>
        </div> 
    </body>

</html>