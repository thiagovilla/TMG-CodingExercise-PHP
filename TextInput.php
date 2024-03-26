<?php

final class TextInput extends Input {
    
    public function validate() {
      if ($this->_options["required"]) {
        if ($this->_initVal === null || $this->_initVal === "") {
          $this->_error = "Field must not be empty.";
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
