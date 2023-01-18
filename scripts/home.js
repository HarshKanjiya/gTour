// const back = document.getElementById("home-hero-back");
const mid = document.getElementById("home-hero-mid");
const topz = document.getElementById("home-hero-top");
const cover = document.getElementById("home-hero-cover");
const text1 = document.getElementById("home-hero-text");

window.addEventListener("scroll", function () {
  let value = window.scrollY;

  if (window.innerHeight < value) {
    text1.style.display = "none";
    // back.style.display = "none";
  }
  if (window.innerHeight >= value) {
    text1.style.display = "inherit";
    // back.style.display = "inherit";
  }

  // back.style.top = value * 1 + "px";
  mid.style.top = value * 0.4 + "px";
  text1.style.top = value * 0.9 + "px";
  topz.style.top = value * 0.01 + "px";
  cover.style.top = value * 0.001 + "px";
});

