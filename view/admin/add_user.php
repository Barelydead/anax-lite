<?php
if (!$app->session->has("admin")) {
    $app->redirect("admin_login");
}


?>
<div class="container main">
    <div class="row">
        <div class="col-md-6 col-md-offset-2">

            <h1>Add new user</h1>
                <form method="POST" action="handle_user">

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="user" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pass" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Re-enter password</label>
                        <input type="password" name="pass2" class="form-control">
                    </div>

                    <input type="submit" name="addUser" value="Add user" class="btn btn-primary">
                </form>

        </div>
    </div>

</div>
