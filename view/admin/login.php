<div class="container main">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">

            <h1>Admin login</h1>
                <form method="POST" action="<?=$this->app->url->create("admin_validate")?>">

                    <div class="form-group">
                        <label>Admin name</label>
                        <input type="text" name="admin" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>password</label>
                        <input type="password" name="pass" class="form-control">
                    </div>

                    <input type="submit" value="Logga in" class="btn btn-primary">
                </form>

        </div>
    </div>

</div>
