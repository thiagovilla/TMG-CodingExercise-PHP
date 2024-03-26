<?php

require_once(dirname(__FILE__) ."/Form.php");
require_once(dirname(__FILE__) ."/Input.php");
require_once(dirname(__FILE__) ."/TextInput.php");

$form = new Form();

$form->addInput(new TextInput("firstname", "First Name", $_POST["firstname"]));
$form->addInput(new TextInput("lastname", "Last Name", $_POST["lastname"]));

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($form->validate()) {
        // display user info
        $firstName = $form->getValue("firstname");
        $lastName = $form->getValue("lastname");
        echo $firstName." ".$lastName;
    } else {
        $form->display();
    }
} else {
    $form->display();
}
