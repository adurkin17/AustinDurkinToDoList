<?php
require('database.php');


$query = 'SELECT * FROM todolist ORDER BY ItemNum' ;

$statement = $db->prepare($query);
$statement->execute();
$todolists = $statement->fetchAll();
$statement->closeCursor(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <header><h1>To-Do List</h1></header>
    <main>

    <?php 
    if(!empty($todolists)) { ?>
        <section>
            <?php foreach ($todolists as $todo) : ?>
            <P><?php echo $todo["Title"];?></p>
            <p> <?php echo $todo["Description"];?> </p>
        <?php endforeach; ?>
        </section>
        
    <?php } else{ ?>
    <p> Nothing to do </p>
    <?php } ?>
        <form action = "addItem.php" method "POST" >
        <input type = "text" id = "title" name = "Title">
        <input type = "text" id = "desctiption" name = "Description">
        <button type = "submit">Enter!</button>
        </form>
    </main>
</body>
</html>