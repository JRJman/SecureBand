let searchBar = document.getElementById('searchBar');

searchBar.addEventListener('keyup', function(){
  ajax(1);
});

ajax(1);

function ajax(nummer){
  search = searchBar.value;
  let xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      reactie.innerHTML = this.responseText;
    }
  }
  xmlhttp.open("GET","../private/includes/search.php?search=" + search + "&nummer=" + nummer,true);
  xmlhttp.send();
}

function send(nummer){
  ajax(nummer);
}
