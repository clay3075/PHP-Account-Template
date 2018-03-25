<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Test App</title>
</head>
<body>
<br>
<br>
    <div class="row justify-content-md-center lower">
        <div class="col-md-4">
        <div class="card text-center">
            <div class="card-header">
                <h3>New User</h3>
            </div>
            <div class="card-block">
                <form action="createuser.php" method="post" class="col">
                    <div class="form-group">
                        <label for="userName">Username</label>
                        <input type="text" class="form-control" id="userName" name="userName" placeholder="John Doe">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="password2">Repeat Password</label>
                        <input type="password" class="form-control" id="password2" name="password2" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary col-md-3">Submit</button>
                    <button type="submit" class="btn col-md-3" formaction="index.php">Home</button>
                </form>
                <br>
            </div>
        </div>
        </div>
    </div>
    <?php require "footer.php" ?>
</body>
</html>