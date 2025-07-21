$(document).ready(function () {
	AOS.init();
	window.addEventListener("scroll", function (e) {
		let currentScroll = Number($(window).scrollTop());

		let triggerPoint = Number($(".grid-counters").offset().top) - 800;
		if (
			currentScroll > triggerPoint &&
			!$(".grid-counters").hasClass("animated")
		) {
			$(".counter").each(function () {
				var $this = $(this);
				jQuery({ Counter: 0 }).animate(
					{ Counter: $this.text() },
					{
						duration: 1000,
						easing: "swing",
						step: function () {
							$this.text(Math.ceil(this.Counter));
						},
					}
				);
			});
			$(".grid-counters").addClass("animated");
		}
		if ($(this.document).find(".to-animate").length != 0) {
			triggerPoint = Number($(".to-animate").offset().top) - 1000;
			if (currentScroll > triggerPoint) {
				$($(".to-animate").get(0)).addClass("animated");
				$($(".to-animate").get(0)).removeClass("to-animate");
			}
		}
	});
});
