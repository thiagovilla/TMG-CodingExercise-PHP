<?php

namespace TMG\Core\Form;

final class TextInput extends Input {
    
    public function validate() {
      return $this->getValue() !== "";
    }

    public function _renderSetting() {
    }

    public function _render() {
      echo "<input type='text' name='{$this->_name}' value='{$this->getValue()}' required>";
    }
}
