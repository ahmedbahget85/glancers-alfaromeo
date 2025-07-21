// export function loader(_success) {
// 	let inner = document.querySelector(".preloader-percentage");
// 	let w = 0,
// 		t = setInterval(function () {
// 			w = w + 1;
// 			inner.textContent = w + "%";
// 			if (w === 100) {
// 				clearInterval(t);
// 				w = 0;
// 				if (_success) {
// 					return _success();
// 				}
// 			}
// 		}, 0);
// }

// export function mainNavbar() {
// 	// navbar
// 	let meduim = $(".dropdown-menu-meduim-inner .isHover");
// 	let right = $(".dropdown-menu-right-inner.isHover");
// 	let items = $(".dropdown-menu-left-inner .dropdown-item");
// 	for (let i = 0; i <= items.length; i++) {
// 		$(items[i]).mouseover(function () {
// 			$(this).addClass("active").siblings().removeClass("active");
// 			$(right[i])
// 				.css({ visibility: "visible", opacity: "1" })
// 				.siblings()
// 				.css({ visibility: "hidden", opacity: "0" });
// 			$(meduim[i])
// 				.css({ visibility: "visible", opacity: "1" })
// 				.siblings()
// 				.css({ visibility: "hidden", opacity: "0" });
// 			$(".notHover").css({ visibility: "hidden", opacity: "0" });
// 		});
// 	}
// 	$(".dropdown-menu-inner").mouseleave(function () {
// 		$(meduim).css({ visibility: "hidden", opacity: "0" });
// 		$(right).css({ visibility: "hidden", opacity: "0" });
// 		$(".notHover").css({ visibility: "visible", opacity: "1" });
// 		$(items).removeClass("active");
// 	});
// }
// export function sideNav() {
// 	// sticky sidenav
// 	$("#sticky-sidenav").on("mouseover", function () {
// 		$("#sticky-sidenav").addClass("active");
// 	});
// 	$("#sticky-sidenav").on("mouseleave", function () {
// 		$("#sticky-sidenav").removeClass("active");
// 	});
// }
