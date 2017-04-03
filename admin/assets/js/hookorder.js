$(document).ready( function () {

	$(".jak_hooks_move").sortable({
		placeholder: "ui-state-highlight",
		axis: 'y',
		revert: 250,
		tolerance: 'pointer',
		containment	: 'document',
		forcePlaceholderSize: true,
		start: function (e, ui) {

			ui.placeholder.height(ui.item.height());
			ui.item.css('opacity', '0.6');
			ui.placeholder.css('background-color', '#CFF5F2');

		},
		update		: function(){
		
			var arr = $(".jak_hooks_move").sortable('toArray');

			arr = $.map(arr,function(val,key){
				return val.replace('hook-','');
			});
			
			// Saving with AJAX
			$.post('ajax/hookorder.php',{id:1,positions:arr},
				function(data) {
				     if (data == 1) {
				     	$(".jakhooks").animate({backgroundColor: '#c9ffc9'}, 100).animate({backgroundColor: '#F9F9F9'}, 1000);
				     } else {
				     	$(".jakhooks").animate({backgroundColor: '#ffc9c9'}, 100).animate({backgroundColor: '#F9F9F9'}, 1000);
				     }
			});
		},
		
		/* Opera fix: */
		stop: function(e,ui) {
			ui.item.css({'top':'0','left':'0'});
			ui.item.css('opacity', '1');
		}
	});
});