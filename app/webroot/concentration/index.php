<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="title" content="US Congress Concentration" />
<meta name="robots" content="index, follow" />
<meta name="description" content="Congressional Concentration" />
<meta name="keywords" content="lawmakers, congress, concentration" />
<title>Congressional Concentration</title>

<meta name="language" content="en" />

<style type="text/css">
body
{
    width: 791px;
    margin: 0 auto;                    
    background: #ffffff;
}

html {
  background: #ffffff;
}


h2 {
    font-size:167%;
    padding: 10px;
}

p {
    padding: 10px;
}

li {
    padding-left: 10px;  
}
</style>
<!-- 
    100% Inspired by http://fbi.thatsaspicymeatball.com/ 
    http://github.com/bertrandom/FBI-Fugitive-Concentration/tree    
-->
<?php
ini_set("display_errors",true);
?>
<script type="text/javascript">
    var djConfig = {
        baseUrl: 'dojo/',
        parseOnLoad: true,
        isDebug: false
    };
</script>


<script type="text/javascript" src="dojo/dojo.js"></script>
<script>

    dojo.require("dojox.fx.flip");
    dojo.require("bert.YouWin");
    dojo.require("bert.Card");

    var cardsTurned = 0;
    var matchesFound = 0;
    var activeCards = [];
    var readyToTurn = true;
    
        
</script>
</head>
<body>
<div style="margin:0 auto">
<h2>Congressional Concentration</h2>
    <div id="hd">
        <img dojoType="bert.YouWin" src="/images/logo.png" href="/images/youwin.png" id="logo" jsId="youwin" />
    </div>
    <div id="bd">

<?php
$i = 0;
mysql_connect('localhost','root','');
mysql_select_db('mashupDB');

$sql = "SELECT * FROM lawmakers WHERE in_office = 1 ORDER BY RAND() LIMIT 50";
$results = mysql_query($sql);

$i=0;
while($data_row = mysql_fetch_assoc($results)) {
    if($i < 12) {
        if(file_exists('/var/www/congressspacebook/app/webroot/img/lawmakers/100x125/'.$data_row['bioguide_id'].'.jpg')) { 
            $_row[] = $data_row;
        }
    } 
    $i++;
}

array_rand($_row);
foreach($_row as $row1) {  ?>
    <div dojoType="bert.Card" style="display: block; float: left; background: #cae9ff; width:100px; height:133px;" src="http://www.congressspacebook.com/img/lawmakers/100x125/<?php echo $row1['bioguide_id']; ?>.jpg"><img src="card.png" width="100" /></div>        
<?php
}
array_rand($_row);
foreach($_row as $row2) { ?>
    <div dojoType="bert.Card" style="display: block; float: left; background: #cae9ff; width:100px; height:133px;" src="http://www.congressspacebook.com/img/lawmakers/100x125/<?php echo $row2['bioguide_id']; ?>.jpg"><img src="card.png" width="100" /></div>        
<?php
}
?>
    </div>
</div>    
</body>
</html>

