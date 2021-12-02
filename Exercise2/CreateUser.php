<style><?php include "../style.css"; ?></style>
<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "r977j457", "xie7eo3a", "r977j457");
    
    /* check connection */
    if ($mysqli->connect_error) {
        printf("Connection failed: %s\n", $mysqli->connect_error); 
        exit(); 
    }

    $user = $_POST["userID"];
    
    if ($user == "") {
        echo "Please enter a username, the Create User field cannot be left blank";
        exit();
    }

    $query ="INSERT INTO Users (userID) VALUES ('".$user."')";
    /* check if the username was successful or if had already been taken */
    if($result = $mysqli->query($query)) {
        echo "User was created successfully!";
        echo "<a style='font-size: 14pt;' href='../indexLab10.html'>Home</a>";
        
    }
    else {
        echo $user. " is already taken so unable to create user, please try another name";
        echo "<a style='font-size: 14pt;' href='../indexLab10.html'>Home</a>";
    }
    
   
    /* close connection */ 
    $mysqli->close();
?>