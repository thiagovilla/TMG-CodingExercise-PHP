<?php

final class TextInput extends Input {
    
    protected function _validate() {
      if ($this->_initVal === null || $this->_initVal === "") {
        array_push($this->_errors, "Field must not be empty.");
      }
    }

    public function _renderSetting() {
    }

    public function _render() {
      echo "<input type='text' id='{$this->_name}' value='{$this->getValue()}'>";
    }
}
