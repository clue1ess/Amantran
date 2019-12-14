function openNav() {
    document.getElementById("sideNavigation").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}
 
function closeNav() {
    document.getElementById("sideNavigation").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
}
function getRow(n) {
    var row = n.parentNode.parentNode;
    var cols = row.getElementsByTagName("td");
    var i = 0;

    while (i < cols.length) {
        var val = cols[i].childNodes[0].nodeValue;
        if (val != null) {
            alert(val);
        }
        i++;
    }
}
function openForm() {
    document.getElementById("myForm").style.display = "block";
  }
  
  function closeForm() {
    document.getElementById("myForm").style.display = "none";
  } 
