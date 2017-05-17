<?php
// unsicher:
// $sql = $_REQUEST['sqlInput'];

// besser:
$frage = (string) filter_input(INPUT_GET, 'sqlInput');
if ($frage == 'wohnung'){
    $sql="SELECT * FROM Wohnung";
}
elseif ($frage == 'personen') {
    $sql = "SELECT * FROM Person";
}
elseif ($frage == 'ansprechpartner') {
    $sql= "SELECT Person.Vorname, Person.Nachname, Rolle.Rolle_Art FROM Person 
        INNER JOIN Rolle on Rolle.Rolle_Id = Person.Rolle_Person";
}



$host = 'localhost';
$username = 'Steffi';
$password = "kolas000";
$database = 'Mietshaus';
$mysqliObject = new mysqli($host, $username, $password);
if (mysqli_connect_errno())
{
    die('Can\'t connect to database. The following error occurred: "' . mysqli_connect_errno() . ' : ' . mysqli_connect_error() . '"');
}
// Select Database
$selected = $mysqliObject->select_db($database);
if (!$selected)
{
    die('Can\'t open database "'.$database.'". Are you sure it exists? ');
}
// Choose UTF-8 encoding
$mysqliObject->query("SET NAMES 'utf8'");

// send the query
$result = $mysqliObject->query($sql);
if (!$result)
{
    die('The following error occurred: "'.$sql.'"');
}
/* Fetch the result rows as an associative array and write it into the array $return[] */
$return = null;
while ($row = $result->fetch_assoc())
{
    $return[] = $row;
}
// Close the database connection
$mysqliObject->close();

// Save the result as a string
$output = print_r($return, true);
?>
<!DOCTYPE html>
<html dir="ltr" lang="de">
    <head>
        <meta charset="utf-8">
        <title>SQL-Anfrage</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="content">
            <h1>Antwort:</h1>
            <pre><?php echo $output; ?></pre>
            <a href="index1.php">zurück zum Formular...</a>
        </div> <!-- end content -->
    </body>
</html>