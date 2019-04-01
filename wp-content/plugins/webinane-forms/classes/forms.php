<?php

namespace WebinaneForms\Classes;

use \TypeRocket\Http\Request;
use \TypeRocket\Http\Response;


/**
 * The main form builder class.
 *
 * @package WordPress
 * @subpackage Webinane Form Builder
 * @author Shahbaz Ahmed <shahbazahmed9@hotmail.com>
 * @version 1.0
 */

if ( ! function_exists( 'add_action' ) ) {
	exit( 'Restricted' );
}

class Forms
{
	private $_hash;
	private static $_instance 	=	null;
	
	/**
	 * [init description]
	 *
	 * @return [type] [description]
	 */
	function init()	{
		
		add_shortcode( 'wiforms', array( $this, 'form' ) );

		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue' ] );

		add_filter( 'wiforms_post_meta', array( $this, 'formMeta' ), 10, 3 );

		add_action( 'wiforms_before_field_container', array( $this, 'before_container' ), 10, 2 );
		add_action( 'wiforms_after_field_container', array( $this, 'after_container' ), 10, 2 );

		//add_action( 'webinane_general_form_controller_wiforms/process/', array( $this, 'post' ) );
		add_action( 'after_setup_theme', [ $this, 'addReoute'] );
		//$this->route();
		tr_frontend();
	}
	

	function enqueue() {

		wp_register_script( 'sweetalert2', WIFORMS_PLUGIN_URL . 'assets/sweetalert2/dist/sweetalert2.min.js', '', '', true );
		wp_register_style( 'sweetalert2', WIFORMS_PLUGIN_URL . 'assets/sweetalert2/dist/sweetalert2.min.css' );
		wp_register_style( 'forms-jquery-ui', WIFORMS_PLUGIN_URL . 'assets/css/jquery-ui.min.css' );
		wp_register_style( 'forms-jquery-ui-theme', WIFORMS_PLUGIN_URL . 'assets/css/jquery-ui.theme.min.css' );
		wp_register_script( 'webinane-forms', WIFORMS_PLUGIN_URL . 'assets/js/webinane-forms-front.js', '', '', true );
		/*wp_register_script( 'form-builder-vendors', WIFORMS_PLUGIN_URL . 'assets/form-builder/vendor.js', '', '', true );
		wp_register_script( 'form-builder', WIFORMS_PLUGIN_URL . 'assets/form-builder/form-builder.min.js', '', '', true );
		wp_register_script( 'form-builder-render', WIFORMS_PLUGIN_URL . 'assets/form-builder/form-render.min.js', '', '', true );
		wp_register_script( 'rateyo', 'https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.1/jquery.rateyo.min.js', '', '', true );
		wp_register_script( 'webinane-forms', WIFORMS_PLUGIN_URL . 'assets/js/webinane-forms-front.js', '', '', true );
		wp_enqueue_style( 'form-builder', WIFORMS_PLUGIN_URL . 'assets/form-builder/form-builder.css' );*/
	}

	/**
	 * [form description]
	 *
	 * @param  string $atts    [description]
	 * @param  [type] $content [description]
	 * @return [type]          [description]
	 */
	function form( $atts = '', $content = null ) {

		extract( shortcode_atts( array(
			'id' => '',
			'type' => '',
		), $atts ) );
		
		if( !$id ) return;
		
		wp_enqueue_script( [ 'jquery-ui-datepicker', 'jquery-ui-sortable', 'sweetalert2', 'webinane-forms'] );
		wp_enqueue_style( [ 'forms-jquery-ui', 'forms-jquery-ui-theme', 'sweetalert2' ] );

		$this->form_type = ($type) ? $type : '';
		
		ob_start();

		$this->build( $id );

		return ob_get_clean();
		
	}
	
