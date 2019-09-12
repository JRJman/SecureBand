let wachtwoord = document.getElementById('wachtwoord');
let email = document.getElementById('email');

wachtwoord.addEventListener('click', goWachtwoord);
email.addEventListener('click', goEmail);

function goWachtwoord(){
  window.location.href = "/myband/public/aanpassen/wachtwoord";
}

function goEmail(){
  window.location.href = "/myband/public/aanpassen/email";
}
