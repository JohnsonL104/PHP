<?php
  
    include(__DIR__ . '/db.php');
    
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

    function getPatient($postData){
        global$db;
        $stmt = $db->prepare("SELECT * FROM patients WHERE id = :id");
        $binds = array(
            ":id" => $postData['id']
        );
        
        if($stmt->execute($binds) && $stmt->rowCount() > 0){
            return($stmt->fetchAll(PDO::FETCH_ASSOC));
        }
        else{
            return false;
        }
    }
    function updatePatient($postData){
        global $db;
        $stmt = $db->prepare("UPDATE patients SET patientFirstName = :fName, patientLastName = :lName, patientMarried = :married, patientBirthDate = :bday WHERE id = :id");
        $binds = array(
            ":fName" => $postData['fName'],
            ":lName" => $postData['lName'],
            ":married" => $postData['married'],
            ":bday" => $postData['birthday'],
            ":id" => $postData['id']
        );
        if($stmt->execute($binds)){
            return(true);
        }
        else{
            return(false);
        }
    }

    function deletePatient($postData){
        global $db;
        $stmt = $db->prepare("DELETE FROM patients WHERE id = :id");

        $binds = array(
            ":id" => $postData['id']
        );

        if($stmt->execute($binds)){
            return(true);
        }
        else{
            return(false);
        }
    }

?>
