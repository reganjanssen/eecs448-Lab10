<style><?php include "../style.css";?></style>
<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "r977j457", "xie7eo3a", "r977j457");
    
    /* check connection */
    if ($mysqli->connect_error) {
        printf("Connection failed: %s\n", $mysqli->connect_error); 
        exit(); 
    }
    $user = $_POST["userID"];
    $query = "SELECT postID, content, authorID from Posts";
    $result = $mysqli->query($query);

    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            $delete = $_POST[$row["postID"]];
            if($delete == "on") {
                $query = "DELETE FROM Posts where postID='".$row["postID"]."'";
                $deleted = $mysqli->query($query);
                echo $row["postID"]. " has been successfully deleted.<br>";
            }
        }
    }
    $mysqli->close();
?>