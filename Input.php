<?php

abstract class Input {
    protected $_name;
    protected $_label;
    protected $_initVal;
    protected $_error = "";

    protected $_options = array("required" => true);
    
    abstract public function validate();
    abstract protected function _renderSetting();
    abstract protected function _render();
    
    public function __construct($name, $label, $initVal = "", $options = array()) {
        $this->_name = $name;
        $this->_label = $label;
        $this->_initVal = $initVal;
        $this->_options = array_merge($this->_options, $options);
    }

    /**
     * returns the name of this input
     */
    public function name() {
        return $this->_name;
    }


    /**
     *  renders a row in the form for this input. All inputs have a label on the left, and an area on the right where the actual
     *  html form element is displayed (such as a text box, radio button, select, etc)
     */
    public function render() {
        echo "<li><label for='{$this->_name}'>{$this->_label}</label><div>";
        $this->_render();
        if (!empty($this->_error)) echo "<p class='error'>{$this->_error}</p>";
        echo "</div></li>";
    }

    /**
     * returns the current value managed by this input
     */
    public function getValue() {
        return $this->_initVal;
    }
}
