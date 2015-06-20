$(document).ready(function(){

	if ($('.popup').length) {

		Popups.init()
	}

	$('#form').on('submit', function(e){
		e.preventDefault();

		var
			$this = $(this);

		if (validateThis($this)) {

			postFormData($this, function(data){
				var
					reqPopup = data.status ? '#success' : '#error';

				Popups.open(reqPopup);
			});
		}

	});

}); // - > ready_end;

var Popups = (function() {

    var
	    popups = $('.popup');

	function _close(){
		popups.hide();
	}

    return {
	    
	    init : function(){
		    $('.popup__close, .popup__overlay').on('click', function(e){
			    e.preventDefault();

			    _close();
		    });
	    },

	    open: function(id) {
		    var
			    reqPopup = popups.filter(id);

		    _close();

		    reqPopup.fadeIn(300);
	    }
    }
}());

function postFormData(form, successCallback) {
	var
		host        = form.attr('action'),
		reqFields   = form.find('[name]'),
		dataObject  = {};

	reqFields.each(function(){
		var
			$this = $(this),
			value = $this.val(),
			name  = $this.attr('name');

		dataObject[name] = value;
	});

	$.post(host, dataObject, successCallback);
}


/* --------- валидация --------- */

function validateThis(form) {

	var
		questionType = form.find("[data-validation='question']"),
		nameType = form.find("[data-validation='name']"),
		mailType = form.find("[data-validation='mail']"),
		titleType = form.find("[data-validation='title']"),
		urlType = form.find("[data-validation='url']"),
		imgType = form.find("[data-validation='img']"),
		textType = form.find("[data-validation='text']"),
		loginType = form.find("[data-validation='login']"),
		passType = form.find("[data-validation='pass']"),
		isValid = false;
	loginType.each(function(){

		var
			$this = $(this),
			notEmptyField = !!$this.val();

		if (notEmptyField) {
			isValid = true;
		} else {
			$this.addClass('error_bg');
			$this.tooltip({
				content: 'Введите логин',
				position: 'left'
			});

			isValid = false;
		}
	});
	passType.each(function(){

		var
			$this = $(this),
			notEmptyField = !!$this.val();

		if (notEmptyField) {
			isValid = true;
		} else {
			$this.addClass('error_bg');
			$this.tooltip({
				content: 'Введите пароль',
				position: 'left'
			});

			isValid = false;
		}
	});
	textType.each(function(){

		var
			$this = $(this),
			notEmptyField = !!$this.val();

		if (notEmptyField) {
			isValid = true;
		} else {
			$this.addClass('error_bg');
			$this.tooltip({
				content: 'Описание проекта',
				position: 'left'
			});

			isValid = false;
		}
	});
	imgType.each(function(){

		var
			$this = $(this),
			notEmptyField = !!$this.val();

		if (notEmptyField) {
			isValid = true;
		} else {
			$this.addClass('error_bg');
			$this.tooltip({
				content: 'Изображение',
				position: 'left'
			});

			isValid = false;
		}
	});
	urlType.each(function(){

		var
			$this = $(this),
			notEmptyField = !!$this.val();

		if (notEmptyField) {
			isValid = true;
		} else {
			$this.addClass('error_bg');
			$this.tooltip({
				content: 'Ссылка на проект',
				position: 'left'
			});

			isValid = false;
		}
	});
	titleType.each(function(){

		var
			$this = $(this),
			notEmptyField = !!$this.val();

		if (notEmptyField) {
			isValid = true;
		} else {
			$this.addClass('error_bg');
			$this.tooltip({
				content: 'Введите название',
				position: 'left'
			});

			isValid = false;
		}
	});
	questionType.each(function(){

		var
			$this = $(this),
			notEmptyField = !!$this.val();

		if (notEmptyField) {
			isValid = true;
		} else {
			$this.addClass('error_bg');
			$this.tooltip({
				content: 'Ваш вопрос',
				position: 'left'
			});

			isValid = false;
		}
	});
	nameType.each(function(){

		var
			$this = $(this),
			notEmptyField = !!$this.val();

		if (notEmptyField) {
			isValid = true;
		} else {
			$this.addClass('error_bg');
			$this.tooltip({
				content: 'Вы не ввели имя',
				position: 'left'
			});

			isValid = false;
		}
	});
	mailType.each(function(){
		var
			$this = $(this),
			notEmptyField = !!$this.val(),
			regExp = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/,
			isMail = regExp.test($this.val());
			if (notEmptyField) {

				if (isMail) {
					isValid = true;
				} else {
					$this.addClass('error_bg');
					$this.tooltip({
						content : 'Неверный e-mail',
						position : 'right'
					});
					isValid = false;
				}
			} else {
				$this.addClass('error_bg');
				$this.tooltip({
					content: 'Вы не ввели e-mail',
					position: 'right'
				});

				isValid = false;
			}
	});

	return isValid
}

$.fn.tooltip = function(options) {

	options = {
		position    : options.position || 'right',
		content     : options.content || 'I am tooltip'
	};

	var
		markup = '<div class="tooltip tooltip_' + options.position + '"> \
						<div class="tooltip__inner">' + options.content + '</div> \
					</div>';

	var
		$this = this,
		body = $('body');

	$this
		.addClass('tooltipstered')
		.attr('data-tooltip-position', options.position);

	body.append(markup);

	_positionIt($this, body.find('.tooltip').last(), options.position);


	$(document).on('click', function(){
		$('.tooltipstered').removeClass('error_bg');
		$('.tooltip').remove();

	});

	$(window).on('resize', function(){

		var
			tooltips = $('.tooltip');

		var
			tooltipsArray = [];

		tooltips.each(function(){
			tooltipsArray.push($(this));
		});

		$('.tooltipstered').each(function(index){
			var
				position = $(this).data('tooltip-position');

			_positionIt($(this), tooltipsArray[index], position);
		});

	});

	function _positionIt(elem, tooltip, position) {

		//измеряем элемент

		var
			elemWidth   = elem.outerWidth(true),
			elemHeight  = elem.outerHeight(true),
			topEdge     = elem.offset().top,
			bottomEdge  = topEdge + elemHeight,
			leftEdge    = elem.offset().left,
			rightEdge   = leftEdge + elemWidth;

		// измеряем тултип

		var
			tooltipWidth    = tooltip.outerWidth(true),
			tooltipHeight   = tooltip.outerHeight(true),
			leftCentered    = (elemWidth / 2) - (tooltipWidth / 2),
			topCentered     = (elemHeight / 2) - (tooltipHeight / 2);


		var positions = {};

		switch (position) {
			case 'right' :
				positions = {
					left : rightEdge,
					top : topEdge + topCentered
				};
				break;
			case 'top' :
				positions = {
					left: leftEdge + leftCentered,
					top : topEdge - tooltipHeight
				};
				break;
			case 'bottom' :
				positions = {
					left : leftEdge + leftCentered,
					top : bottomEdge
				};
				break;
			case 'left' :
				positions = {
					left : leftEdge - tooltipWidth,
					top : topEdge + topCentered
				};
				break;
		}

		tooltip
			.offset(positions)
			.css('opacity', '1');
	}


};