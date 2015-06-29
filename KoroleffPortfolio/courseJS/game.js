var KEYS = {
    LEFT: 37,
    UP: 38,
    RIGHT: 39,
    DOWN: 40
}
var DEFAULT_COURSE = 'up';
var difficulty = 3; // Cложность помех: количество фруктов или яда.
var speedIT = 600; // Интервал формирования передвижения змеи в мс, от которого отнимается фактор скорости
var speed; // Фактор скорости передвижения змеи.
var speedVal = 250; // Начальный фактор скорости передвижения змеи.
var speedMin = 200; // Минимальный фактор скорости передвижения змеи.
var speedMax = 500; // Максимальный фактор скорости передвижения змеи.

function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function explode() {    
    function runEffect() {      
      $('#game').effect('explode', 500, callback);
    };    
    function callback() {
      setTimeout(function() {
        $('#game').removeAttr('style').hide().fadeIn();
      }, 1000 );
    };
}

function Game(matrix, snake) {

    var _this = this;

    $(document).keydown(function(e)
    {
        switch(e.keyCode)
        {
            case KEYS.LEFT:
                _this.snake.course = 'left';
                break;
            case KEYS.UP:
                _this.snake.course = 'up';
                break;
            case KEYS.RIGHT:
                _this.snake.course = 'right';
                break;
            case KEYS.DOWN:
                _this.snake.course = 'down';
                break;
        }
    });    

    this.makeSnake = function() {
        if (_this.snake) {
            for (var i =0; i < _this.snake.body.length; i++) {
                _this.matrix.setCell(_this.snake.body[i].row, _this.snake.body[i].col, false);
            }  
        }
        _this.snake = new Snake(5, 5, DEFAULT_COURSE, 3);
        for (var i =0; i < _this.snake.body.length; i++) {
            _this.matrix.setCell(_this.snake.body[i].row, _this.snake.body[i].col, true);
        }
    }

    this.resetGame = function() {        
        alert('Вы проиграли!');
        _this.makeSnake();         
    }

    this.gameplay = function() {
        var tail = _this.snake.move();      
        var head = _this.snake.body[0];

        if ((head.row > _this.matrix.rows || head.row < 1 ||
            head.col > _this.matrix.cols || head.col < 1) ||
            _this.matrix.getCell(head.row, head.col)) {
            _this.resetGame();
            _this.matrix.setCell(tail.row, tail.col, false);
            return;
        }

        if (_this.matrix.getFruit(head.row, head.col)) {
            _this.snake.grow();
            count++;
            $('#count').html(count);            
            _this.matrix.setFruit(head.row, head.col, false);
            _this.setRandomFruit();
        }

        if (_this.matrix.getBane(head.row, head.col)) {	
        	_this.matrix.setBane(head.row, head.col, false);
        	_this.snake.riduction();
            count--;
            $('#count').html(count);            
        	head = _this.snake.body[0];        	
            _this.setRandomBane();           
        }

        _this.matrix.setCell(head.row, head.col, true);
        _this.matrix.setCell(tail.row, tail.col, false);        
    }

    this.setRandomFruit = function() {
        do {
            var fruitRow = getRandomInt(1, _this.matrix.rows);
            var fruitCol = getRandomInt(1, _this.matrix.cols);
        }
        while (_this.matrix.getCell(fruitRow, fruitCol));
        _this.matrix.setFruit(fruitRow, fruitCol, true);
    }

    this.setRandomBane = function() {
        do {
            var baneRow = getRandomInt(1, _this.matrix.rows);
            var baneCol = getRandomInt(1, _this.matrix.cols);
        }
        while (_this.matrix.getCell(baneRow, baneCol));
        _this.matrix.setBane(baneRow, baneCol, true);
    }


    this.matrix = new Matrix('#matrix1', 20, 20);
    this.matrix.create();
    this.makeSnake();
    for (var i =0; i < difficulty; i++) {
        this.setRandomFruit();
        this.setRandomBane();
    }
    
}

//Слайдер jquery-ui: выбор скорости змеи.    
$('#slider-range-min').slider({
    range: 'min',
    value: speedVal,
    min: speedMin,
    max: speedMax,
    slide: function(event, ui) {
        speed = ui.value;
        var speedPr = Math.round(100 * (speed - speedMin) / (speedMax - speedMin));
        $('#amount').val(speedPr + ' %');            
    }
});
speed = $('#slider-range-min').slider('value');
var speedPr = Math.round(100 * (speed - speedMin) / (speedMax - speedMin));
$('#amount').val(speedPr + ' %');

$('#run').click(function(event) {
    $('#curtain').fadeOut(1000);
    game = null;
    count = 0;
    $('#count').html(count);        

    switch($('input[name="level"]:checked').val())
    {
        case 'easy':
            difficulty = 3;
            break;
        case 'medium':
            difficulty = 5;
            break;
        case 'hard':
            difficulty = 7;
            break;            
    }

    game = new Game();        
    var speed1 = speedIT - speed;
    timer = setInterval(game.gameplay, speed1);

});

$('#stop').click(function(event) {
    $('#curtain').fadeIn(1000); 
    game = null;
    clearInterval(timer);
    game = new Game();
});

$('#persons1').keyup(function(event) {
    var firstLetters = $('#persons').val();
    $('#persons1').hideOptLines(firstLetters);
}); 

$('#oKpersons').click(function(event) {    
    var person = $('#tags').val();
    $('#result1 p').css('display', 'block'); //Фиксируем содержимое, что позволяет показывать одного игрока после другого без предварительного показа всех.
    $('#result1').hidePlines(person);        
});

var game = new Game();