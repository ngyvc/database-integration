<?php 
//First load the DB connection
require_once("db_connect.php");

//This will show errors in the browser if there are some
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($db_connect) {
    // SQL query
    // $sql = "???";
    $sql = "SELECT * FROM demo_table";

    // Array to translate to json
    $rArray = array();

    if ($stmt = $db_connect->prepare($sql)) {
        //Prepare input
        /* ??? HERE Collect the data from the HTML form using $_REQUEST[] */
        //Here it is important to follow the order in the bind_param, be careful to not change things
        // $stmt->bind_param(/* ??? */);//Here put the code to setup the bind_param

        //Prepare output
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id, $field1, $field2, $field3); //Here put the code to setup the bind_result

        //Collect results
        while($stmt->fetch()) {
            $rArray[] = [
                // write your own output array
                // "id" => $id,
                // "field1" => $field1,
                // "field2" => $field2,
                // "field3" => $field3,
            ];
        }
                
        $stmt->close();        
   
    }
    else {
        //Inform user if error
        $rArray[] = [
            "error"=>"No execute statement. Query Error - Double check your query and inputs"
        ];
    }

    $db_connect->close();
}
else {
    //Inform user if error
    $rArray[] = [
        "error"=> "Connection Error: " . mysqli_connect_error(),
    ];
}

echo json_encode($rArray);

?>