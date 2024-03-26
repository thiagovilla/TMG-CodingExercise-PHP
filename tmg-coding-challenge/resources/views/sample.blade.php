<?php

use TMG\Core\Form\Form;
use TMG\Core\Form\TextInput;

$form = new Form();

$form->addInput(new TextInput("firstname", "First Name"));
$form->addInput(new TextInput("lastname", "Last Name"));

if (Request::isMethod("POST")) {
    $form->setValue("firstname", Request::post("firstname"));
    $form->setValue("lastname", Request::post("lastname"));

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
