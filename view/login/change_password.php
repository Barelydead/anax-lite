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

            <form method="POST" action="<?=$app->url->create("handle_change_password")?>">
                <div class="form-group">
                    <label>New password: </label>
                    <input type="password" name="new_pass" class="form-control">
                </div>

                <div class="form-group">
                    <label>Re-enter new password: </label>
                    <input type="password" name="re_new_pass" class="form-control">
                </div>

                <div class="form-group">
                    <label>Current password: </label>
                    <input type="password" name="old_pass" class="form-control">
                </div>

                <input type="submit" value="edit" class="btn btn-warning">
            </form>

        </div>
    </div>
</div>
