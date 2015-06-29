(function ($) {

	$.fn.hidePlines = function(line) {		
		this.find('p:not(:contains(' + line + '))').hide();		
	};

	$.fn.hideOptLines = function(line) {		
		this.find('option:not([value ^=' + line + '])').hide();
	};	
	
}(jQuery));