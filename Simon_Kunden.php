<?php
$host = 'localhost';
$username = 'Steffi';
$password = "kolas000";
$database = 'Simon_Kunden';
$mysqliObject = new mysqli($host, $username, $password);
if (mysqli_connect_errno())
{
    die('Can\'t connect to database. The following error occurred: "' . mysqli_connect_errno() . ' : ' . mysqli_connect_error() . '"');
}
$frage = (string) filter_input(INPUT_GET, 'sqlInput');
if ($frage == 'Kunde'){
    $sql="SELECT * FROM Kunde";
}
elseif ($frage == 'Fahrzeug') {
    $sql = "SELECT * FROM Fahrzeug";
}//Kundendaten anzeigen
elseif ($frage == 'kundendaten') {
    $sql= "SELECT Kunde.Vorname, Kunde.Nachname, Kunde.Anschrift, Kunde.Hausnummer, Kunde.Ort, Kunde.PLZ, Fahrzeug.Automarke, Fahrzeug.Baujahr, FROM Kunde 
        INNER JOIN Fahrzeug on Kunde.Fahrzeug_ID = Fahrzeug.Fahrzeug_ID";
}
//Welches FAhrzeug gehört zu wem 
elseif ($frage == 'welchesFahrzeug') {
    $sql= "SELECT Fahrzeug.Automarke, Person.Vorname, Person.Nachname FROM Kunde
        INNER JOIN Fahrzeug on Kunde.Kunde_ID = Fahrzeug.Kunde_ID";
}
//Welcher Fahrzeugschein gehört zu wem 
elseif ($frage == 'fahrzeugschein') {
    $sql= "SELECT Kunde.Vorname Kunde.Nachname FROM Kunde
        INNER JOIN Fahrzeugbild on Fahrzeugbild.Kunde_ID = Kunde.Kunde_ID";
}
elseif ($frage == 'baujahr') {
    $sql = "SELECT Fahrzeug.Baujahr, Fahrzeug.Automarke FROM Fahrzeug 
            INNER JOIN Kunde on Kunde.Kunde_ID = Fahrzeug.Kunde_ID";
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
        <title>Mietshausübersicht</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="content">
            <h1>Antwort:</h1>
            <pre><?php echo $output; ?></pre>
            <a href="index_Si.php">zurück zum Formular...</a>
        </div> <!-- end content -->
    </body>
</html>