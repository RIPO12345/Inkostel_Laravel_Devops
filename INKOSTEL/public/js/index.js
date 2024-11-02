// navBar
const navBar = document.querySelector("nav"),
  menuBtn = document.querySelectorAll(".menu-icon"),
  overlay = document.querySelector(".overlay");
console.log(navBar, menuBtn, overlay);

// Tambahkan class "active" pada link yang sesuai dengan halaman yang sedang aktif
const currentPage = window.location.pathname;
const navLinks = document.querySelectorAll(".nav-link");

navLinks.forEach(link => {
  if (link.getAttribute("href") === currentPage) {
    link.classList.add("active");
  }
});

menuBtn.forEach(menuBtn => {
  menuBtn.addEventListener("click", () => {
    navBar.classList.toggle("open");
  });
});

overlay.addEventListener("click", () => {
  navBar.classList.remove("open");
});