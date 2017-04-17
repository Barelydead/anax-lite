<?php
if (!$app->session->has("admin")) {
    $app->redirect("admin_login");
}

$app->db->connect();
$searchResult = [];

$editUrl = $app->url->create("edit_user_profile");

if (isset($_GET["search"])) {
    $search = htmlentities($_GET["search"]);
    $searchResult = $app->db->searchUser($search);
}

?>


<div class="container">
    <div class="site-header">
        <h1>Search User</h1>
    </div>
    <div class="row">
        <div class="col-md-12">

            <form method="GET" action="">

                <div class="form-group">
                    <label>Search</label>
                    <input type="text" name="search" class="form-control" placeholder="Searches substring in username, age, name and profile">
                </div>

                <input type="submit" value="search" class="btn btn-primary">
            </form>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

<?php foreach ($searchResult as $user) {
    echo "<h1>{$user->username}</h1>
    <p>{$user->name} - {$user->age}</p>
    <p>{$user->profile}</p>
    <p><a href='{$editUrl}?user={$user->username}'>Edit profile</a>
    <hr>";
}
?>

        </div>
    </div>
