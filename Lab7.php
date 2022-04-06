<!doctype html>
<head>
<link rel="icon"   href="icon.jpg" />
<title>Lab7.php</title>
</head>

<body>
<center><h1>Mondial-like Interface</h1></center>

<p>
The textbox below allows you to query the test.lite database which contains<br>
made-up data. Hopefully, only <em>select</em> and <em> describe </em> should be allowed. :)
</p>

<!---Query inside query box with results below query box-->
<?php if(isset($_GET["query"])){ ?>
<form method ="get" action="">
<label for="query">Query box</label><br/>
<textarea id="query" name="query" rows="5" cols="40" placeholder="Type query here"><?= $_GET["query"] ?></textarea><br />
<input type="submit" value="Send query...">
<br>
<br>

<!--PHP query section-->
<?php
#open database
$db = new PDO("sqlite:./test.lite");

//get user's query
$sql = $_GET["query"];

//check for semicolon
if(strpos($sql,";") !==strlen($sql)-1){
	echo "Query must be ended with a semicolon";
	exit();
}

//reject incorrect queries
if(strstr($sql,"--")!=false || strstr($sql,"/*")!=false || strstr($sql,"*/")!=false){
	echo "Please re-enter query without comments";
	exit();
}
if(strpos($sql,"describe")===false && strpos($sql,"select")===false){
	echo "Your request was rejected due to it not being a select or describe SQL command.";
	exit();
}

//Change query to sqlite3 appropriate command if it is a describe table sql command
if(strstr($sql,"describe")!=false){
	$sql = "pragma table_info(".substr($sql,(strpos($sql,"describe")+8),-1).")"; 
}

#query the database
$rResults = $db->query($sql);
if($rResults === false){
	echo "database problem";
    exit();
}
?>

<!--Prints out the query results-->
<pre>
<table border=1 style="border: 2px black solid; border-collapse: collapse;">
<?php
foreach($rResults as $row){
	?><tr><?php
	for($i=0;$i<$rResults->columnCount();$i++){
		?><td><?php echo $row[$i];?><td><?php
	}
	?></tr><?php
}
?>
</table>
</pre>

<!---Normal query box-->
<?php } else { ?>
<form method ="get" action="">
<label for="query">Query box</label><br/>
<textarea id="query" name="query" rows="5" cols="40" placeholder="Type query here"></textarea><br />
<input type="submit" value="Send query..."> 
<?php } ?>
</body>
</html>