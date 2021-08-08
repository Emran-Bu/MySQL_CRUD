<?php include 'header.php'; 

    if (isset($_POST['deletebtn'])) {
        $stu_id = $_POST['sid'];

        include "configue.php";
    
        $sql = "DELETE  FROM student WHERE sid = {$stu_id}";
    
        $result = mysqli_query($conn, $sql) or die("Query Unsuccessful");
    
        
        header("location: http://localhost/MySQL_CRUD/index.php");
    
        mysqli_close($conn);
    }

?>


<div id="main-content">
    <h2>Delete Record</h2>
    <form class="post-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="sid" />
        </div>
        <input class="submit" type="submit" name="deletebtn" value="Delete" />
    </form>
</div>
</div>
</body>
</html>
