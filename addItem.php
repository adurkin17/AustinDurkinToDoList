<?php 
$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
$description = filter_input(INPUT_POST,  'description', FILTER_SANITIZE_STRING);

if($title && $description)
{
    require('database.php');
    $query = 'INSERT INTO todolist 
                (Title, Description) 
            VALUES 
                ( :title, :description )';

    $statement = $db->prepare($query);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':description', $description);
    $statement->execute();
    $statement->closeCursor();

   include('index.php');
}
include('index.php');
?>