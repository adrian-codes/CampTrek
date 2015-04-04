<header class="navbar navbar-default navbar-static-top">
    <nav class='container' role='navigation'>
        <div class='navbar-header'>
        <a href="home.php" class='navbar-brand'>CampTrek</a>
        
        <button type='button' class="navbar-toggle collapsed" data-toggle='collapse' data-target='.navbar-collapse'>
            <span class='sr-only'>Toggle navigation</span>    
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
        </button>
        </div>
        <ul class="nav navbar-nav navbar-right navbar-collapse collapse">
            <?php if(isset($_SESSION[ 'userinfo'])){ echo "<li><a href='logout.php'>Logout</a></li>"; } else{ echo "<li><a href='index.php'>Login</a></li>"; } ?>
            <li><a href="signup.php">Sign Up</a>
            </li>
            <li><a href="createpost.php">Post Review</a>
            </li>
        </ul>
    </nav>
</header>