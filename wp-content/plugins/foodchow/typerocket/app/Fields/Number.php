<?php
namespace App\Fields;

use TypeRocket\Elements\Fields\Field;
use TypeRocket\Html\Generator;

class Number extends Field
{
    protected function init() {
        $this->setType( 'number' );
    }

    public function getString() {
        $generator = new Generator();
        $name = $this->getNameAttributeString();
        $value = (int) $this->getValue();
        $attr = $this->getAttributes();

        $input = $generator->newInput('number', $name, $value, $attr );
        return $input->getString();
    }
}