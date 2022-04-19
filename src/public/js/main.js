// Header Active
// var btnContainer = document.getElementById("mybtn");
// var btns = document.getElementsByClassName("link-nav-custom");
// for (var i = 0; i < btns.length; i++) {
//   btns[i].addEventListener("click", function () {
//     var current = document.getElementsByClassName("active");
//     current[0].className = current[0].className.replace(" active", "");
//     this.className += " active";
//   });
// }

/* Auto Slide */
$(".autoplay").slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2500,
  arrows: false,
});
