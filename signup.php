<!--registration form -->
<form class="form-horizontal" action="registrationadd.php" method="post">
    <h3>Not a member? Sign up here!</h3>
    <div class="form-group">
        <label for="inputUsername" class="col-md-2 control-label">Username</label>
        <div class="col-md-10">
            <input type="text" name="username" class="form-control" id="inputUsername" placeholder="Username">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail" class="col-md-2 control-label">Email</label>
        <div class="col-md-10">
            <input type="email" name="useremail" class="form-control" id="inputEmail" placeholder="Email">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword" class="col-md-2 control-label">Password</label>
        <div class="col-md-10">
            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
            <button type="button" class="btn btn-primary" id="registerBtn">Register</button>
        </div>
    </div>
</form>