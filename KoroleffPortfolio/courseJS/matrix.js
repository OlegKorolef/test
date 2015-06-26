function Matrix(containerId, rows, cols)
{
	// id контейнера
	this.$container = $(containerId);
	
	// число строк
	this.rows = rows;
	
	// число столбцов
	this.cols = cols;

	var _this = this;
	
	// создание сетки
	this.create = function() {
		var n = this.rows * this.cols;

		_this.$container.empty();
		var i, div;
		for (var i = 0; i < n; i++)
		{
			var $div = $('<div class="cell"></div>');
			_this.$container.append($div);
		}
	}
	
	// получить значение ячейки - его индекс (номер в сетке, начинается с 0 и до 399)
	this.getCellElement = function(row, col) {
		var indexOfCell = (row - 1) * this.cols + col - 1;
		return _this.$container.find('.cell').eq(indexOfCell);
	}

	this.getCell = function(row, col) {
		return this.getCellElement(row, col).hasClass('on');
	}	
	
	this.setCell = function(row, col, val) {
		var cell = this.getCellElement(row, col);	
		cell.toggleClass('on', val);
	}

	this.getFruit = function(row, col) {
		return this.getCellElement(row, col).hasClass('fruit');
	}

	this.setFruit = function(row, col, val) {
		var cell = this.getCellElement(row, col);	
		cell.toggleClass('fruit', val);
	}

	this.getBane = function(row, col) {
		return this.getCellElement(row, col).hasClass('bane');
	}

	this.setBane = function(row, col, val) {
		var cell = this.getCellElement(row, col);	
		cell.toggleClass('bane', val);
	}
}