$(document).ready(function() {

	/*Пояснения в полях ввода*/
	$('.input1').each(function() {
		var default_value = this.value;
		$(this).focus(function(){
			if(this.value == default_value) {
				this.value = '';
			}
		});
		$(this).blur(function(){
			if(this.value == '') {
				this.value = default_value;
			}
		});
	});

	/*Слайдер - карусель*/
	$(".gallery").jCarouselLite({
		btnNext: ".next", // класс кнопки перехода вперед, null для отключения
		btnPrev: ".prev", // класс кнопки перехода назад, null для отключения
		mouseWheel: false, //если false, то галерея не будет прокручиваться колесом мыши
		auto: null, //шаг автопрокрутки в миллисекундах, null для отключения 
		speed: 400, //скорость прокрутки в миллисекундах
		vertical: false, //если true, то галерея будет располагаться вертикально
		circular: true, //true - прокрутка по кругу, false - только до последнего изображения
		visible: 4, //количество видимых картинок
		start: 0, //с какого элемента начинается галерея (первый элемент имеет значение 0)
		scroll: 1 //количество элементов, которые одновременно прокручиваются при щелчке по кнопке
	});
	
});