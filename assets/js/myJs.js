$('#slider10').bsTouchSlider();
$(".carousel .carousel-inner").swipe({
    swipeLeft: function (event, direction, distance, duration, fingerCount) {                 this.parent().carousel('next'); } , swipeRight: function () { this.parent().carousel('prev'); } , threshold: 0
 });