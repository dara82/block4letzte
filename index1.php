<!DOCTYPE html>
<html dir="ltr" lang="de">
    <head>
        <meta charset="utf8">
        <title>SQL-Anfrage</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="content">
            <form id="formIdentifier" action="index.php" method="get">
                <fieldset>
                    <legend>Mietverwaltung</legend>
                    <label for="sqlInput">Mögliche Abfragen für Mietobjekt</label>
                    <br />
                 <!--  <textarea id="sqlInput" name="sqlInput" rows="4" cols="50"></textarea>-->
                    <select name="sqlInput" size="1">
                        <option value="wohnung">Welche Wohungen gibt es im Wohnhaus</option>
                        <option value="personen">Welche Personen leben im Haus</option>
                        <option value="ansprechpartner">Wer ist Ansprechpartner für Wohnung</option>
                    </select>
                </fieldset>
                <input type="submit" value="senden" />
            </form>
        </div> <!-- end content -->
    </body>
</html>