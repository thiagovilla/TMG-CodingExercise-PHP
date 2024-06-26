<?php
    require_once("Form.php");
    require_once("Input.php");
    require_once("TextInput.php");

    $form = new Form();

    $form->addInput(new TextInput("firstname", "First Name", key_exists("firstname", $_POST) ? $_POST["firstname"] : ""));
    $form->addInput(new TextInput("lastname", "Last Name", key_exists("lastname", $_POST) ? $_POST["lastname"] : ""));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css"> 
    <title>TMG PHP Coding Exercise</title>
</head>
<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if ($form->validate()) {
                // display user info
                $firstName = $form->getValue("firstname");
                $lastName = $form->getValue("lastname");
                echo "<div class='hello'>{$firstName} {$lastName}</div>";
            } else {
                $form->display();
            }
        } else {
            $form->display();
        }
    ?>
</body>
</html>
