<?php include 'header.php'; ?>
<div id="main-content">
    <h2>Edit Record</h2>
    <form class="post-form" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="sid" />
        </div>
        <input class="submit" type="submit" name="showbtn" value="Show" />
    </form>

    <?php

        if (isset($_POST['showbtn'])) {
            $conn = mysqli_connect("localhost", "root",  "", "crud2") or die("Connection Failed");

            $stu_id = $_POST['sid'];
    
            $sql = "SELECT * FROM student where sid = {$stu_id}";
    
            $result = mysqli_query($conn, $sql) or die("Query Unsuccessful");
    
            if (mysqli_num_rows($result) > 0) {
    
            while ($row = mysqli_fetch_assoc($result)) {
        

    ?>

    <form class="post-form" action="updatedata.php" method="post">
        <div class="form-group">
            <label for="">Name</label>
            <input type="hidden" name="sid"  value="<?php echo $row['sid']; ?>" />
            <input type="text" name="sname" value="<?php echo $row['sname']; ?>" />

            <?php
            if (isset($_GET['error'])) {
            ?>
            <span style="color: red; display: block; text-align: right; margin-top: 2px; transition: 5s all ease"><?php echo $_GET['error']; ?></span>
           <?php } ?>

        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="saddress" value="<?php echo $row['saddress']; ?>" />

            <?php
            if (isset($_GET['error1'])) {
            ?>
            <span style="color: red; display: block; text-align: right; margin-top: 2px; transition: 5s all ease"><?php echo $_GET['error1']; ?></span>
           <?php } ?>

        </div>
        <div class="form-group">
        <label>Class</label>
        <?php

            $sql1 = "SELECT * FROM studentclass";
    
            $result1 = mysqli_query($conn, $sql1) or die("Query Unsuccessful");

            if (mysqli_num_rows($result1) > 0) {

        ?>
        <select name="sclass">
        <?php 
        
        while ($row1 = mysqli_fetch_assoc($result1)) {

            if ($row['sclass'] == $row1['cid'] ) {
                $select = "selected";
            } else {
                $select = "";
            }

        ?>
            <option <?php echo $select ?> value="<?php echo $row1['cid'] ?>"><?php echo $row1['cname'] ?></option>
        <?php } ?>
        </select>
        <?php } ?>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="sphone" value="<?php echo $row['sphone']; ?>" />
            <?php
            if (isset($_GET['error2'])) {
            ?>
            <span style="color: red; display: block; text-align: right; margin-top: 2px; transition: 5s all ease"><?php echo $_GET['error2']; ?></span>
           <?php } ?>

        </div>
    <input class="submit" type="submit" value="Update"  />
    </form>
    <?php
            }
        }
    }
    ?>
</div>
</div>
</body>
</html>
