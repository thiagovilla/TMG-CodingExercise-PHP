<?php

namespace TMG\Core\Form;
abstract class Input {
    protected string $_name;
    protected string $_label;
    protected string $_initVal;
    protected string $_value;

    protected array $_errors = array();

    abstract protected function _renderSetting();
    abstract protected function _render();
    abstract protected function _validate();

    public function __construct($name, $label, $initVal = "") {
        $this->_name = $name;
        $this->_label = $label;
        $this->_initVal = $initVal;
        $this->_value = $this->_initVal;
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
        echo "<li><label for='{$this->_name}'>{$this->_label}</label>";
        $this->_render();
        if (count($this->_errors) > 0) {
            echo "<ul class='errors'>".array_reduce($this->_errors, fn($list, $item) => $list .= "<li>{$item}</li>", "")."</ul>";
        }
        echo "</li>";
    }

    /**
     * returns the current value managed by this input
     */
    public function getValue() {
        return $this->_value;
    }

    /**
     * sets the current value managed by this input
     */
    public function setValue($value) {
        $this->_value = $value;
    }

    /**
     * validates the current input value
     */
    public function validate() {
        $this->_validate();

        return count($this->_errors) < 1;
    }
}
