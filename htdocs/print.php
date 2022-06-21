<?php

    include 'config.php';
    session_start();
    
?>

<!DOCTYPE html>
<html>
<head>
    <title>Final Project</title>
    <link rel="stylesheet" type="text/css" href="stylePrint.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@1,700&display=swap" rel="stylesheet"> 
</head>
<body>
<div class="container">
    
        <div class="floating-btn" onclick="window.location='home.php';">
            <img src="images/homeBack.png" width="25" height="25">
        </div>

        <style> 
            @media print {
                body {
                    visibility:hidden;
                }

                .mainCont, .mainCont{
                    visibility:visible;
                }
            }
        </style>

        <div class="printfltng-btn" onclick="window.print();">
            <img src="images/print.png" width="30" height="30">
        </div>

        <div class="mainCont">

                <div class="syuman">
                    <img src="images/logo.png">
                    <h3> Shoeman </h3>                       
                </div>

            <div class="addressCont">
                <h1>Blk20 Lot 56 Andres st. Molino XI
                <br>Bacoor Cavite
                <br>Contact#: 09095709281</h1>  
            </div>

            <div class="dBoard">
                <div class="datetime">
                        <span class="date">
                        <?php
                        $date = new DateTime("now", new DateTimeZone('Asia/Manila') );
                        echo $date->format('d F, Y (l)');
                        ?>
                        </span>

                        <span class="time">
                        <?php
                        $date = new DateTime("now", new DateTimeZone('Asia/Manila') );
                        echo $date->format('H:i:s A');
                        ?>
                        <span>        
                </div>           
            </div>
          
            <div class="dbCont">
                    <div class="dbTableCont">
                        <div class="tblHead">
                            <form action="" method="POST">
                                <table> 
                                    <tr>    
                                        <th style="width: 15%">Item Code</th>
                                        <th>Item Name</th>
                                        <th>Price</th>
                                        <th>38</th>
                                        <th>39</th>
                                        <th>40</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                        <th>Total Value</th>
                                    </tr>
                                    

                                    <?php

                                            $sql = "SELECT * FROM stonks";
                                            $result = $conn-> query($sql);


                                                if(mysqli_num_rows($result) > 0) {

                                                    foreach($result as $items){

                                                        $totalValue = $items['itmQuan'] * $items['itmPrice'];
                                                        $totInvVal=$totalValue;
                                                    

                                                        ?>
                                                        <tr>
                                                            <td><?= $items['itmCode']; ?></td>
                                                            <td><?= $items['itmName']; ?></td>
                                                            <td><?= "₱" , number_format($items['itmPrice']); ?></td>
                                                            <td><?= $items['sz38']; ?></td>
                                                            <td><?= $items['sz39']; ?></td>
                                                            <td><?= $items['sz40']; ?></td>
                                                            <td><?= $items['itmQuan']; ?></td>
                                                            <td><?= $items['itmStat']; ?></td>
                                                            <td><?="₱" , number_format($totalValue);?></td>

                                                        </tr>
                                                        <?php
                                                    }

                                                    $result = mysqli_query($conn, 'SELECT SUM(itmQuan*itmPrice) AS value_sum FROM stonks'); 
                                                    $row = mysqli_fetch_assoc($result); 
                                                    $sum = $row['value_sum'];


                                                ?>
                                                    <tr> 
                                                        <th align="right" colspan="9">Total Inventory Value: <?="₱" , number_format($sum); ?></th>
                                                    </tr>
                                                <?php   
                                            
                                                }

                                            else {

                                                echo "No results!";

                                            }
                                    ?>
                                    
                                </table>
                            </form>
                        </div>
                    </div>  
                </div> 
            </div>   
        </div>
</div>


</body>
</html>