<!DOCTYPE html>
<html dir="ltr" lang="de">
    <head>
        <meta charset="utf8">
        <title>SQL-Anfrage</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="content">
            <form id="formIdentifier" action="index2.php" method="get">
                <fieldset>
                    <legend>Ein sehr einfaches Formular</legend>
                    <label for="sqlInput">SQL-Query</label>
                    <br />
                    <textarea id="sqlInput" name="sqlInput" rows="4" cols="50"></textarea>
                </fieldset>
                <input type="submit" value="SQL senden" />
            </form>
        </div> <!-- end content -->
    </body>
</html>