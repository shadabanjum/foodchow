<?php
namespace App\Fields;

use TypeRocket\Elements\Fields\Field;
use \TypeRocket\Elements\Traits\OptionsTrait;
use \TypeRocket\Elements\Fields\ScriptField;
use TypeRocket\Elements\Traits\ControlsSetting;
use TypeRocket\Elements\Traits\DefaultSetting;
use TypeRocket\Elements\Fields\Select;
use TypeRocket\Html\Generator;

class FontIcons extends Field implements ScriptField
{

    use OptionsTrait, DefaultSetting, ControlsSetting;

    protected function init() {
        $this->setType( 'timepicker' );
    }

    public function getString() {
        
        $form = $this->getForm();

        $output = '<div class="typerocket-fonticonpicker">';

        $output .= ( new Select( $this->getName(), $this->getAttributes(), $this->getSettings(), $form ) )
                    ->setOptions( $this->getOptions())
                    ->getString();

        $output .= '</div>';

        return $output;
        //return $input->newInput( 'text', $name, esc_attr($value), $this->getAttributes() )->getString();

    }

    /**
     * Get the scripts
     */
    public function enqueueScripts() {
        
        wp_register_script( 'fonticonpicker', foodchow_PLUGIN_URL . '/assets/js/jquery.fonticonpicker.min.js', ['jquery'], '2.0', true );
        wp_enqueue_style( 'fonticonpicker', foodchow_PLUGIN_URL . '/assets/css/jquery.fonticonpicker.css');
        
        wp_enqueue_script( array('fonticonpicker' ) );
    }

}