<br>
<br>
<div class="row justify-content-md-center lower">
    <div class="col-md-4">
    <div class="card text-center">
        <div class="card-header">
            <h3>Login</h3>
        </div>
        <div class="card-block">
            <form action="loginuser.php" method="post" class="col">
                <div class="form-group">
                    <label for="userName">Username</label>
                    <input type="text" class="form-control" id="userName" name="userName" placeholder="John Doe">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary col-md-3">Submit</button>
                <button type="submit" class="btn col-md-3" formaction="newuser.php">New User</button>
            </form>
            <br>
        </div>
    </div>
    </div>
</div>