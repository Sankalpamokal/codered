$(document).ready(function () {
    if (document.getElementById('bb').checked)
    {
        document.getElementById("hidehosp").style.display="none";
        document.getElementById("hideind").style.display="none";
        document.getElementById("hidebb").style.display="block";
        document.getElementById("add").style.display="block";
    }
    else if (document.getElementById('hosp').checked) {
        document.getElementById("hidebb").style.display="none";
        document.getElementById("hideind").style.display="none";
        document.getElementById("hidehosp").style.display="block";
        document.getElementById("add").style.display="block";
    }
    else if (document.getElementById('individual').checked)
    {
        document.getElementById("hidebb").style.display="none";
        document.getElementById("hidehosp").style.display="none";
        document.getElementById("hideind").style.display="block";
        document.getElementById("add").style.display="block";
    }
})
function hidebb() {
    document.getElementById("hidehosp").style.display="none";
    document.getElementById("hideind").style.display="none";
    document.getElementById("hidebb").style.display="block";
    document.getElementById("add").style.display="block";
}
function hidehosp() {
    document.getElementById("hidebb").style.display="none";
    document.getElementById("hideind").style.display="none";
    document.getElementById("hidehosp").style.display="block";
    document.getElementById("add").style.display="block";
}
function hideind() {
    document.getElementById("hidebb").style.display="none";
    document.getElementById("hidehosp").style.display="none";
    document.getElementById("hideind").style.display="block";
    document.getElementById("add").style.display="block";
}