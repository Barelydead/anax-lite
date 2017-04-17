<?php
if (!$app->session->has("admin")) {
    $app->redirect("admin_login");
}

$user = isset($_GET["user"]) ? htmlentities($_GET["user"]) : null;
$app->db->connect();

$sql = "SELECT * FROM `anax_users` WHERE `username` = '$user'";

$info = $app->db->executeFetchAll($sql)[0];

$postformUrl = $app->url->create("postform_admin_edit");

?>

<div class="container main">
    <div class="row">
        <div class="col-md-6">
            <h1>Edit</h1>

            <form method="POST" action="<?=$postformUrl?>" id="profile">
                <div class="form-group">
                    <label>Username: </label>
                    <input type="text" name="username" class="form-control" value="<?=$info->username?>" readonly="readonly">
                </div>

                <div class="form-group">
                    <label>name: </label>
                    <input type="text" name="name" class="form-control" value="<?=$info->name?>">
                </div>

                <div class="form-group">
                    <label>Age: </label>
                    <input type="number" name="age" class="form-control" value="<?=$info->age?>">
                </div>

                <div class="form-group">
                    <label>Profile: </label>
                    <textarea class="form-control" rows="5" id="profile" name="profile"><?=$info->profile?></textarea>
                </div>

                <input type="submit" name="edit_profile" value="Edit" class="btn btn-default">
            </form>
        </div>


        <div class="col-md-6">
            <h1>Change password</h1>

            <form method="POST" action="<?=$postformUrl?>" id="profile">
                <div class="form-group">
                    <label>new password: </label>
                    <input type="password" name="password" class="form-control" value="">
                </div>

                <div class="form-group">
                    <label>re-enter password: </label>
                    <input type="password" name="repassword" class="form-control" value="">
                </div>
                <input type="hidden" name="username" value="<?=$info->username?>">

                <input type="submit" name="change_password" value="Change" class="btn btn-default">
            </form>

        </div>
    </div>
<hr>
    <div class="row">
        <div class="col-md-6">
            <h1>Delete user <b><?=$info->username?></b></h1>

            <form method="POST" action="<?=$postformUrl?>">
                <input type="hidden" name="username" value="<?=$info->username?>">
                <input type="submit" name="delete_profile" value="Delete <?=$info->username?>" class="btn btn-danger">
            </form>

        </div>
    </div>

</div>
