
<!DOCTYPE html>
<html dir="ltr" lang="de">
    <head>
        <meta charset="utf8">
        <title>Startseite Mietshaus</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="content">
            <form id="formIdentifier" action="index.php" method="get">
                <fieldset>
                    <legend>Kundendaten</legend>
                    <label for="sqlInput">Mögliche Abfragen für der Kunden</label>
                    <br />
                 <!--  <textarea id="sqlInput" name="sqlInput" rows="4" cols="50"></textarea>-->
                    <select name="sqlInput" size="1">
                        <option value="kundendaten">Welche Kunden hab ich?</option>
                        <option value="welchesFahrzeug">Welches Fahrzeug hat wer?</option>
                        <option value="fahrzeugschein">Alle Fahrzeugscheine anzeigen?</option>
                        <option value="baujahr">Baujahr anzeigen?</option>
                        
                    </select>
                </fieldset>
                <input type="submit" value="senden" />
            </form>
        </div> <!-- end content -->
    </body>
</html>