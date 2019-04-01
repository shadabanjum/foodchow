<?php
namespace WebinaneForms\Includes;


class Forms {

	function register() {

		$type = tr_post_type('Forms')->setIcon('table')->setAdminOnly()->setArgument('supports', array('title'));
		$type->setArgument('labels', $this->labels());
		$typeBox = tr_meta_box('Forms')->setCallback( array( $this, 'metaFields' ) );
		$type->apply($typeBox);

		add_action( 'admin_print_scripts-post.php', [ $this, 'enqueue' ] );
		add_action( 'admin_print_scripts-post-new.php', [ $this, 'enqueue' ] );

		//add_action( 'publish_forms', [ $this, 'save' ] );
		//vc_editor_set_post_types( array('page' ) );
	}
	/**
	 * [labels description]
	 *
	 * @return [array]  [Array of translated labels]
	 */
	function labels() {


		return array(

			'name'               => _x( 'Form', 'post type general name', 'webinane-forms' ),
			'singular_name'      => _x( 'Form', 'post type singular name', 'webinane-forms' ),
			'menu_name'          => _x( 'Form', 'admin menu', 'webinane-forms' ),
			'name_admin_bar'     => _x( 'Form', 'add new on admin bar', 'webinane-forms' ),
			'add_new'            => _x( 'Add New', 'Form', 'webinane-forms' ),
			'add_new_item'       => __( 'Add New Form', 'webinane-forms' ),
			'new_item'           => __( 'New Form', 'webinane-forms' ),
			'edit_item'          => __( 'Edit Form', 'webinane-forms' ),
			'view_item'          => __( 'View Form', 'webinane-forms' ),
			'all_items'          => __( 'All Forms', 'webinane-forms' ),
			'search_items'       => __( 'Search Form', 'webinane-forms' ),
			'parent_item_colon'  => __( 'Parent Form:', 'webinane-forms' ),
			'not_found'          => __( 'No Form found.', 'webinane-forms' ),
			'not_found_in_trash' => __( 'No Form found in Trash.', 'webinane-forms' )

		);

	}

	/**
	 * [metaFields description]
	 *
	 * @return [repeater]  	[Group Field]
	 */
	function metaFields() {

		$form = tr_form();
		
		$form->setGroup( WIFORM_META_KEY );
		$label = [
				esc_html__('Placeholder', 'webinane-forms')		=> 'placeholder',
			    esc_html__('Label',  'webinane-forms')    		=> 'label',
			    
			];

		echo $form->text('reciever_email')->setLabel( esc_html__( 'Reciever Email Address', 'webinane-forms' ) );
		echo $form->text('Subject')->setLabel( esc_html__( 'Subject', 'webinane-forms' ) );
		echo $form->textarea('Success Message')->setLabel( esc_html__( 'Success Message', 'webinane-forms' ) );
	/*	echo $form->text('button_label')->setLabel( esc_html__( 'Button Label', 'webinane-forms' ) );
		echo $form->text('button_class')->setLabel( esc_html__( 'Button Class', 'webinane-forms' ) );*/
		echo  ( new \App\Fields\RadioInline('place_label', array(), array(), $form ) )
				 ->setLabel( esc_html__( 'Placeholder | Label', 'webinane-forms' ) )
	             ->setSetting('default', 'placeholder')->setOptions($label)
	             ->setInline()
	             ->setHelp(  esc_html__( 'Select whether to show label or placeholder instead of label.' ) ),
		// Render Email template fields.
		$this->emailTemplate( $form );

		$options = [
		    'Field Type' => [
		        esc_html__('Text Input', 'webinane-forms')   	=> 'text',
		        esc_html__('Password', 'webinane-forms')     	=> 'pwswd',
		        esc_html__('URL', 'webinane-forms')          	=> 'url',
		        esc_html__('Dropdown', 'webinane-forms')     	=> 'dropdown',
		        esc_html__('Textarea', 'webinane-forms')     	=> 'textarea', 
		        esc_html__( 'Date Picker', 'webinane-forms' )	=> 'date',
		    ]
		];
		$options2 = [
		        '3'    => 'col-md-3',
		        '4'    => 'col-md-4',
		        '5'    => 'col-md-5',
		        '6'    => 'col-md-6',
		        '7'    => 'col-md-7',
		        '8'    => 'col-md-8',
		        '9'    => 'col-md-9',
		        '10'   => 'col-md-10',
		        '11'   => 'col-md-11',
		        '12'   => 'col-md-12',
		       
		    
		];
		$validation = [
			 'Field Type' => [
					esc_html__('Select Validation', 'webinane-forms')  		=> '',
					esc_html__('Required', 'webinane-forms')  				=> 'required',
				    esc_html__('Email',  'webinane-forms')    				=> 'email',
				    esc_html__('URL',    'webinane-forms')    				=> 'url',
				    esc_html__('Size',    'webinane-forms')   				=> 'size',
				    esc_html__('Maximum', 'webinane-forms')   				=> 'max',
				    esc_html__('Minimum', 'webinane-forms')   				=> 'min',  
				]
			];
		$repeater = $form->repeater('Form Fields')->contracted()->setFields([
	        $form->select('Field Type')
	             ->setOptions($options)
	             ->setLabel( esc_html__( 'Field Type', 'webinane-forms' ) )
	             ->setHelp( esc_html__('Select field type which you want to show in form.', 'webinane-forms')),

	        $form->text('Field Name')
	         	 ->setLabel( esc_html__( 'Field Name', 'webinane-forms' ) )
	             ->setHelp( esc_html__('Enter Field name.', 'webinane-forms')),

	        $form->text('placeholder')
	        	 ->setLabel( esc_html__( 'Field Placeholder | Label', 'webinane-forms' ) )
	        	 ->setHelp( esc_html__('Enter Field label or placeholder which you want to show.', 'webinane-forms')),

	        $form->text('class_attribute')->setLabel( esc_html__( 'Class Attributes', 'webinane-forms' ) ),	   
	        
	        ( new \App\Fields\RadioInline('grid_setting', array(), array(), $form ) )
	             ->setSetting('default', 'col-md-12')->setOptions($options2)
	             ->setLabel( esc_html__( 'Grid Setting', 'webinane-forms' ) )
	             ->setInline()
	             ->setHelp( sprintf( esc_html__( 'Select Grid setting , you can get help for grid setting from %s.', 'webinane-forms' ), '<a href="https://s3.amazonaws.com/webinane/help/lg_grid.jpg" target="_blank">There</a>' )  ),

	        $form->select('validation')->multiple()
	        	 ->setLabel( esc_html__( 'Field Validation', 'webinane-forms' ) )
	        	 ->setOptions($validation)->setSetting('default', 'required')
	        	 //->setDepend( 'wiforms_settings.field_type', 'dropdown' )
	        	 ->setHelp( esc_html__('Select field validation options, you can select multipule options at a time.', 'webinane-forms')),
	             
		    
		    $form->items( esc_html__( 'Options', 'webinane-forms' ) )
		    	 ->setName('options')
		    	 ->setDepend( 'wiforms_settings.field_type', 'dropdown' ),
	    ]);
	   
		//echo $repeater;


		echo $form->hidden('form builder data')->setAttribute( 'id', 'form-builder-hidden-data' );

		echo '<div class="build-wrap"></div>';

		

	}


