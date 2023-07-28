<?php      
    include('connection.php');  
    $username = $_POST['user'];  
    $password = $_POST['pass'];
    $passwordc = $_POST['pass_c'];
    $phone_n = $_POST['phone_n'];
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);
        $phone_n = stripcslashes($phone_n);
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
        $phone_n = mysqli_real_escape_string($con, $phone_n);  
        
        //validation
        $sql = "select *from signup where username = '$username'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);
          
        if($count == 1){
            echo "<h1> This username is already taken </h1>";
        }  
        else{  
            if($password != $passwordc){
                echo "<h1> Passwords does not match</h1>";
            }
            else{
                $sql2 = "insert into signup (username, password, Phone_Num) VALUES ('{$username}', '{$password}', '{$phone_n}')";
                if (mysqli_query($con, $sql2)) {
                    header("location: http://localhost/gamics-master");
                  } else {
                    
                  }
                
            } 
        }
        
             
?>  