<?php
$postHandler = $this->app->url->create("handle_user");

?>

<div class="container main">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">

            <h1>New User</h1>
                <form method="POST" action="<?=$postHandler?>">

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

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Age</label>
                        <input type="number" name="age" class="form-control">
                    </div>

                    <input type="submit" value="Create" class="btn btn-primary">

                </form>
            </div>

        </div>
    </div>
</div>
