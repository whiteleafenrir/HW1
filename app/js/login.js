// Модуль авторизации
var loginModule = (function (){

	var init = function(){
		_submitForm();
	},
		_check_forms = function(){
			if($('#login').val()==='' || $('#pass').val()===''){
				return false;
			} else {
				return true;
			}
		},
		_submitForm = function(){
			$('#form').on('submit', _submitAjax);
		},
		_submitAjax = function(e){
		e.preventDefault();
			if(_check_forms()){
	 		var url = 'actions/auth.php',
	 			form = $('#form'),
	 			data = form.serialize();
			 $.ajax({
		        type: 'POST',
		        url: url,
		        dataType : 'JSON',
		        data: data
		      })
		      .done(function(data) {
				    window.location.href = '/';
				})
		      .fail(function(data) {
				  alert( data.mes );
				});
		  	}
	    };  
		
	return {
		init: init
	};

})();

loginModule.init();