	function emailTemplate( $form ) {

		global $wp_filesystem;

		$help = __('You can use the following placeholders to create email template<br>
					<pre>{{loop_start}}</pre> : This placeholder is used before form fields<br>
					<pre>{{loop_end}}</pre> : This placeholder is used after form fields<br>
					<pre>{{field_label}}</pre> : To show the field label/placeholder in Email<br>
					<pre>{{field_value}}</pre> : To show submitted form field value in email<br>
					', 'webinane-forms');


		$sample = '';

		$creds = request_filesystem_credentials(site_url() . '/wp-admin/', '', false, false, array());

		/* initialize the API */
		if ( ! WP_Filesystem($creds) ) {
			/* any problems and we exit */
			//return false;
		}

		if ( is_object( $wp_filesystem ) ) {

			$sample = $wp_filesystem->get_contents( WIFORMS_PLUGIN_PATH . 'templates/email.php' );
		}

		echo $form->wpEditor( esc_html__( 'Email Templates', 'webinane-forms') )
				->setName('email_templates')
				->setHelp( $help )
				->setDefault( $sample );

	}

	function enqueue() {

		global $post_type;

		if ( 'forms' === $post_type ) {
			wp_enqueue_script( array( 'jquery-ui-sortable' ) );
			//wp_enqueue_script( 'form-builder-vendors', WIFORMS_PLUGIN_URL . 'assets/form-builder/vendor.js', '', '', true );
			wp_enqueue_script( 'form-builder', WIFORMS_PLUGIN_URL . 'assets/form-builder/form-builder.min.js', '', '', true );
			wp_enqueue_script( 'form-builder-render', WIFORMS_PLUGIN_URL . 'assets/form-builder/form-render.min.js', '', '', true );
			wp_enqueue_script( 'rateyo', 'https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.1/jquery.rateyo.min.js', '', '', true );
			wp_enqueue_script( 'webinane-forms', WIFORMS_PLUGIN_URL . 'assets/js/webinane-forms.js', '', '', true );
			wp_enqueue_style( 'form-builder', WIFORMS_PLUGIN_URL . 'assets/form-builder/form-builder.css' );
		}
	}

	function save( $post_id, $post = '' ) {
		print_r($_POST);exit;
	}
}