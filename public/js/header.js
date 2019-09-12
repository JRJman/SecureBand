let logo = document.getElementById('logo');
let h1 = document.getElementById('h1');

logo.addEventListener('click', home);
h1.addEventListener('click', home);

function home() {
  window.location.href = "/myband/public/";
}
