<?php
namespace App\Fields;

use TypeRocket\Elements\Fields\Field;
use \TypeRocket\Elements\Traits\OptionsTrait;
use \TypeRocket\Elements\Fields\ScriptField;
use TypeRocket\Elements\Traits\ControlsSetting;
use TypeRocket\Elements\Traits\DefaultSetting;
use TypeRocket\Html\Generator;

class TimePicker extends Field implements ScriptField
{

    use OptionsTrait, DefaultSetting, ControlsSetting;

    protected function init() {
        $this->setType( 'timepicker' );
    }

    public function getString() {
        
        $name       = $this->getNameAttributeString();
        $default    = $this->getSetting('default');
        $value      = $this->getValue();
        //$option     = $this->getOptions();

        $this->removeAttribute('name');
        $id = $this->getAttribute('id', '');
        $class_att = $this->getAttribute('class');

        if ( ! strstr( $class_att, 'tr-timepicker') ) {
            $class_att .= ' tr-timepicker';

            $this->setAttribute('class', $class_att); 
        }

        $this->removeAttribute('id');

        $generator = new Generator();

        if($id) {
            $id = "id=\"{$id}\"";
        }

        $input = new Generator();
        $name = $this->getNameAttributeString();
        $value = $this->getValue();
        $default = $this->getDefault();
        $value = !empty($value) ? $value : $default;
        $value = $this->sanitize($value, 'raw');
        $attributes = array_merge( $this->options, $this->getAttributes() );

        $this->setAttributes( $attributes );

        return $input->newInput( 'text', $name, esc_attr($value), $this->getAttributes() )->getString();

    }

    /**
     * Get the scripts
     */
    public function enqueueScripts() {
        
        wp_enqueue_script( 'typerocket-timepicker', foodchow_PLUGIN_URL . '/assets/js/jquery.timepicker.min.js', ['jquery'], '1.0', true );
        wp_enqueue_script( 'typerocket-timepicker-init', foodchow_PLUGIN_URL . '/assets/js/timepicker.init.js', ['typerocket-timepicker'], '1.0', true );
        wp_enqueue_style( 'typerocket-timepicker', foodchow_PLUGIN_URL . '/assets/css/jquery.timepicker.min.css');
    }
}