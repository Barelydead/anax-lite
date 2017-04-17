<?php
if (!$app->session->has("user")) {
    $loginURL = $app->url->create("login");
    header("Location: $loginURL");
}


?>

<div class="container main">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Edit</h1>

            <form method="POST" action="<?=$app->url->create("handle_edit_user")?>" id="profile">
                <div class="form-group">
                    <label>Name: </label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <label>Age: </label>
                    <input type="number" name="age" class="form-control">
                </div>

                <div class="form-group">
                    <label>Profile: </label>
                    <textarea class="form-control" rows="5" id="profile" name="profile"></textarea>
                </div>

                <input type="submit" name="edit_profile" value="edit" class="btn btn-warning">
            </form>

        </div>
    </div>
</div>
