<?php
try {
    $db= new PDO("mysql:host=localhost;port=4306;dbname=form;charset-utf8","root", "");
} 
catch (PDOException $e) {
    echo $e->getMessage();
}
?>