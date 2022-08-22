<?php
   require 'credential.php';

class Db
 {
  
    public $host;
    public $dbname;
    public $username;
    public $password;
    public $dbco;

    public static $db;
    // Db::$db;
    // Db::singleton();

public static function singleton()
{
    if(!self::$db){
        // Creation de Db + connect
        self::$db = new Db();
        self::$db -> connect(HOSTNAME,NAME,PASSWORD,BDD);
    }

 return self::$db;
}



  public function connect($set_host,$set_username,$set_password,$set_database) {
    $this ->host = $set_host;
    $this ->username = $set_username;
    $this ->password = $set_password;
    $this ->dbname = $set_database;
try{
   $this -> dbco = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", "$this->username", "$this->password");
   $this -> dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
}
}


public function create($table,$fields=array(),$values=array()){

$str_fields = implode(",",$fields);
$value = [];

foreach ($fields as $field){
    array_push($value,":".$field);
}
$str_fields2 = implode(",",$value);
$keys_values = array_combine($value,$values);

try{
   
    $prep = $this -> dbco ->prepare("
            INSERT INTO
            $table($str_fields)
            VALUES ($str_fields2)
                                   ");

        $prep -> execute($keys_values);
        echo'<pre>';
        print_r($prep);
        echo'</pre>';
echo 'info bien enregistré';
}
catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
}
}


public function select_sql($sql){
    // Selection un seul enregistrement par ID prendre la table Paramètre,($table,$field,$id)
    try{

    $sth = $this->dbco->prepare("$sql");

    $sth -> execute();

    $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);

    return $resultat;


    
    }
    catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
    }
}




public function selectOne($table,$field,$value){
    // Selection un seul enregistrement par ID prendre la table Paramètre,($table,$field,$id)
    try{

    $sth = $this->dbco->prepare("SELECT * FROM $table WHERE $field ='$value' ");

    $sth -> execute();


    $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);

    if (count($resultat) == 0)
    return;
    else
    return $resultat[0];

    echo "<br><pre>";
    print_r($resultat);
    echo "</pre>";

    }
    catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
    }
}

public function selectAll($table){
    // Selection un seul enregistrement par ID prendre la table Paramètre,($table,$field,$id)
    try{

    $sth = $this->dbco->prepare("SELECT * FROM $table");

    $sth -> execute();


    $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);

    if (count($resultat) == 0)
    return;
    else
    return $resultat;

    echo "<br><pre>";
    print_r($resultat);
    echo "</pre>";

    }
    catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
    }
}


public function delete($table,$field,$value){
    // Selection un seul enregistrement par ID prendre la table Paramètre,($table,$field,$id)
    try{
    $sth = $this->dbco->prepare("DELETE FROM $table WHERE $field = '$value' ");
    $sth -> execute();

    }
    catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
    }
}

public function update($table,$fields=array(),$values=array(),$id, $field_id){

    $update = [];
    
    foreach ($fields as $i => $field){
        array_push($update,$field."="."'".$values[$i]."'");
    }

try{

$sql = "UPDATE $table SET ".implode(",",$update)." WHERE $field_id = '$id'";  
echo $sql;
$sth = $this->dbco->prepare($sql);


$sth -> execute();

}
catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
}
}


}
?>