<?php

final class TextInput extends Input {
    
    public function validate() {
      if ($this->_options["required"]) {
        if ($this->_initVal === null || $this->_initVal === "") {
          $this->_error = "Field must not be empty.";
          return false;
        }
      }
      if ($this->_options["min"]) {
        if (strlen($this->_initVal) < $this->_options["min"]) {
          $this->_error = "Must be at lest {$this->_options["min"]} characters.";
          return false;
        }
      }
      return true;
    }

    public function _renderSetting() {
    }

    public function _render() {
      echo "<input type='text' id='{$this->_name}' name='{$this->_name}' value='{$this->getValue()}'>";
    }
}
