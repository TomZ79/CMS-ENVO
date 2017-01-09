$(document).ready( function () {

	$(".jak_plugins_move").sortable({
		axis		: 'y',				// Only vertical movements allowed
		containment	: 'document',			// Constrained by the window
		placeholder: "ui-state-highlight",
		update		: function(){		// The function is called after the todos are rearranged
		
			// The toArray method returns an array with the ids of the todos
			var arr = $(".jak_plugins_move").sortable('toArray');
			
			// Striping the todo- prefix of the ids:
			arr = $.map(arr,function(val,key){
				return val.replace('plugin-','');
			});
			
			// Saving with AJAX
			$.post('ajax/pluginorder.php',{id:1,positions:arr},
				function(data) {
				     if (data == 1) {
				     	$(".jakplugins").animate({backgroundColor: '#e7fdfb'}, 100).animate({backgroundColor: '#F9F9F9'}, 1000);
				     } else {
				     	$(".jakplugins").animate({backgroundColor: '#e7fdfb'}, 100).animate({backgroundColor: '#F9F9F9'}, 1000);
				     }
			});
		},
		
		/* Opera fix: */
		stop: function(e,ui) {
			ui.item.css({'top':'0','left':'0'});
		}
	});
});