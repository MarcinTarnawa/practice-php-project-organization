<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <br>  Choose method
    <form action="/" method="POST">
            <input type="radio" name="_method" value="GET">
            <label for="html">GET</label><br>
            <input type="radio" id="css" name="_method" value="POST">
            <label for="css">POST</label><br>
            <input type="radio" id="javascript" name="_method" value="DELETE">
            <label for="javascript">DELETE</label>
        <button type="submit">
            Save
        </button>
    </form>
Choose url:
    <a href="/">Index</a>
    <a href="/create">Create</a>
    <a href="/show">show Controller</a>
</body>
</html>