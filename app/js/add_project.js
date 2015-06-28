// Модуль добавления проекта
var addProject = (function (){

	var init = function(){
            $('#fileupload').fileupload({
                url: 'actions/upload.php',
                dataType: 'json',
                success: function(data){
                    $('#fileurl, #filename').val(data.name);
                }
            })


				_submitForm();
			},
			_check_forms = function(){
				/*if($('#login').val()==='' || $('#pass').val()===''){
					return false;
				} else {
					return true;
				}*/
				return true;
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
	 		var url = 'actions/add-project.php',
	 			form = $('#form'),
	 			data = form.serialize();
			 $.ajax({
		        type: 'POST',
		        url: url,
		        dataType : 'JSON',
		        data: data
		      })
		      .done(function(data) {
		      		if(data.status==="NO"){
     		      		_show_error();		
		      		} else {
						_show_success();
		      		}
				})
		      .fail(function(data) {
		      		_show_error();
				});
		  	}
	    };  
		
	return {
		init: init
	};

})();

addProject.init();