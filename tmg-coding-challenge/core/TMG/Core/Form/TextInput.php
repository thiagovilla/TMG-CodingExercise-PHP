<?php

namespace TMG\Core\Form;

final class TextInput extends Input {
    
    protected function _validate() {
      if ($this->_value === null || $this->_value === "") {
        array_push($this->_errors, "Field must not be empty.");
      }
    }

    public function _renderSetting() {
    }

    public function _render() {
      echo "<input type='text' name='{$this->_name}' value='{$this->getValue()}'>";
    }
}
