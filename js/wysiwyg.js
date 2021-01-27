$(function(){
	
	$.pExec = function(name, args){
		document.execCommand(name, false, args);
	}

	$('ul.pButon li a').click(function(){
		var obj = $(this).data('obj'), args;

		if ( obj.prompt ){
			args = prompt(obj.promptText, obj.promptDefault);
		} else if ( obj.arg ){
			args = obj.arg;
		}

		$.pExec(obj.name, args);
		return false

	});

	$('button#submit').click(function(){
		var html = $('.pEditor').html();
		$('textarea[name=pTextarea]').val( html );
	});

});