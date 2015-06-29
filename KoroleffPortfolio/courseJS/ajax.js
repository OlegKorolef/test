function gameResult(messages)
{	
	$('#result1').empty();
	$('#persons1').empty();
	var availableTags = [];
	for (var i = 0; i < messages.length; i++)
	{		
		var html = '<p>';
			html += messages[i].name + '&nbsp;&nbsp;-&nbsp;&nbsp;';
			html += messages[i].count;
			html += '</p>';			
		$('#result1').append(html);						
		availableTags.push(messages[i].name);
				
		for (var n = 0; n < i; n++)
		{				
			if (availableTags[n] == availableTags[i]) {				
				availableTags.pop();
			}				
		}
	}
	//Автокомплит jquery-ui
	$(function() {
	$( "#tags" ).autocomplete({
			source: availableTags
		});
	});
}

$('#post').click(function(event) {

	var name = $('#name').val();
	var count = $('#count').html();
	
	$.ajax({

	    type: "POST",
	    url: "add.php",			
		data: {name: name, count: count},

		beforeSend: function() {					
				if (name == '' || count == '') {						
					alert('Введите имя и результат!');
					return false;
				}			
			},
	    success: function() {
	    		$('#screenMessages').empty().append('Данные сохранены!');
	    		$('#name').attr('value', '');
				$('#count').attr('value', '');
			},
	    error: function () {	    		
				$('#screenMessages').empty().append('Соединение неудачно!');									
			}

    });
    
});	

$('#load').click(function(event) {
	$('#curtain').fadeOut(1000);
	$.post('get.php', {maxLine: 8}, gameResult, 'json');
});