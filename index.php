
<?php 

include 'LogDb.php';

$log = new LogDb('log');

$log->store("Zinute i duomenu baze");
// $log->deleteAll();

echo "<pre>";
print_r($log->getAll());


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


</body>
</html>