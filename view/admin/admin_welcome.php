<?php
if (!$app->session->has("admin")) {
    $app->redirect("admin_login");
}


<div class="container">
<h1>Welcome to the admin page</h1>
</div>
