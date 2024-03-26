<?php

class Form {

    protected $_inputs = array();

    public function __construct() {
    }

    /**
     *  adds an input instance to the collection of inputs managed by this form object
     */
    public function addInput(Input $input) {
        $this->_inputs[$input->name()] = $input;
    }

    /**
     *  iterates over all inputs managed by this form and returns false if any of them don't validate
     */
    public function validate() {
        foreach ($this->_inputs as $input) {
            if (!$input->validate()) return false;
        }
        return true;
    }

    /**
     * returns the value of the input by $name
     */
    public function getValue($name) {
        if (!array_key_exists($name, $this->_inputs)) {
            throw new Error("ERR_INPUT_NOT_FOUND");
        }
        return $this->_inputs[$name]->getValue();
    }

    /**
     *  draws the outer form element, and the markup for each input, one input per row
     */
    public function display() {
        echo "<form method='post'><ol>";
        foreach ($this->_inputs as $input) $input->render();
        echo "<li><button type='submit'>Submit</button></li></ol></form>";
    }
}
