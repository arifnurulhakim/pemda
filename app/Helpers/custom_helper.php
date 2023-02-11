<?php 

function countData($table)
{
    $db = \Config\Database::connect();
    return $db->table($table)->countAllResults();
    
}

function countDataById($table)
{
    $db = \Config\Database::connect();
    return $db->table($table)->countAllResults();
    
}
?>