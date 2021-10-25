<?php
  
    include(__DIR__ . '\db.php');
    global $db;
    function getTable(){
        $stmt = $db->prepare("SELECT * FROM patients");

        if($stmt->execute() && $stmt->rowCount() > 0){
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return($results);
    }

?>
