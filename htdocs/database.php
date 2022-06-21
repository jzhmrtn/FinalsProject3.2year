<?php

    include 'config.php';
    session_start();

    if(isset($_POST["addConf"])) {

        $itmName = $_POST["itmName"];
        $itmPrice = $_POST["itmPrice"];
        $sz38 = $_POST["sz38"];
        $sz39 = $_POST["sz39"];
        $sz40 = $_POST["sz40"];
        $itmQuan = $_POST["sz38"] + $_POST["sz39"] + $_POST["sz40"];
        if($itmQuan == 0) {
            $itmStat = "N/A";
        } else {
            $itmStat = "Available";
        }
            

        $query = "INSERT INTO stonks VALUES ('', '$itmName', '$itmPrice', '$sz38', '$sz39', '$sz40', '$itmQuan', '$itmStat')";
        
        mysqli_query($conn, $query);
        echo '<script>
            alert("Data inserted!");
            window.location.href="database.php";
            </script>';
        
    }

    if(isset($_POST['btnDel'])){

        $allId = $_POST['chckBoxDel'];
        

        if($allId == null) {

            echo '<script>
                alert("No data selected!");
                window.location.href="database.php";
                </script>';

        } else {

            $extractId = implode(',', $allId);
            $query = "DELETE FROM stonks WHERE itmCode IN($extractId) ";
            $query_run = mysqli_query($conn, $query);  

            if($query_run) {

                echo '<script>
                alert("Data deleted!");
                window.location.href="database.php";
                </script>';

            } else {

                echo '<script>
                alert("Data not deleted!");
                window.location.href="database.php";
                </script>';

            }

        }

    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Final Project</title>
        <script src="modals.js"></script>
        <link href="styleDB.css" rel="stylesheet" type="text/css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@1,700&display=swap" rel="stylesheet"> 
    </head>
    <body>
        <div class="container">

            <div class="floating-btn" onclick="window.location='home.php';">
                <img src="images/homeBack.png" width="25" height="25">
            </div>

            <dialog class="addMdl" id="addMdl">
                <h3 style="font-family: Verdana; font-size: 2rem;"> Add an item!</h3>
                <form method="post" autocomplete="off">
                    <div class="inputs">
                        <div class="inputField">
                            <input name="itmName" type="text" required>
                            <span></span>
                            <label>item name</label>
                        </div>
                        <div class="inputField">
                            <input name="itmPrice" type="text" required>
                            <span></span>
                            <label>price</label>  
                        </div>
                        <div class="inputField">
                            <input name="sz38" type="text" required>
                            <span></span>
                            <label>size 38</label>
                        </div>
                        <div class="inputField">
                            <input name="sz39" type="text" required>
                            <span></span>
                            <label>size 39</label>  
                        </div>
                        <div class="inputField">
                            <input name="sz40" type="text" required>
                            <span></span>
                            <label>size 40</label>
                        </div> 


                        <div>
                            <button name="addConf" class="btn"> Add item</button>
                        </div>
        
                    </div>
			</form>
            </dialog>
            
            <dialog class="editMdl" id="editMdl">
                <h3 style="font-family: Verdana; font-size: 2rem; text-align: center;"> Edit an item's info!</h3>
                <form method="post" autocomplete="off">

                    <div id="page1">
  
                        <div class="inputField">
                            <input name="editName" type="text" style="width: 10%;" required>
                            <span></span>
                            <label>name of item you want to edit</label>  
                        </div>       

                        <div class="nextPrev">                     
                            <button name="nextBtn" class="btnNext"> Next </button>
                        </div>

                    </div>

                    <div id="page2">
                        <div class="inputField">
                            <input name="newName" type="text" style="width: 10%;" required>
                            <span></span>
                            <label>change item name into</label>  
                        </div>      
                        <div class="inputField">
                            <input name="newPrice" type="text" style="width: 10%;" required>
                            <span></span>
                            <label>change item price into</label>  
                        </div>   
                        <div class="inputField">
                            <input name="newSz38" type="text" style="width: 10%;" required>
                            <span></span>
                            <label>change size 38 quantity into</label>  
                        </div>   
                        <div class="inputField">
                            <input name="newSz39" type="text" style="width: 10%;" required>
                            <span></span>
                            <label>change size 39 quantity into</label>  
                        </div>   
                        <div class="inputField">
                            <input name="newSz40" type="text" style="width: 10%;" required>
                            <span></span>
                            <label>change size 40 quantity into</label>  
                        </div>   

                        <div class="nextPrev">   
                            <button name="prevBtn" class="btnPrev"> Previous </button>                  
                            <button name="saveBtn" class="btnSave"> Save </button>
                        </div>
                    </div>
			    </form>                                       

                <?php

                    if(isset($_POST['editName'])!= null) {

                        $editId = $_POST['editName'];
                        $sql = "SELECT * FROM stonks WHERE itmName LIKE '%$editId%'";
                        $result = $conn-> query($sql);

                            if(mysqli_num_rows($result) > 0) {

                                $newName = $_POST['newName'];
                                $newPrice = $_POST['newPrice'];
                                $newSz38 = $_POST['newSz38'];
                                $newSz39 = $_POST['newSz39'];
                                $newSz40 = $_POST['newSz40'];
                                $newQuan = $newSz38 + $newSz39 + $newSz40;
                                if($newQuan == 0) {
                                    $newStat = "N/A";
                                } else {
                                    $newStat = "Available";
                                }
                                
                                $editqry = "UPDATE stonks set itmName = '$newName', itmPrice = '$newPrice', sz38 = '$newSz38', sz39 = '$newSz39', sz40 = '$newSz40', sz40 = '$newSz40', itmQuan = '$newQuan', itmStat = '$newStat' where itmName = '$editId'";
                                mysqli_query($conn, $editqry);
                                header('Location: database.php');

                                } else {
                                
                                    echo "<script>alert('Item not found!');</script>";
    
                                }

                            } 


                    ?>

            </dialog>
            
            <div class="mainCont">
                <div class="syuman">
                    <img src="images/logo.png">
                    <h3> Shoeman </h3>                       
                </div>

                <div class="dBoard">
                    <h3> Database </h3>       
                </div>

                <div class="dbCont">
                    <div class="srchCont">
                        <form action="" method="GET">
                            <input name="search" type="text" style="width: 15vw; height: 4vh;" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>" placeholder="Search">
                            <button name="searchBtn" style="width: 4.5vw; height: 4.5vh;">Search</button>
                        </form>
                    </div>

                    <div class="dbTableCont">

                        <div class="tblHead">
                        <form action="" method="POST">
                            <table> 
                                <tr>    
                                    <th style="width: 8%;"><input type="checkbox" onclick="toggle(this);"/></th>
                                    <th style="width: 15%">Item Code</th>
                                    <th>Item Name</th>
                                    <th>Price</th>
                                    <th>38</th>
                                    <th>39</th>
                                    <th>40</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                </tr>
                                <?php

                                    if(isset($_GET['search'])) {

                                        $filter = $_GET['search'];
                                        $sql = "SELECT * FROM stonks WHERE itmName LIKE '%$filter%'";
                                        $result = $conn-> query($sql);

                                            if(mysqli_num_rows($result) > 0) {

                                                foreach($result as $items){

                                                    ?>
                                                    <tr>
                                                        <td><input type="checkbox" name="chckBoxDel[]" value="<?= $row['itmCode']; ?>"> </td>
                                                        <td><?= $items['itmCode']; ?></td>
                                                        <td><?= $items['itmName']; ?></td>
                                                        <td><?= $items['itmPrice']; ?></td>
                                                        <td><?= $items['sz38']; ?></td>
                                                        <td><?= $items['sz39']; ?></td>
                                                        <td><?= $items['sz40']; ?></td>
                                                        <td><?= $items['itmQuan']; ?></td>
                                                        <td><?= $items['itmStat']; ?></td>
                                                    </tr>
                                                    <?php

                                                }

                                            } else {

                                                ?>
                                                    <tr>
                                                        <td align="center" colspan="9"> No results found or database is empty! </td>                                                 
                                                    </tr>
                                                    <?php
    
                                            }

                                    } else {                              
                                        
                                        
                                        $sql = "SELECT * FROM stonks";
                                        $result = $conn-> query($sql);

                                        if ($result-> num_rows > 0) {

                                            while($row = $result-> fetch_assoc()) {

                                                ?>
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" name="chckBoxDel[]" value="<?= $row['itmCode']; ?>"> 
                                                    </td>
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
                                                <tr>
                                                    <td align="center" colspan="9"> Database is empty! </td>                                                 
                                                </tr>
                                                <?php

                                        }

                                    }
                                
                                ?>
                                
                            </table>

                            <div id="delbtn" class="delConf">
                                <span onclick="document.getElementById('delbtn').style.display='none'" class="close" >×</span>

                                <form class="delete-content">
                                    <div class="delCont">
                                    <h1>Delete</h1>
                                    <p>Are you sure you want to delete the selected item/s?</p>

                                    <div class="delConfBtns">
                                        <button type="button" onclick="document.getElementById('delbtn').style.display='none'" class="cancelbtn">Cancel</button>
                                        <button type ="submit" name="btnDel" class="delBtn">Delete</button>
                                    </div>

                                    </div>
                                </form>
                            </div>
                            </form>
                        </div>

                        <div class="btnCont">                        
                            <div class="btns">
                                <button name="btnAdd" class="button addBtn">Add</button>
                                <button class="btn" type="button" onclick="document.getElementById('delbtn').style.display='block'">Delete</button>
                                <button name="btnEdit" class="editBtn">Edit</button>
                            </div>
                        </div>
                        

                    </div>  

                </div>

            </div>
        </div> 
    </body>

</html>