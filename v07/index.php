<?php
/**
 * Created by PhpStorm.
 * User: Zaniyar
 * Date: 27.10.2014
 * Time: 20:09
 */


require_once("model.php");

echo 'Starting...';


// Working with the table pattern
try {
    $dataTable = new PostTable();

    $record = $dataTable->findById(2);
    print_r($record);
    $record->title = 'Foo';
    $dataTable->update($record);
}
catch(PDOException $e){
    die($e->getMessage());
}

// Working with the row pattern
try {
    $record = PostRow::findById(2);
    $record->title = 'Barfuss';
    $record->content = <<<Moo
Example of string
spanning multiple lines
using heredoc syntax.
Moo;

    $record->insert();
    //$record->update();
}
catch(PDOException $e){
    die($e->getMessage());
}

echo 'Done';

?>