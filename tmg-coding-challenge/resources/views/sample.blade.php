<?php

use TMG\Core\Form\Form;
use TMG\Core\Form\TextInput;

$form = new Form(csrf_token());

$form->addInput(new TextInput("firstname", "First Name", Request::post("firstname") ?? ""));
$form->addInput(new TextInput("lastname", "Last Name", Request::post("lastname") ?? ""));

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
