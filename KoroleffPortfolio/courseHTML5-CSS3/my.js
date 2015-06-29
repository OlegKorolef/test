var windowEntering = $(".windowEntering"),
	bold = $("#bold"),
	italic = $("#italic"),
	fontSize3 = $("#fontSize3"),
	fontSize5 = $("#fontSize5"),
	fontSize7 = $("#fontSize7"),
	red = $("#red"),
	green = $("#green"),
	insertOrderedList = $("#insertOrderedList"),
	save = $("#save"),
	beginning = $("#beginning"),
	clean = $("#clean"),
	lsData = $("#lsData"),
	heading = $("#heading"),
	lateralMenu = $(".lateralMenu");		

function showData() {
	lsData.empty();
	lateralMenu.empty();
	lateralMenu.append('Закладки:<br>');
	for (var i = 0; i < localStorage.length; i++) {
		var key = localStorage.key(i);		
		lateralMenu.append('&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;<a href="#" onclick="loading(this); return false">' + key + '</a><br>');		
		lsData.append('<p>' + key + ': ' + localStorage.getItem(key) + '</p>');
	}
}	
function checkEntering() {
	if (windowEntering.text() == false) {
		save.attr('disabled', 'disabled');
		return;
	}
	save.removeAttr('disabled');		
}
// Функция loading запускается в notepadWebStorage.html (после его загрузки) по атребуту onclick, см. функцию showData.
function loading(node) {		
	var key = node.innerHTML;
	heading.val(key);
	windowEntering.html(localStorage.getItem(key));
	checkEntering();
}
// Для старых браузеров эмулируем placeholder
function placeholder() {
	if(!Modernizr.input.placeholder) {
        $('input[type=text]').focus(function() {
			var input = $(this);
			if (input.val() == input.attr('placeholder')) {
				input.val('');
				input.removeClass('placeholder');
			}
        }).blur(function() {
			var input = $(this);
			if (input.val() == '' || input.val() == input.attr('placeholder')) {
				input.addClass('placeholder');
				input.val(input.attr('placeholder'));
			}
        }).blur();
    }
}

bold.click(function(event) {		
	document.execCommand('bold', false, null);	
});
italic.click(function(event) {		
	document.execCommand('italic', false, null);	
});
fontSize3.click(function(event) {		
	document.execCommand('fontSize', false, 3);	
});
fontSize5.click(function(event) {		
	document.execCommand('fontSize', false, 5);	
});
fontSize7.click(function(event) {		
	document.execCommand('fontSize', false, 7);	
});
red.click(function(event) {		
	document.execCommand('foreColor', false, 'red');
});
green.click(function(event) {		
	document.execCommand('foreColor', false, 'green');
});
insertOrderedList.click(function(event) {		
	document.execCommand('insertOrderedList', false, null);
});
save.click(function(event) {		
	localStorage.setItem(heading.val(), windowEntering.html());	
	showData();		
});
beginning.click(function(event) {
	heading.val(null);
	windowEntering.empty();
	placeholder();
	checkEntering();
});
clean.click(function(event) {
	localStorage.clear();	
	showData();
});
	windowEntering.keyup(function(event) {
	checkEntering();
});

showData();
checkEntering();
placeholder();