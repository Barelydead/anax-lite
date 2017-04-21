<?php
if (!$app->session->has("admin")) {
    $app->redirect("admin_login");
}
?>


<div class="container main">
    <div class="site-header">
        <h1>Welcome to the admin page</h1>
    </div>

    <div class="row">
        <div class="col-md-12">
            <p>You are logged in as admin. You can now edit the content of the page and the make changes to the user database.</p>
        </div>
    </div>
</div>
