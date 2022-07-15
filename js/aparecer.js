//animacion con javascript sencilla

// Scroll suave para link interno (no se utilizó en este caso)
$('nav a').click(function(e){
	e.preventDefault();
	var id = $(this).attr('href'),
			menuHeight = $('nav').innerHeight(),
			targetOffset = $(id).offset().top;
	$('html, body').animate({
		scrollTop: targetOffset - menuHeight
	}, 10);//tiempo que se demora en recorrer la pagina hasta llegar al punto
});

// funcion antirrebote
debounce = function(func, wait, immediate) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		var later = function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		};
		var callNow = immediate && !timeout;
		clearTimeout(timeout);
		timeout = setTimeout(later, wait);
		if (callNow) func.apply(context, args);
	};
};

// animacion al realizar scroll (abajo hacia arriba)
(function(){
	var $target = $('.anime-1'),
			animationClass = 'anime-start',
			offset = $(window).height() * 99/100;

	function animeScroll() {
		var documentTop = $(document).scrollTop();

		$target.each(function(){
			var itemTop = $(this).offset().top;
			if (documentTop > itemTop - offset) {
				$(this).addClass(animationClass);
			} else {
				$(this).removeClass(animationClass);
			}
		});
	}

	animeScroll();

	$(document).scroll(debounce(function(){
		animeScroll();
	}, 10));//tiempo que se demora en aparecer
})();
// animacion al realizar scroll (abajo hacia arriba)
(function(){
	var $target = $('.anime-1a'),
			animationClass = 'anime-start',
			offset = $(window).height() * 99/100;

	function animeScroll() {
		var documentTop = $(document).scrollTop();

		$target.each(function(){
			var itemTop = $(this).offset().top;
			if (documentTop > itemTop - offset) {
				$(this).addClass(animationClass);
			} else {
				$(this).removeClass(animationClass);
			}
		});
	}

	animeScroll();

	$(document).scroll(debounce(function(){
		animeScroll();
	}, 10));//tiempo que se demora en aparecer
})();


// animacion al realizar scroll (arriba hacia abajo)
(function(){
	var $target = $('.anime-2'),
			animationClass = 'anime-start',
			offset = $(window).height() * 99/100;

	function animeScroll() {
		var documentTop = $(document).scrollTop();

		$target.each(function(){
			var itemTop = $(this).offset().top;
			if (documentTop > itemTop - offset) {
				$(this).addClass(animationClass);
			} else {
				$(this).removeClass(animationClass);
			}
		});
	}

	animeScroll();

	$(document).scroll(debounce(function(){
		animeScroll();
	}, 10));//tiempo que se demora en aparecer
})();
// animacion al realizar scroll (arriba hacia abajo)
(function(){
	var $target = $('.anime-2a'),
			animationClass = 'anime-start',
			offset = $(window).height() * 99/100;

	function animeScroll() {
		var documentTop = $(document).scrollTop();

		$target.each(function(){
			var itemTop = $(this).offset().top;
			if (documentTop > itemTop - offset) {
				$(this).addClass(animationClass);
			} else {
				$(this).removeClass(animationClass);
			}
		});
	}

	animeScroll();

	$(document).scroll(debounce(function(){
		animeScroll();
	}, 60));//tiempo que se demora en aparecer
})();

// animacion al realizar scroll (arriba hacia abajo)
(function(){
	var $target = $('.anime-2b'),
			animationClass = 'anime-start',
			offset = $(window).height() * 99/100;

	function animeScroll() {
		var documentTop = $(document).scrollTop();

		$target.each(function(){
			var itemTop = $(this).offset().top;
			if (documentTop > itemTop - offset) {
				$(this).addClass(animationClass);
			} else {
				$(this).removeClass(animationClass);
			}
		});
	}

	animeScroll();

	$(document).scroll(debounce(function(){
		animeScroll();
	}, 120));//tiempo que se demora en aparecer
})();


// animacion al realizar scroll (izquierda a derecha)
(function(){
	var $target = $('.anime-3'),
			animationClass = 'anime-start',
			offset = $(window).height() * 99/100;

	function animeScroll() {
		var documentTop = $(document).scrollTop();

		$target.each(function(){
			var itemTop = $(this).offset().top;
			if (documentTop > itemTop - offset) {
				$(this).addClass(animationClass);
			} else {
				$(this).removeClass(animationClass);
			}
		});
	}

	animeScroll();

	$(document).scroll(debounce(function(){
		animeScroll();
	}, 10));//tiempo que se demora en aparecer
})();

// animacion al realizar scroll (izquierda a derecha)
(function(){
	var $target = $('.anime-3a'),
			animationClass = 'anime-start',
			offset = $(window).height() * 2/4;

	function animeScroll() {
		var documentTop = $(document).scrollTop();

		$target.each(function(){
			var itemTop = $(this).offset().top;
			if (documentTop > itemTop - offset) {
				$(this).addClass(animationClass);
			} else {
				$(this).removeClass(animationClass);
			}
		});
	}

	animeScroll();

	$(document).scroll(debounce(function(){
		animeScroll();
	}, 30));//tiempo que se demora en aparecer
})();

// animacion al realizar scroll (izquierda a derecha)
(function(){
	var $target = $('.anime-3b'),
			animationClass = 'anime-start',
			offset = $(window).height() * 3/4;

	function animeScroll() {
		var documentTop = $(document).scrollTop();

		$target.each(function(){
			var itemTop = $(this).offset().top;
			if (documentTop > itemTop - offset) {
				$(this).addClass(animationClass);
			} else {
				$(this).removeClass(animationClass);
			}
		});
	}

	animeScroll();

	$(document).scroll(debounce(function(){
		animeScroll();
	}, 100));//tiempo que se demora en aparecer
})();



// animacion al realizar scroll (derecha a izquierda)
(function(){
	var $target = $('.anime-4'),
			animationClass = 'anime-start',
			offset = $(window).height() * 99/100;

	function animeScroll() {
		var documentTop = $(document).scrollTop();

		$target.each(function(){
			var itemTop = $(this).offset().top;
			if (documentTop > itemTop - offset) {
				$(this).addClass(animationClass);
			} else {
				$(this).removeClass(animationClass);
			}
		});
	}

	animeScroll();

	$(document).scroll(debounce(function(){
		animeScroll();
	}, 10));//tiempo que se demora en aparecer
})();


// animacion al realizar scroll (derecha a izquierda)
(function(){
	var $target = $('.anime-4a'),
			animationClass = 'anime-start',
			offset = $(window).height() * 1/4;

	function animeScroll() {
		var documentTop = $(document).scrollTop();

		$target.each(function(){
			var itemTop = $(this).offset().top;
			if (documentTop > itemTop - offset) {
				$(this).addClass(animationClass);
			} else {
				$(this).removeClass(animationClass);
			}
		});
	}

	animeScroll();

	$(document).scroll(debounce(function(){
		animeScroll();
	}, 60));//tiempo que se demora en aparecer
})();


// animacion al realizar scroll (derecha a izquierda)
(function(){
	var $target = $('.anime-4b'),
			animationClass = 'anime-start',
			offset = $(window).height() * 3/4;

	function animeScroll() {
		var documentTop = $(document).scrollTop();

		$target.each(function(){
			var itemTop = $(this).offset().top;
			if (documentTop > itemTop - offset) {
				$(this).addClass(animationClass);
			} else {
				$(this).removeClass(animationClass);
			}
		});
	}

	animeScroll();

	$(document).scroll(debounce(function(){
		animeScroll();
	}, 60));//tiempo que se demora en aparecer
})();