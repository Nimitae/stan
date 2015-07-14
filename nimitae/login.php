<?php

include('header.partial.php');
?>

<h1>
    STAN
</h1>
<h2 class="h2">
    Answering Questions, All Day Err Day
</h2>
<div>
    <form method="post" class="form-horizontal" onsubmit="login();return false;">
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10 col-lg-4">
                <input class="form-control" type="text" id="email" placeholder="Email">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10 col-lg-4">
                <input class="form-control" type="password" id="password" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10 col-lg-3">
                <div class="checkbox">
                    <label><input type="checkbox">Remember me</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-4">
                <button type="submit" class="btn btn-default">
                    Log in
                </button>
                    <a class="btn btn-danger pull-right" href="signup.php">Sign up</a>
            </div>
        </div>
    </form>
</div>
</body>
</html>
