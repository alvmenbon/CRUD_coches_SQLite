<?php

class MiBD extends SQLite3{
    function __construct()
    {
        $this->open('coches_crud.db');
    }

}

$db = new MiBD();
if(isset($db)){
    echo "La base de datos funciona";
}








/*session_start();

$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'crud_coches'
);

/*if (isset($conn)){

    echo'db is connect';
}*/



?>