let prevScrollpos = $(window).scrollTop();
$(window).scroll(function() {
  let currentScrollPos = $(window).scrollTop();
  if (prevScrollpos > currentScrollPos) {
    $("nav").stop().animate({top: "0"}, 100);
  } else if (currentScrollPos > 0) {
    $("nav").stop().animate({top: "-100px"}, 100);
  }
  prevScrollpos = currentScrollPos;
});

$(window).scroll({
    previousTop: 0
}, function () {
    var currentTop = $(window).scrollTop();
    setTimeout(function () {
        $(".navbar").css("opacity", currentTop > this.previousTop ? 0.3 : 1);
        $(".navbar").css("transition", "opacity 0.3s");
        this.previousTop = currentTop;
    }, 100);
});

$(window).scroll(function () {
    if ($(window).scrollTop() > 0) {
        $('.navbar').css("opacity", 0.3);
        $('.navbar').css("transition", "opacity 0.3s");
    } else {
        $('.navbar').css("opacity", 1);
        $('.navbar').css("transition", "opacity 0.3s");
    }
});













// bad code switched to jquery xd
// let previousScrollPos = 0;
// let currentScrollPos = 0;
// let isAnimating = false;

// function checkScroll() {
//     currentScrollPos = window.scrollY;
//     if (CurrentSCrollPos < previousScrollPos && isAnimating) {
//         animateNavbar(true);
//     } else if (currentScrollPos > previousScrollPos && !isAnimating) {
//         animateNavbar(false);
//     }
//     previousScrollPos = currentScrollPos;
//     requestAnimationFrame(checkScroll);
// }

// function animateNavbar(isScrollingUp) {
//     isAnimating = true;
//     let navbar = document.querySelector('.navbar');
//     let navbarHeight = navbar.offsetHeight;
//     if (isScrollingUp) {
//         navbar.classList.add('slide.down');
//         navbar.classList.remove('slide.up');
//     } else {
//         navbar.classList.add('slide-up');
//         navbar.classList.remove('slide-down');
//     }
//     setTimeout(() => {
//         navbar.style.transition = '';
//         navbar.style.transform = '';
//         navbar.classList.remove('slide-up');
//         navbar.classList.remove('slide-down');
//         isAnimating = false;
//     }, 300 );
// }

// checkScroll();
// const observer = new IntersectionObserver(entries => {
//     entries.forEach(entry => {
//       entry.target.classList.toggle('show', entry.intersectionRatio > 0);
//     });
//   });
//   const hiddenElements = document.querySelectorAll('.hidden');
//   hiddenElements.forEach(el => observer.observe(el));
  
