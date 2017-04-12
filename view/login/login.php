<div class="container main">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">

            <h1>Login</h1>
                <form method="POST" action="<?=$this->app->url->create("validate")?>">

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="user" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>password</label>
                        <input type="password" name="pass" class="form-control">
                    </div>

                    <input type="submit" value="Logga in" class="btn btn-primary">
                </form>

        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h2>Create new user</h2>
            <a href="<?= $app->url->create('new_user') ?>" class="btn">sign up</a>
        </div>
    </div>


        </div>
    </div>
</div>
