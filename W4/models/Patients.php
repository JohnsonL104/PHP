<?php
  
    include(__DIR__ . '\db.php');
    
    function getTable(){
        global $db;
        $stmt = $db->prepare("SELECT * FROM patients");

        if($stmt->execute() && $stmt->rowCount() > 0){
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return($results);
    }

    function addPatient($postData){
        global $db;
        var_dump($postData);
        $stmt = $db->prepare("INSERT INTO patients (patientFirstName, patientLastName, patientMarried, patientBirthDate) VALUES (:fname, :lname, :married, :dob)");
        $binds = array(
            ":fname" => $postData['fName'],
            ":lname" => $postData['lName'],
            ":married" => $postData['married'],
            ":dob" => $postData['birthday']
        );


        if($stmt->execute($binds)){
            return true;
        }
        else{
            return false;
        }
    }

?>
