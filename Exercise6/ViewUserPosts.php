<style><?php include "../style.css";?></style>
<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "r977j457", "xie7eo3a", "r977j457");
    
    /* check connection */
    if ($mysqli->connect_error) {
        printf("Connection failed: %s\n", $mysqli->connect_error); 
        exit(); 
    }
    $user = $_POST["userID"];
    echo $user . "'s Posts:<br>";

    $query = "SELECT content from Posts WHERE authorID='$user' ";
    $result = $mysqli->query($query);

    echo "<table style='border: 1px solid royalblue, width: 100%'>";
    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td style='border: 1px solid royalblue'>" . $row["content"] . "</td>";
            echo "</tr>";
        }
    }
    echo "</table>";


    $mysqli->close();
?>