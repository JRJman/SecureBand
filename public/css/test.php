<?
include('config.php');
?>
<html>
<head>
<style TYPE="text/css">
body    {
overflow : scroll;
overflow-x : hidden;}
.popper {
position : absolute;
visibility : hidden;}
</style>
</head>

<body bgcolor="#000000" topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0">
<font color="#00FF00" size="2" face="Verdana">
<script language='javascript'>
var frame_width        = 200;
var frame_headerbcolor = "#D8D8D8";
var frame_headerfcolor = "#000000";
var frame_headertext   = "Agenda item uitleg:";

document.write("<div id='framelayer' class='popper'> </div>");

var ns = (document.layers);
var ie = (document.all);


if (ns) {
  popup = document.framelayer;
  document.captureEvents(Event.MOUSEMOVE);}
else {
  popup = framelayer.style;}

document.onmousemove = get_mouse;

function displaylayer(html) {
  if (ns) {
    popup.document.write(html);
    popup.document.close();
    popup.visibility = "visible";}
  else if (ie) {
    document.all("framelayer").innerHTML = html;
    popup.visibility = "visible";}}
function pop(message,bcolor,fcolor) {

  var htmlcode = "<table width=" + frame_width + " border=0 " +
                 "cellpadding=1 cellspacing=0 bgcolor=" +
                 frame_headerbcolor + "><tr><td><table " +
                 "width=100% border=0 cellpadding=0 " +
                 "cellspacing=0><tr><td align='center'>" +
                 "<font color=" + frame_headerfcolor +
                 " size=2 face='arial'><b>" + frame_headertext +
                 "</b></font></td></tr></table>" +
                 "<table width=100% border=0 cellpadding=2 " +
                 "cellspacing=0 bgcolor=" + bcolor + ">" +
                 "<tr><td align='center'><font color=" + fcolor +
                 " size=2 face='arial'>" + message + "</font>" +
                 "</td></tr></table></td></tr></table>"

  displaylayer(htmlcode);}

function get_mouse(e) {
  var x = (ns) ? e.pageX : event.x + document.body.scrollLeft;
  var y = (ns) ? e.pageY : event.y + document.body.scrollTop;

  popup.left = x - 2;
  popup.top  = y + 18;}

function kill()
{
  popup.visibility = "hidden";}
</script>
<?
$query = "SELECT * FROM agenda ORDER BY datum2 ASC";
$result = mysql_query($query);

while($record = mysql_fetch_array($result)) {
?>
<font color="#FFFFFF"><a href=""
ONMOUSEOVER="pop('<b><? echo $record['naam']; ?> <br></b> '+
                  '<b>Datum:</b> <? echo $record['datum']; ?>-<? echo $record['datum1']; ?>-<? echo $record['datum2']; ?> <br> '+
                  '<b>Tijd:</b> <? echo $record['tijd']; ?> <br> ' +
                  '<b>Locatie:</b> <? echo $record['locatie']; ?> ', '#000000', '#FFFFFF')"

ONMOUSEOUT="kill()" target="_blank" style="text-decoration: none"><font size="2" face="Verdana" color="#1CC7F8"><? echo $record['datum']; ?>-<? echo $record['datum1']; ?>-<? echo $record['datum2']; ?></font><font color="#FFFFFF" size="2" face="Verdana"><br><? echo $record['naam']; ?></font></a><br>

<?
}
?>

</body>
</html>
