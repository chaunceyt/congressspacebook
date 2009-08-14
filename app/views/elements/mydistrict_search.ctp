<script type="text/javascript">
function createRequestObject() {
    var ro;
    var browser = navigator.appName;
    if(browser == "Microsoft Internet Explorer"){
        ro = new ActiveXObject("Microsoft.XMLHTTP");
    }else{
        ro = new XMLHttpRequest();
    }
    return ro;

}
var http = createRequestObject(); 

function getStateDistricts(id, state) {
    var url = "/ajax/get_state_districts/" + state;
    http.open('get', url);
    http.onreadystatechange = function() {handleResponse(id);}
    http.send(null);
}

function setStateDistrict(id, data) {
    var url = "/ajax/set_state_district/" + data;
    http.open('get', url);
    http.onreadystatechange = function() {handleResponse(id);}
    http.send(null);
}

function handleResponse(id){
    if(http.readyState == 4){
        var response = http.responseText;
        if(response.indexOf('|' != -1)) {
             document.getElementById(id).innerHTML = http.responseText;
        }
    }
}

</script>

<div id="cong_district">
Select your State:
<?php
echo $state->stateDropDown();
?>
<br/>
<span id="congressional_district"></span>
<span id="district_saved"></span>
</div>

