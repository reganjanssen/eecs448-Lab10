<style><?php include "../style.css";?> </style>
<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "r977j457", "xie7eo3a", "r977j457");
    
    /* check connection */
    if ($mysqli->connect_error) {
        printf("Connection failed: %s\n", $mysqli->connect_error); 
        exit(); 
    }

    $user = $_POST["userID"];
    $post = $_POST["post"];

    if ($post == "") {
        echo "Post cannot be left empty, please enter text to post.";
        exit();
    }

    $query = "SELECT userID from Users";
    $result = $mysqli->query($query);

    /* check that the userID exists */
    $found = FALSE;
    if($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()){
            if($row["userID"] == $user){
                $found = TRUE;
            }
        }
    }
    if(!$found){
        echo "User ID was not found in the system so post was not created.";
        exit();
    }

    $query = "INSERT INTO Posts (content, authorID) VALUES ('" .$post. "','" .$user."')";
    /* check if the post was successful */
    if($result = $mysqli->query($query)){
        echo "The post was created successfully!";
        echo "<a style='font-size: 14pt;' href='../indexLab10.html'>Home</a>";
    }
    else {
        echo "Post unsuccessful, please try again.";
        echo "<a style='font-size: 14pt;' href='../indexLab10.html'>Home</a>";
    }
    $mysqli.close();
    ?>
