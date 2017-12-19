$(function(){
	$collection = $('#welcome-messages .fading-items');
	$collection.hide();
	var lastIndex = $collection.length-1;
	var start = 0;
	var display = function (index){
		$($collection[index]).fadeIn(1500,function(){
			if(index >= lastIndex)
				var new_index = 0;
			else
				var new_index = index+1;

			setTimeout( function(){
				$($collection[index]).hide();
				display(new_index)
			}, 2500 );
		});
	};
	display(start);
	return;
});