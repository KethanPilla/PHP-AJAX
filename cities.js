var xmlhttp

function getCitiesByState(stateName)
{
    if (stateName.length == 0)
    {
        document.getElementById("cityList").innerHTML = "";
        return;
    }
    xmlhttp = GetXmlHttpObject();
    if (xmlhttp == null)
    {
        alert("Your browser does not support XMLHTTP!");
        return;
    }
    var url = "getcities.php?state=" + encodeURIComponent(stateName);

    xmlhttp.onreadystatechange = stateChanged;
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}

function stateChanged()
{
    if (xmlhttp.readyState == 4 && this.status == 200)
    {
        document.getElementById("cityList").innerHTML = xmlhttp.responseText;
    }
}

function GetXmlHttpObject()
{
    if (window.XMLHttpRequest)
    {
        // used by nearly all browsers
        return new XMLHttpRequest();
    }
    if (window.ActiveXObject)
    {
        // some Microsoft Browsers use this object instead
        return new ActiveXObject("Microsoft.XMLHTTP");
    }
    return null;
}
