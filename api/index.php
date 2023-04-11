<?php 
    $servername = "mysql:3306";
    $username = "teste";
    $password="teste";
    $conn = new mysqli($servername, $username, $password);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $case = isset($_POST['case']) ? $_POST['case'] : 'listar';
    $fname = isset($_POST['fname']) ? $_POST['fname'] : '';
    $id =   isset($_POST['id']) ? $_POST['fname'] : '';  

    switch ($case){ 

        case 'listar':     
            $sql="SELECT * FROM test.users ORDER BY id ASC";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_array($result)){                
                    
                    $dados[] = Array(                
                        'id'=> $row["id"],
                        'name'=> $row["name"],                    
                    );     
                }
                $json = Array('status'=>true,'data'=> $dados);
                print json_encode($json);
            } else {
                $json = Array('status'=>false,'data'=> $dados);
                print json_encode($json);
            }
            $conn->close();
                 
        break;

        case 'cadastro':
            
            $sql = "INSERT INTO test.users (name) VALUES ('".$fname."')";
            
            if ($conn->query($sql) === TRUE) {
              $result = "New record created successfully";
            } else {
                $result =  "Error: " . $sql . "<br>" . $conn->error;
            }            
            $conn->close();
            
            $json = $result;
            print json_encode($json); 
        break;
 
        case 'deletar' :
            $json = "deletado";
            print json_encode($json); 
        break;
    }  
 

?>