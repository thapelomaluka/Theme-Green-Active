var clickcount = 0,
	divHieght = jQuery('.element').height(),
	buttonClick = 0;

function removeAnimationClass() {
	var elems = document.querySelectorAll(".animate__animated");

	[].forEach.call(elems, function (el) {
		el.classList.remove("animate__animated");
	});
}

function closetab() {
	removeAnimationClass();
	jQuery('.hamburger').toggleClass('close-btn');
	jQuery('.hamburger').toggleClass('actv');
	jQuery('.nav_menu').toggleClass('open');
	clickcount = 0;
	setTimeout(function () {
		jQuery('.filter-wrapper').removeClass("scrollable");
		jQuery('.element .filter-wrapper .content').fadeOut();
		jQuery('.element .filter-wrapper .h1').css({
			"line-height": "-" + divHieght + 'px'
		});
		console.log(divHieght);
		jQuery(document).find('div.element.full').promise().done(function () {
			var selectedElement = jQuery(this).attr('id');
			console.log(selectedElement);

			if (selectedElement === "element1") {
				jQuery(this).children().attr('id', 'yellow-filter');
			}
			if (selectedElement === "element2") {
				jQuery(this).children().attr('id', 'purple-filter');
			}
			if (selectedElement === "element3") {
				jQuery(this).children().attr('id', 'red-filter');
			}
			if (selectedElement === "element4") {
				jQuery(this).children().attr('id', 'orange-filter');
			}
			if (selectedElement === "element5") {
				jQuery(this).children().attr('id', 'lime-filter');
			}
			if (selectedElement === "element6") {
				jQuery(this).children().attr('id', 'blue-filter');
			}
			if (selectedElement === "element7") {
				jQuery(this).children().attr('id', 'maroon-filter');
			}

		})
		jQuery('.element').removeClass('full').promise().done(function () {
			jQuery("div.element").show().promise().done(function () {
				jQuery('.h1').removeClass('successfully-saved hide-opacity').show();
			});
		});
	}, 800);
	jQuery('.content').fadeOut();
	//document.getElementById("footer-nav").innerHTML = '';
}
jQuery(window).scroll(function () {
	if (jQuery(this).scrollTop() > 50) {
		jQuery('.scrolltop:hidden').stop(true, true).fadeIn();
	} else {
		jQuery('.scrolltop').stop(true, true).fadeOut();
	}
});

jQuery(function () {
	jQuery(".scroll").click(function () {
		jQuery("html,body").animate({
			scrollTop: jQuery(".thetop").offset().top
		}, "1000");
		return false
	})
})


