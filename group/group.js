function scrollHandler() {
  var mountain2 = document.getElementById('mountain2');
  var bird = document.getElementById('bird');
  var scrollTop = window.scrollY || document.documentElement.scrollTop;

  // Mountain2 movement
  var scrollSpeed2 = scrollTop - lastScrollTop;
  var currentMarginTop2 = parseFloat(window.getComputedStyle(mountain2).marginTop) || 0;
  var newMarginTop2 = currentMarginTop2 - scrollSpeed2 * 0.1; // Adjust the speed factor as needed
  var minMarginTop2 = -100; // Adjust as needed
  var maxMarginTop2 = 100; // Adjust as needed
  newMarginTop2 = Math.min(maxMarginTop2, Math.max(minMarginTop2, newMarginTop2));
  mountain2.style.marginTop = newMarginTop2 + 'px';

  // Bird movement
  var scrollSpeedBird = scrollTop - lastScrollTop;
  var currentTop = parseInt(bird.style.top) || 0;
  var currentLeft = parseInt(bird.style.left) || 0;
  var newTop = currentTop - scrollSpeedBird * 2; // Adjust the speed factor as needed
  var newLeft = currentLeft + scrollSpeedBird * 2; // Adjust the speed factor as needed
  bird.style.top = newTop + 'px';
  bird.style.left = newLeft + 'px';

  lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // For mobile or negative scrolling

  // Remove the event listener after the specified number of attempts
  if (animationCount >= 30) {
    window.removeEventListener('scroll', scrollHandler);
  }
  animationCount++;
}

var lastScrollTop = 0;
var animationCount = 1; // Counter to track the number of animation attempts

window.addEventListener('scroll', scrollHandler, false);