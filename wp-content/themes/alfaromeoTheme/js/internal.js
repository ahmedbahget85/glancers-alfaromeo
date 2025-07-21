document.addEventListener("DOMContentLoaded", function () {
	setTimeout(function () {
		// console.log("hello");

		$(".main-wrapper").addClass("loaded");
	}, 5000);
});

$(document).ready(function () {
	var $owl = $(".loop");

	$owl.owlCarousel({
		autoplay: false,
		autoplayTimeout: 3000,
		autoplaySpeed: 800,
		center: false,
		singleItem: true,
		loop: true,
		autoWidth: false,
		// autoHeight: true,

		// animateOut: "slide-up",
		// animateIn: "slide-down",
		nav: true,
		dots: false,
		margin: 0,
		responsive: {
			0: {
				stagePadding: 0,
				items: 1,
			},
			576: {
				stagePadding: 30,
				items: 1.01,
			},

			992: {
				stagePadding: 80,
				items: 1.04,
			},
			1025: {
				stagePadding: 30,
				items: 1.02,
			},
			1200: {
				stagePadding: 80,
				items: 1.05,
			},
		},
	});
	$(".owl-next").html(
		'<img src="' + php_vars.main + '/asset/icons/carousel-indicator.svg" />'
	);
	$(".owl-prev").html(
		'<img src="' + php_vars.main + '/asset/icons/carousel-indicator.svg" />'
	);

	window.addEventListener("scroll", function (e) {
		let currentScroll = Number($(window).scrollTop());
		toggleModelNavbar(currentScroll);
		goAnimateSection(currentScroll, "#overview-section");
		goAnimateSection(currentScroll, "#highlights-section");
		goAnimateSection(currentScroll, "#exterior-section");
		goAnimateSection(currentScroll, "#interior-section");
		goAnimateSection(currentScroll, "#safety-section");
		goAnimateSection(currentScroll, "#infotainment-section");
		goAnimateSection(currentScroll, "#technology-section");
		goAnimateSection(currentScroll, "#performance-section");
	});

	scrollToSmoothly();

	sideNav();
});

function toggleModelNavbar(currentScroll) {
	let triggerPoint = Number($("header").offset().top) - screen.height;

	if (currentScroll > triggerPoint) {
		$(".model-menu").addClass("visibile");
	}
	if (currentScroll == 0) {
		$(".model-menu").removeClass("visibile");
		$(".model-menu .nav-item").removeClass("active");
	}
}

function animateSnakeWaves(target) {
	var pathEls = document.querySelectorAll(target);
	for (var i = 0; i < pathEls.length; i++) {
		var pathEl = pathEls[i];
		var offset = anime.setDashoffset(pathEl);
		pathEl.setAttribute("stroke-dashoffset", offset);
		anime({
			targets: pathEl,
			strokeDashoffset: [offset, 0],
			duration: anime.random(300, 900),
			delay: anime.random(300, 500),
			loop: 2,
			direction: "alternate",
			easing: "easeInOutSine",
			autoplay: true,
		});
	}
}