jQuery(document).ready(function () {
	'use strict';

	var hyperlink = '',
		current = '';

	jQuery('.tabs').on('click', function (e) {
		e.preventDefault();
		jQuery("li.tab.active").promise().done(function () {
			current = jQuery(this).removeClass("active");
		});
		jQuery(jQuery(this).children(".tab")).addClass("active");

		hyperlink = jQuery(this).attr('href').replace(/^.*?(#|$)/, '');
		jQuery("div.tab-content.active-tab").promise().done(function () {
			current = jQuery(this).removeClass("active-tab");
		});
		jQuery("#" + hyperlink).addClass("active-tab");

	});
	jQuery("#westafrica").hover(function () {
		jQuery('#westa').css("display", "none");
	}, function () {
		jQuery('#westa').css("display", "block");
	});

	jQuery('#experiencecara').owlCarousel({
		loop: true,
		autoplay: true,
		dots: false,
		responsive: {
			0: {
				items: 1
			}
		},
		autoplayHoverPause: false,
		autoplayTimeout: 9000
	});

	jQuery('#headercara').owlCarousel({
		loop: true,
		responsiveClass: true,
		dots: false,
		nav: false,
		responsive: {
			0: {
				items: 1
			}
		},
		autoplay: true,
		autoplayHoverPause: false,
		autoplayTimeout: 7000
	});
	var owl = jQuery('#headercara');
	owl.on('changed.owl.carousel', function (event) {
		var item = event.item.index - 2; // Position of the current item
		jQuery('p').removeClass('animate__animated animate__fadeInDown');
		jQuery('h1').removeClass('animate__animated animate__fadeInDown');
		jQuery('.hero__btn').removeClass('animate__animated animate__fadeInLeft');

		jQuery('.owl-item').not('.cloned').eq(item).find('p').addClass('animate__animated animate__fadeInDown');
		jQuery('.owl-item').not('.cloned').eq(item).find('h1').addClass('animate__animated animate__fadeInDown');
		jQuery('.owl-item').not('.cloned').eq(item).find('.hero__btn').addClass('animate__animated animate__fadeInLeft');
	});

	jQuery(window).on('scroll', function () {
		if (jQuery(window).scrollTop() > 10) {
			jQuery('.navbar').addClass('actvnavbar');
		} else {
			jQuery('.navbar').removeClass('actvnavbar');
		}
	});

	jQuery("#testimonial-slider").owlCarousel({
		items: 1,
		itemsDesktop: [1000, 2],
		itemsDesktopSmall: [979, 1],
		itemsTablet: [768, 1],
		pagination: true,
		navigation: true,
		slideSpeed: 1000,
		singleItem: true,
		transitionStyle: "goDown",
		navigationText: ["", ""],
		autoPlay: false
	});

	var fullHeight = function () {

		jQuery('.js-fullheight').css('height', jQuery(window).height());
		jQuery(window).resize(function () {
			jQuery('.js-fullheight').css('height', jQuery(window).height());
		});

	};
	fullHeight();

	jQuery('#sidebarCollapse').on('click', function () {
		jQuery('#sidebar').toggleClass('active');
	});

	jQuery(".experCara").owlCarousel({
		animateOut: 'animate__animated animate__fadeOut',
		animateIn: 'animate__animated animate__fadeIn',
		loop: true,
		margin: 10,
		responsiveClass: true,
		dots: false,
		nav: false,
		responsive: {
			0: {
				items: 1
			}
		},
		autoplay: true,
		autoplayHoverPause: false,
		interval: 5000
	});

	!function (c, h, i, m, p) {
		m = c.createElement(h), p = c.getElementsByTagName(h)[0], m.async = 1, m.src = i, p.parentNode.insertBefore(m, p)
	}(document, "script", "https://chimpstatic.com/mcjs-connected/js/users/b914ea1401d69d8d341b9a72a/9ff2c33512c7db9a427665ac1.js");
	// When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
	window.onscroll = function () {
		scrollFunction()
	};

	function scrollFunction() {
		if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
			document.getElementById("navbar").style.padding = "10px 10px";
			jQuery("#navbar").addClass('actvnavbar navbar-light bg-light');
			document.getElementById("logo").style.width = "15px";
		}
		else {
			document.getElementById("navbar").style.padding = "15px 10px";
			document.getElementById("logo").style.width = "25px";
			jQuery("#navbar").removeClass('actvnavbar navbar-light bg-light');
		}
	}
});

function openNav() {

	document.getElementById("mySidenav").style.width = "250px";
	document.getElementById("main").style.marginRight = "250px";
}

function closeNav() {

	document.getElementById("mySidenav").style.width = "0";
	document.getElementById("main").style.marginRight = "0";
}

function doit(id) {

	if (jQuery("#" + id).attr('data-status') === 'closed') {
		jQuery("#" + id).attr('data-status', 'opened');
		openNav();
	} else {
		jQuery("#" + id).attr('data-status', 'closed');
		closeNav();
	}
}

jQuery('.closebtn').on('click', function () {
	jQuery('.navcont').removeClass("active");
	jQuery("#sidenaving").attr('data-status', 'closed');
});
var sidbar = document.getElementsByClassName("navcont");

for (var i = 0; i < sidbar.length; i++) {
	console.log(sidbar[i]);
	sidbar[i].addEventListener("click", function () {
		this.classList.toggle("active");
	});
}
/* ******************************************************** */


var TxtType = function (el, toRotate, period) {
	this.toRotate = toRotate;
	this.el = el;
	this.loopNum = 0;
	this.period = parseInt(period, 10) || 2000;
	this.txt = '';
	this.tick();
	this.isDeleting = false;
};

TxtType.prototype.tick = function () {
	var i = this.loopNum % this.toRotate.length;
	var fullTxt = this.toRotate[i];

	if (this.isDeleting) {
		this.txt = fullTxt.substring(0, this.txt.length - 1);
	} else {
		this.txt = fullTxt.substring(0, this.txt.length + 1);
	}

	this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

	var that = this;
	var delta = 200 - Math.random() * 100;

	if (this.isDeleting) { delta /= 2; }

	if (!this.isDeleting && this.txt === fullTxt) {
		delta = this.period;
		this.isDeleting = true;
	} else if (this.isDeleting && this.txt === '') {
		this.isDeleting = false;
		this.loopNum++;
		delta = 500;
	}

	setTimeout(function () {
		that.tick();
	}, delta);
};

var controller = new ScrollMagic.Controller();

var parallaxTl = new TimelineMax();

parallaxTl.from('.content-wrapper', 1, { autoAlpha: 0, ease: Power0.easeNone })
	.from('.bcg', 1, { y: '40%', ease: Power0.easeNone }, 0);

var slideParallaxScene = new ScrollMagic.Scene({
	triggerElement: '.bcg-parallax',
	triggerHook: 1,
	duration: '100%'
})
	.setTween(parallaxTl)
	//.addIndicators({ name: "pin scene", colorEnd: "#FFFFFF" })
	.addTo(controller);



