var date = new Date();
var month = date.getMonth() + 1;
var year = date.getFullYear();

ajaxAgenda(month,year);

function ajaxAgenda(maand,jaar) {
  let xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      agendaText.innerHTML = this.responseText;
    }
  }
  xmlhttp.open("GET","../private/includes/agenda.php?maand="+maand+"&jaar="+jaar,true);
  xmlhttp.send();
}
