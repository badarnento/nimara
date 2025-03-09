$(document).ready(function() {
    // Sidebar Toggle
    $('.menu-button').click(function() {
        $('#sidebarMenu').addClass('active');
        $('body').css('overflow', 'hidden');
    });

    $('.back-button').click(function() {
        $('#sidebarMenu').removeClass('active');
        $('body').css('overflow', 'auto');
    });

    // Initialize Bootstrap Carousel
    $('.carousel').carousel({
        interval: 5000
    });

    // Initialize Gallery Carousel
    const galleryCarousel = $('.gallery-carousel');
    let isDown = false;
    let startX;
    let scrollLeft;

    galleryCarousel.mousedown(function(e) {
        isDown = true;
        startX = e.pageX - galleryCarousel.offset().left;
        scrollLeft = galleryCarousel.scrollLeft();
    });

    galleryCarousel.mouseleave(function() {
        isDown = false;
    });

    galleryCarousel.mouseup(function() {
        isDown = false;
    });

    galleryCarousel.mousemove(function(e) {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - galleryCarousel.offset().left;
        const walk = (x - startX) * 2;
        galleryCarousel.scrollLeft(scrollLeft - walk);
    });

    // Close sidebar when clicking outside
    $(document).click(function(event) {
        if (!$(event.target).closest('#sidebarMenu, .menu-button').length) {
            $('#sidebarMenu').removeClass('active');
            $('body').css('overflow', 'auto');
        }
    });

    // Prevent sidebar from closing when clicking inside
    $('#sidebarMenu').click(function(event) {
        event.stopPropagation();
    });
});