<!-- login form -->
<form class="form-horizontal col-md-4" action="loginpage.php" method="post">
    <h3>Login below</h3>
    <div class="form-group">
        <label for="inputEmail" class="col-md-2 control-label">Email</label>
        <div class="col-md-10">
            <input type="email" name="useremail" class="form-control" id="inputEmail" placeholder="Email">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword" class="col-md-2 control-label">Password</label>
        <div class="col-md-10">
            <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
            <button type="button" class="btn btn-default" id="loginBtn">Sign in</button>
        </div>
    </div>
</form>