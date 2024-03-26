<?php

use TMG\Core\Form\Form;
use TMG\Core\Form\TextInput;

$form = new Form();

$form->addInput(new TextInput("firstname", "First Name", "Bruce"));
$form->addInput(new TextInput("lastname", "Last Name", "Wayne"));

if (Request::isMethod("POST")) {
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
