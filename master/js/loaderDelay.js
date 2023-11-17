// Simulate delay and hide loader after page load
window.addEventListener("load", function () {
  setTimeout(function () {
    document.querySelector(".loader-wrapper").style.display = "none";
  }, 1000); // Change delay duration (in milliseconds) as needed
});
