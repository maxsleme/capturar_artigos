$(function() {
    
    // confirma a exclusão de algum recurso
	$('a[data-confirm], input[data-confirm]').click(function() {
		if (!confirm($(this).attr('data-confirm'))) {
			return false;
		};
	});
	


});