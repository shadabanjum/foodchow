

(function($){

	$(document).ready(function(){

		var field_value = $('#form-builder-hidden-data').val();
		var formData = {};
		if ( field_value ) {
			formData = field_value;
		} 
		var $grid = {
	          'dataGrid': {
	            label: 'Grid',
	            options: {
	              '12': 'Full width',
	              '6': 'Two Columns',
	              '4': 'Three Columns',
	              '3' : 'Four Columns',
	            },
	          }
	        };

		var typeuser = {

	        text: $grid,
	        number: $grid,
	        autocomplete: $grid,
	        textarea: $grid,
	        select: $grid,
	        date: $grid,
	        file: $grid,
	        radio: $grid,
	        chekbox: $grid,
	        button: $grid,
	        paragraph: $grid,

	      };

		var fbOptions = {
		    subtypes: {
		      text: ['datetime-local']
		    },
		    onSave: function(e, formData) {
		      alert('test');
		      //window.sessionStorage.setItem('formData', JSON.stringify(formData));
		    },
		    stickyControls: {
		      enable: true
		    },
		    sortableControls: true,
		    typeUserAttrs: typeuser,
		    disableInjectedStyle: false,
		    
		    disabledActionButtons: ['save'],
		    disabledFieldButtons: {
		      text: ['copy']
		    },
		    editOnAdd: true,
		    fieldRemoveWarn: true
		    // controlPosition: 'left'
		    // disabledAttrs
		};

		if ( formData.length ) {
			fbOptions.formData = formData;
		}

		var formBuilder = $('.build-wrap').formBuilder(fbOptions);

		$('.submitbox').on('click', 'input[type=submit]', function(e){
			console.log(formBuilder.actions.getData());
			$('#form-builder-hidden-data').val(JSON.stringify( formBuilder.actions.getData()));
		});

	});

})(jQuery);