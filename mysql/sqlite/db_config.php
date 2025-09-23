<?php

try {
    $db = new PDO("sqlite:db.sqlite", "", "", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);
} catch (PDOException $ex) {
    echo $ex->getMessage();
}

// $db->query("
//  create table patients(
//    id integer primary key autoincrement,
//    name text not null,
//    age integer,
//    mobile text
//  );
// ");


// $db->query("
//    insert into patients values
//    (null , 'Hamja', 25, 01721),
//    (null , 'Hasan', 20, 01721),
//    (null , 'Masum', 15, 01721),
//    (null , 'Nasir', 10, 01721),
//    (null , 'Fatema', 19, 01721),
//    (null , 'Hasin', 18, 01721),
//    (null , 'Mahfuz', 21, 01721);
// ");


$data = $db->query("select * from patients");

print_r($data->fetchAll());
