function ajaxfunction(str) {
  
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("emailerr").innerHTML = this.responseText ;
            }
        }
        xmlhttp.open("GET", "emailvalid.php?qa=" + str, true);
        xmlhttp.send();
    
}