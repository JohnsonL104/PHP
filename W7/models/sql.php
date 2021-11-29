<?php
  
    include(__DIR__ . '/db.php');
    
    function checkLogin($username, $password){
        global $db;
        $stmt = $db->prepare("SELECT user_id FROM users WHERE username = :username AND user_pass = :password");
        $binds = array(
            ":username" => $username,
            ":password" => $password
        );
        if($stmt->execute($binds) && $stmt->rowCount() > 0){
            return($stmt->fetchAll(PDO::FETCH_ASSOC));
        }
        else{
            return(false);
        }
    }
    function insertSchoolsFromFile ($fname) {
        global $db;
        $i = 0;
       
        if (!file_exists($fname)) return false;

        deleteAllSchools();
        $file = fopen ($fname, 'rb');
        // ignore first line
        $row = fgetcsv($file);
        
        while (!feof($file) && $i++ < 10000) {
            $row = fgetcsv($file);
            $school = str_replace("'", "''", htmlspecialchars ($row[0]));
            $city = str_replace("'", "''", htmlspecialchars ($row[1]));
            $state = str_replace("'", "''", htmlspecialchars ($row[2]));

            $sql[] = "('" . $school . "' , '" . $city . "' , '" . $state. "')";
            // 1,000 records at a time
            if ($i % 1000 == 0) {
                $db->query('INSERT INTO schools (schoolName, schoolCity, schoolState) VALUES '.implode(',', $sql));
                $sql = array();
            }
        }
        if (count($sql)) {
            $db->query('INSERT INTO schools (schoolName, schoolCity, schoolState) VALUES '.implode(',', $sql));
        }

        return(true);
      }
      function deleteAllSchools () {
        global $db;
        
        $stmt = $db->query("DELETE FROM schools;");
        return 0;
    }
    function searchPatients ($fname, $lname, $married) {
        global $db;
        
        $binds = array();
        $sql = "SELECT * FROM patients WHERE 0=0 ";
        if ($fname != "") {
             $sql .= " AND patientFirstName LIKE :fname";
             $binds[':fname'] = '%'.$fname.'%';
        }
       
        if ($lname != "") {
            $sql .= " AND patientLastName LIKE :lname";
            $binds[':lname'] = '%'.$lname.'%';
        }
        if ($married != "") {
            $sql .= " AND patientMarried = :married";
            $binds[':married'] = $married;

        }
        $stmt = $db->prepare($sql);
         $results = array();
         if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
             $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
         }
         return ($results);
    }
?>