	/**
	 * [build description]
	 *
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	private function build( $id ) {
		
		// Get the meta from hooked value so we don't write duplicate code.
		$this->meta = apply_filters( 'wiforms_post_meta', $id, WIFORM_META_KEY, array() );

		$dn = new DotNotation( $this->meta );      


		$this->id = $id;

		$fields = $dn->get( 'form_builder_data' );
		
		if( !$fields ) return;

		$fields = json_decode( $fields, true );
		
		$this->fields = $fields;

		//$button_label = $dn->get( 'button_label' );
		//$button_label = ( $button_label ) ? $button_label : esc_html__( 'Submit', 'webinane-forms' );
		//$button_class = (webinaneforms_set($this->meta, 'button_class')) ? webinaneforms_set($this->meta, 'button_class') : 'submit';
		
		echo balanceTags($this->post());
		
		do_action( 'wiforms_before_form');
		$class = 'class="form-builder"';
		
		//$action = admin_url( 'admin-ajax.php' ).'?action=_df_ajax_callback&amp;subaction=magup_form_builder';
		
		$form = tr_form();
		$this->form = $form;
		$form->setSetting( 'render', 'raw' );
		$form->useAjax();

		echo $form->open( array( 'action' => esc_url( home_url( '/wiforms/process/' ) ) ) );

		echo '<div class="row typerocket-container">';

		foreach( $this->fields as $i => $field )
		{
			$dnf = new DotNotation( $field );
			$this->type = $dnf->get('type' );
			
			$this->build_field( $dnf );
		}

		echo '</div>';
		
		echo '<input type="hidden" name="form_id" value="'.$this->id.'" />';
		
		//echo $form->submit( $button_label )->setAttribute( 'class', $button_class );
		
		echo $form->close();
		
		do_action( 'wiforms_after_form' );

	}
	
	function build_field( $field, $label = true, $settings = array() ) {
		
		if ( ! $field->get('name' ) ) {
			return;
		}

		$show_label = ( webinaneforms_set( $this->meta, 'place_label' ) == 'label' ) ? true : false;

		$newfield = '';

		switch( $field->get( 'type' ) ) {
            
			case 'text':
				$newfield = $this->form->text( $field->get('name' ) );  
			break;

			case 'textarea':
				$newfield = $this->form->textarea( $field->get('name' ) );
				if ( $field->get('rows' ) ) {
					$newfield->setAttribute( 'rows', $field->get('rows' ) );
				}
			break;

			case 'checkbox':
				$newfield = $this->form->checkbox( $field->get('name' ) );  
			break;

			case 'select':
			case 'dropdown':
				$newfield = $this->form->select( $field->get( 'name' ) )->setOptions( array_flip( $this->buildOptions( $field ) ) );
			break;

			case 'radio':
				$newfield = $this->form->radio( $field->get( 'name' ) );  
			break;

			case 'date':
				$newfield = $this->form->date( $field->get( 'name' ) );
			break;

			case 'number':
				$newfield = $this->form->text( $field->get( 'name' ) )->setAttribute('type', 'number');
			break;

			case 'file':
				$newfield = $this->form->file( $field->get( 'name' ) );
			break;

			case 'hidden':
				$newfield = $this->form->hidden( $field->get( 'name' ) );
			break;

			case 'paragraph':
				$newfield = $this->form->date( $field->get( 'name' ) );
			break;

			case 'button':
				$newfield = $this->form->submit( $field->get('value'))->setSetting( 'value', $field->get('label'));
			
			break;
		}
		
		$class = $field->get( 'field_class', 'form-control' );
		$class = ( $class ) ? $class : 'form-control';


		if ( ! $newfield ) {
			return;
		}

		$newfield->setAttribute( 'class', $class );

		do_action( 'wiforms_before_field_container', $field, $newfield );

		if ( ( $placeholder = $field->get('placeholder' ) ) && ! $show_label ) {

			$newfield->setAttribute( 'placeholder', $placeholder );
		} else {

				do_action( 'wiforms_before_label', $field );
				
				echo '<label>' . $field->get('label') . '</label>';
				
				do_action ( 'wiforms_after_label', $field );

		}

		do_action( 'wiforms_before_field', $field, $newfield );
		
		echo $newfield;
		
		do_action( 'wiforms_after_field', $field, $newfield );

		do_action( 'wiforms_after_field_container', $field, $newfield );
	}
	
	function before_container( $field, $newfield ) {

		$grid_class = ( $field->get('dataGrid') ) ? 'col-lg-' . $field->get('dataGrid') : 'col-lg-12';

		echo '<div class="form-group control '.$grid_class.'">' . "\n";

	}

	function after_container( $field, $newfield ) {
		
		echo "\n" . '</div>' . "\n";
		
	}
	
	function post() {

		if(!$_POST) return;
		
		if( is_admin() ) {
			return;
		}

		( new Process )->process();

	}
	
	function buildOptions( $field ) {

		$options = $field->get('values');

		$new = [];

		foreach( $options as $opt ) {
			$new[ $opt['label'] ] = $opt['value'];
		}

		return $new;
	}

	function formMeta( $id, $key, $default ) {

		return (array) get_post_meta( $id, $key, true );
	}

	static public function get_instance() {
		if(is_null(self::$_instance)) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	function addReoute() {

		$protocol = is_ssl() ? 'https://' : 'http://';
		$base = str_replace( $protocol.$_SERVER['SERVER_NAME'], '', home_url( '/' ) );

		tr_route()->put( $base . 'wiforms/process', [ $this, 'post' ] );

	}
}
