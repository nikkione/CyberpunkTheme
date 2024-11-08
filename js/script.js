document.addEventListener("DOMContentLoaded", () => {
	var swiper = new Swiper(".hero", {
		slidesPerView: 1,
		spaceBetween: 0,
		loop: true,
		effect: "fade",
		autoplay: {
			delay: 4000,
			disableOnInteraction: false,
		},
	});
});
