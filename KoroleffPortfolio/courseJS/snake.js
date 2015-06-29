function Snake(row, col, course, lenght) {
	this.body = [];

	for (var i = 0; i < lenght; i++) {
		this.body.push({row: row + i, col: col});
	}
	this.course = course;
	var _this = this;

	this.grow = function() {
		var tail = _this.body[_this.body.length - 1];
		_this.body.push(tail);
	}

	this.riduction = function() {	// Добавил метод отравления	
		_this.body.shift();
	}

	this.move = function () {
		var headRow = _this.body[0].row;
		var headCol = _this.body[0].col;

		switch (_this.course) {
			case 'right':
				headCol++;
				break;
			case 'left':
				headCol--;
				break;
			case 'up':
				headRow--;
				break;
			case 'down':
				headRow++;
				break;
		}

		_this.body.unshift({row: headRow, col: headCol});

		return _this.body.pop();
	}
}