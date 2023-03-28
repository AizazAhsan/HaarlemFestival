<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="/css/historyManagement.css" rel="stylesheet">
    <title>CRUD</title>
</head>
<body>

<nav class="navbar navbar-dark bg-mynav">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Add Content</a>
    </div>
</nav>

<div class="container">
    <div class="me-auto p-2 bd-highlight" id="header" style="margin-top: 20px"><h2>Add Content</div>
    <form action="/historyManagement" method="POST">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Title">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" class="form-control" id="image" name="image" placeholder="Image">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <input type="text" class="form-control" id="content" name="content" placeholder="Content">
        </div>
        <button type="submit" class="btn btn-primary" id="submit" value="submit" name="submit">Add</button>
        <div class="error"> <?php if (isset($addError)){ ?> <span id="error-msg"> <?=$addError?> </span> <?php } ?> </div>
    </form>
</div>

</body>
</html>