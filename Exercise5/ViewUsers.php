<style><?php include "../style.css";?></style>
<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "r977j457", "xie7eo3a", "r977j457");
    
    /* check connection */
    if ($mysqli->connect_error) {
        printf("Connection failed: %s\n", $mysqli->connect_error); 
        exit(); 
    }
    $query = "SELECT userID from Users";
    $result = $mysqli->query($query);

    echo "<table>";
    echo "<tr>";
    echo "<td>" ."Users:". "</td>";
    echo "</tr>";
    /* populate table with users */
    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>" . $row["userID"] . "</td>";
            echo "</tr>";
        }
    }
    echo "</table>";

    $mysqli->close();
?>