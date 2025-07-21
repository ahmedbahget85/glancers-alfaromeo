function loader(_success) {
	let inner = document.querySelector(".preloader-percentage");

	let w = 0;
	if (inner != null) {
		let t = setInterval(function () {
			w = w + 1;
			inner.textContent = w + "%";
			if (w === 100) {
				clearInterval(t);
				w = 0;
				if (_success) {
					return _success();
				}
			}
		}, 0);
	}
}

function mainNavbar() {
	// navbar
	let meduim = $(".dropdown-menu-meduim-inner .isHover");
	let right = $(".dropdown-menu-right-inner.isHover");
	let items = $(".dropdown-menu-left-inner .dropdown-item");
	for (let i = 0; i <= items.length; i++) {
		$(items[i]).mouseover(function () {
			$(this).addClass("active").siblings().removeClass("active");
			$(right[i])
				.css({ visibility: "visible", opacity: "1" })
				.siblings()
				.css({ visibility: "hidden", opacity: "0" });
			$(meduim[i])
				.css({ visibility: "visible", opacity: "1" })
				.siblings()
				.css({ visibility: "hidden", opacity: "0" });
			$(".notHover").css({ visibility: "hidden", opacity: "0" });
		});
	}
	$(".dropdown-menu-inner").mouseleave(function () {
		$(meduim).css({ visibility: "hidden", opacity: "0" });
		$(right).css({ visibility: "hidden", opacity: "0" });
		$(".notHover").css({ visibility: "visible", opacity: "1" });
		$(items).removeClass("active");
	});

	// header-active-item
	let menuItems = $("#mainNavbarContent  .nav-item").not(":eq(0)");
	let windowTarget = window.location.href.split("/")[3];
	menuItems.each(function () {
		let itemTarget = $(this).find(".nav-link").attr("href").split("/")[1];
		if (itemTarget == windowTarget) {
			$(this).addClass("active");
		}
	});
}

function sideNav() {
	// sticky sidenav
	$("#sticky-sidenav").on("mouseover", function () {
		$("#sticky-sidenav").addClass("active");
	});
	$("#sticky-sidenav").on("mouseleave", function () {
		$("#sticky-sidenav").removeClass("active");
	});
}
// loader

document.addEventListener("DOMContentLoaded", function () {
	loader();
	setTimeout(function () {
		$("body").addClass("loaded");
	}, 500);
});

$(document).ready(function () {
	elements = $(".sidebar-content img")
		.parent()
		.each(function () {
			link = $(this).attr("href");
			$(this).parent().find(".widgettitle").attr("href", link);
		});

	sideNav();
	// slider progressbar
	$("#offersModal").modal("show");

	mainNavbar();

	// slideout menu
	$(".dropdown").on("hide.bs.dropdown", function (e) {
		if (e.clickEvent) {
			e.preventDefault();
		}
	});

	// responsive dropdown
	$(".back-menu").on("click", function () {
		$(this).parent().removeClass("show").addClass("slideOut");
		setTimeout(function () {
			$(".back-menu").parents(".dropdown").removeClass("show");
		}, 550);
	});
	$(".nav-link").on("click", function () {
		$(this).parent().find(".sub-menu").removeClass("slideOut");
	});

	$(".navbar-toggler").on("click", function () {
		$(this).parent().find(".sub-menu").removeClass("show slideOut");
		$(this).parent().find(".dropdown").removeClass("show");
		$(this).find(".navbar-toggler-icon").toggleClass("close");
	});

	//   play and pause sound
	const audio = document.getElementById("audio");
	const soundContain = document.getElementsByClassName("sound-contain")[0];
	if (typeof soundContain !== "undefined") {
		soundContain.addEventListener("click", function () {
			audio.paused ? audio.play() : audio.pause();
			$(soundContain).toggleClass("played muted");
		});
	}

	if ($('.widget_media_image:has(img[alt="Alfaromeo_Youtube"])') != null) {
		$('.widget_media_image img[alt="Alfaromeo_Youtube"]').prop(
			"title",
			"Comming Soon"
		);
	}
});

// Wrap every letter in a span
let textWrapper = document.querySelector(".ml12");
if (textWrapper !== null) {
	textWrapper.innerHTML = textWrapper.textContent.replace(
		/\S/g,
		"<span class='letter'>$&</span>"
	);
}
if (typeof anime !== "undefined") {
	anime
		.timeline({ loop: true })
		.add({
			targets: ".ml12 .letter",
			translateX: [10, 0],
			translateZ: 0,
			opacity: [0, 1],
			easing: "easeOutExpo",
			duration: 1200,
			delay: (el, i) => 500 + 30 * i,
		})
		.add({
			targets: ".ml12 .letter",
			translateX: [0, 10],
			opacity: [1, 0],
			easing: "easeInExpo",
			duration: 1100,
			delay: (el, i) => 100 + 30 * i,
		});
}

// slide after-video finished
if ($(window).outerWidth() >= 992) {
	$("#mainCarousel").carousel({ interval: false }); // this prevents the auto-loop
	let videos = document.querySelectorAll("video");

	videos.forEach(function (e) {
		e.addEventListener("ended", myHandler, false);
	});

	function myHandler(e) {
		setTimeout(function () {
			$("#mainCarousel").carousel("next");
		}, 1000);
	}
	$("#mainCarousel").on("slid.bs.carousel", function () {
		let current = $(".carousel-item.active video")[0];
		// console.log(current);
		$(current).on("stop  ended", function (e) {
			setInterval(function (e) {
				$("#mainCarousel").carousel("next");
			}, 5000);
		});
	});
}
