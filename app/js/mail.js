// Модуль авторизации
var mailModule = (function (){

	var init = function(){
		_submitForm();
	},
		_check_forms = function(){
			if($('#name').val()==='' || $('#mail').val()==='' || $('#captcha').val()===''){
				return false;
			} else {
				return true;
			}
		},
		_submitForm = function(){
			$('#form').on('submit', _submitAjax);
		},
		_show_error = function(){
			$('.error-msg').show();
		}
		_show_success = function(){
			$('.success-msg').show();
		}
		_submitAjax = function(e){
		e.preventDefault();
			if(_check_forms()){
	 		var url = 'actions/mail.php',
	 			form = $('#form'),
	 			data = form.serialize();
			 $.ajax({
		        type: 'POST',
		        url: url,
		        dataType : 'JSON',
		        data: data
		      })
		      .done(function(answer) {
				if(data.status==="NO"){
     		      		_show_error();		
		      		} else {
						_show_success();
		      		}
				})
		      .fail(function(answer) {
				  _show_error();
				});
		  	}
	    };  
		
	return {
		init: init
	};

})();
mailModule.init();