<?php 
    //1. DB Connection open

    $conn = mysqli_connect('localhost','root','','ecom6_db') or die('Could not connect');
    //echo 'Hello from server';
   

    if( ( isset($_POST['action']) ) && ( $_POST['action'] == 'registrationdata' ) ){
        //echo 'Hello fro registration data';
        
        if( ($_FILES['photo']['type'] == 'image/png')  || ($_FILES['photo']['type'] == 'image/jpg') || ($_FILES['photo']['type'] == 'image/jpeg')){
            //echo '<pre>';
            //var_dump($_FILES);
            //echo '</pre>';
    
            //Always filter/sanitize the incomming data
            $fullname = mysqli_real_escape_string($conn,$_POST['fullname']);
            $photo = mysqli_real_escape_string($conn,$_FILES['photo']['name']);
    
            $rn = rand(10000,1000000);
    
            $photo = $rn.$photo;
    
            //Now Temproery Lcoation --> Permanent Locaton 'uplaods'
            // $_FILES['photo']['tmp_name'] -->> 'uploads/'
            $source = $_FILES['photo']['tmp_name'];
            $destination = './uploads/'.$photo;
    
            //move_uploaded_file(source, dest)
            move_uploaded_file($source,$destination);
    
            //2. Build the query
            $sql = "INSERT INTO users_tbl (`fullname`,`photo`) VALUES ('$fullname','$photo')";
    
            //3. Execute the query
            mysqli_query($conn,$sql) or die(mysqli_error($conn));
    
            //4. Display the result
            echo '1';
        }else{
            echo '406';
        }
       
    }

    if( ( isset($_POST['action']) ) && ( $_POST['action'] == 'productdata' ) ){
        echo 'Hello fro productdata data';
    }


    //5. DB Connection close
    mysqli_close($conn);
?>