function goAnimateSection(currentScroll, sectionName) {
	let triggerPoint = Number($(sectionName).offset().top) - 500;
	if (currentScroll > triggerPoint) {
		//Overview Section
		if (
			sectionName === "#overview-section" &&
			!$(sectionName).hasClass("go-animate")
		) {
			animateSnakeWaves("#snakes-waves path");
			$("#overview-overlay-red").addClass("go-animate");
			$("#overview-section .text-wrapper").addClass("go-animate");
			setTimeout(function () {
				$(".z-2").addClass("go-animate");
				$("#overview-alfa-red-line").addClass("go-animate");
				$("#overview-section .text-wrapper").addClass("go-animate");
				$("#overview-overlay").addClass("go-animate");
				$(".snake-waves-bg").addClass("go-animate");
			}, 300);
			setTimeout(function () {
				$("#overview-overlay-red").removeClass("go-animate");
				$(".z-2").addClass("go-animate");
				$("#overview-alfa-red-line").addClass("go-animate");
				$(".snake-bg").addClass("go-animate");
			}, 1000);
		} else if (
			sectionName === "#highlights-section" &&
			!$(sectionName).hasClass("go-animate")
		) {
			animateSnakeWaves("#snakes-waves-2 path");
			$("#highlights-overlay-red").addClass("go-animate");
			setTimeout(function () {
				$("#highlights-section .head").addClass("go-animate");
				$(".snake-waves-bg").addClass("go-animate");
			}, 300);

			setTimeout(function () {
				$("#highlights-alfa-red-line").addClass("go-animate");
				$("#highlights-overlay-red").removeClass("go-animate");
				$(".car-model-trans").addClass("go-animate");
				$("#highlights-section ul").addClass("go-animate");
			}, 1000);
		} else if (
			sectionName === "#exterior-section" &&
			!$(sectionName).hasClass("go-animate")
		) {
			$("#exterior-overlay-red").addClass("go-animate");
			$("#exterior-section .top").addClass("go-animate");
			$("#oneImageSlider").addClass("go-animate");

			setTimeout(function () {
				$(
					"#exterior-section .content-wrapper .left .top .head"
				).addClass("go-animate");
			}, 300);

			setTimeout(function () {
				$(
					"#exterior-section .content-wrapper .carousel-caption"
				).addClass("go-animate");

				$("#exterior-overlay-red").removeClass("go-animate");
			}, 1000);
		} else if (
			sectionName === "#interior-section" &&
			!$(sectionName).hasClass("go-animate")
		) {
			$("#interior-overlay-red").addClass("go-animate");
			setTimeout(function () {
				$("#interior-section .head").addClass("go-animate");
			}, 200);

			setTimeout(function () {
				$(
					"#twoImagesSlider .carousel-inner .carousel-item .item .left"
				).addClass("go-animate");
				$("#interior-section .carousel-item .right .top").addClass(
					"go-animate"
				);
				$("#interior-section .carousel-item .right .body").addClass(
					"go-animate"
				);
				$("#interior-section .carousel-control-prev").addClass(
					"go-animate"
				);
				$("#interior-section .carousel-control-next").addClass(
					"go-animate"
				);
				$("#interior-overlay-red").removeClass("go-animate");
			}, 1000);
		} else if (
			sectionName === "#safety-section" &&
			!$(sectionName).hasClass("go-animate")
		) {
			$("#safety-overlay-red").addClass("go-animate");
			setTimeout(function () {
				$("#safety-overlay-red").removeClass("go-animate");
				$("#safety-section .left").addClass("go-animate");
				$("#safety-section .custome-animation").addClass("go-animate");
			}, 1000);
		} else if (
			sectionName === "#infotainment-section" &&
			!$(sectionName).hasClass("go-animate")
		) {
			$("#infotainment-overlay-red").addClass("go-animate");
			setTimeout(function () {
				$("#infotainment-overlay-red").removeClass("go-animate");
				$("#infotainment-section .top .head").addClass("go-animate");
				$("#infotainment-section .top .left").addClass("go-animate");
			}, 1000);
			setTimeout(function () {
				$("#infotainment-section .carousel-inner").addClass(
					"go-animate"
				);
				setTimeout(function () {
					$(
						"#infotainment-section .collapseSlider-indicator"
					).addClass("go-animate");
				}, 200);
			}, 1600);
		} else if (
			sectionName === "#technology-section" &&
			!$(sectionName).hasClass("go-animate")
		) {
			$("#technology-overlay-red").addClass("go-animate");
			setTimeout(function () {
				$("#technology-overlay-red").removeClass("go-animate");
				$("#technology-section .left").addClass("go-animate");
				$("#technology-section .custome-animation").addClass(
					"go-animate"
				);
			}, 1000);
		} else if (
			sectionName === "#performance-section" &&
			!$(sectionName).hasClass("go-animate")
		) {
			$("#performance-overlay-red").addClass("go-animate");
			setTimeout(function () {
				$("#performance-overlay-red").removeClass("go-animate");
				$("#performance-section .top").addClass("go-animate");
				$("#performance-section video").addClass("go-animate");
				$("#performance-section video").get(0).play();
				// $("#technology-section .custome-animation").addClass("go-animate");
			}, 1000);
		}
		/*********************************/
		$(sectionName).addClass("go-animate");
	}
}

function scrollToSmoothly() {
	$(".a-navigate").on("click", function (event) {
		if (this.hash !== "") {
			event.preventDefault();

			var hash = this.hash;

			let offset =
				hash == "#overview-section"
					? $(".model-landing .text-wrapper").outerHeight(true) + 65
					: 120;
			document
				.querySelectorAll(".a-navigate")
				.forEach((element) =>
					$(element).parent().removeClass("active")
				);
			$(event.target).parent().addClass("active");

			$("html, body").animate(
				{
					scrollTop: $(hash).offset().top - offset,
				},
				800,
				function () {
					//window.location.hash = hash;
				}
			);
		} // End if
	});
}

$(".responsive-header").each(function () {
	$(this).on("click", function () {
		$(this)
			.parents("section")
			.find($(".isCollapse"))
			.toggleClass("activeSection");
		$(this).find("img").toggleClass("collapse-arrow");
	});
});
// pause video when close modal
$(".modal").on("hide.bs.modal", function () {
	let videoWrapper = $(this).find("video")[0];
	videoWrapper.pause();
});

// make model-menu items active whn scrolling
$(window).scroll(function () {
	let scrollTop = $(document).scrollTop();
	let targetSection = $("section");

	for (let i = 0; i < targetSection.length; i++) {
		if (
			scrollTop >= $(targetSection[i]).offset().top - 124 &&
			scrollTop <
				$(targetSection[i]).offset().top -
					124 +
					$(targetSection[i]).outerHeight()
		) {
			$(
				'.model-menu ul li a[href="#' +
					$(targetSection[i]).attr("id") +
					'"]'
			)
				.parent()
				.addClass("active")
				.siblings()
				.removeClass("active");
		}
	}
});

// detect ios in small screens;
let _isOS = navigator.userAgent.match(/(iPod|iPhone)/);

if (_isOS) {
	// $(".model-landing").addClass("ios");
	$(".model-landing .bg-image").addClass("is-os");
}
