<?php
namespace App\Fields;

use TypeRocket\Elements\Fields\Field;
use \TypeRocket\Elements\Traits\OptionsTrait;
use TypeRocket\Html\Generator;

class ImageSelect extends Field
{

    use OptionsTrait;

    protected function init() {
        $this->setType( 'imageSelect' );
    }

    public function getString() {
        
        $name    = $this->getNameAttributeString();
        $default = $this->getSetting('default');
        $option  = $this->getValue();
        $option     = ! is_null($option) ? $this->getValue() : $default;
        $this->removeAttribute('name');
        $id = $this->getAttribute('id', '');
        $this->removeAttribute('id');
        $generator = new Generator();

        if($id) {
            $id = "id=\"{$id}\"";
        }

        $field = "<ul class=\"data-full image-select radio-inline\" {$id}>";

        foreach ($this->options as $key => $value) {
            if ( $option == $value && isset($option) ) {
                $this->setAttribute('checked', 'checked');
            } else {
                $this->removeAttribute('checked');
            }

            $field .= "<li><label>";
            $img = '<img src="'.$key.'">';
            $field .= $generator->newInput( 'radio', $name, $value, $this->getAttributes() )->getString();
            $field .= "<span>{$img}</span></label>";
        }

        $field .= '</ul>';

        return $field;
    }
}