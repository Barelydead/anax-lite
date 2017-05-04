<?php
$id = isset($_GET["id"]) ? htmlentities($_GET["id"]) : null;

$sql = "SELECT * FROM anax_content WHERE id = ?;";
$content = $app->db->executeFetch($sql, [$id]);

$params = getPost(["title",
                "path",
                "slug",
                "data",
                "type",
                "filter",
                "published",
                "id"]);

if (isset($_POST["editContent"])) {
    if (!$params["slug"]) {
        $autoSlug = $app->url->slugify($params["title"]);

        $slugSql = "SELECT * FROM `anax_content` WHERE slug = ?";

        if ($app->db->exists($slugSql, [$autoSlug])) {
            $autoSlug .= rand(1, 100);
        }

        $params["slug"] = $autoSlug;
    }

    if (!$params["path"]) {
        $params["path"] = null;
    }

    $sql = "UPDATE anax_content SET title=?, `path`=?, slug=?, data=?, type=?, filter=?, published=?, updated=current_timestamp() WHERE id = ?;";

    $app->db->execute($sql, array_values($params));
    $app->redirect("content/view_content");
    exit;
}

?>

<div class="container main">
    <div class="row">
        <div class="col-md-6">
            <h1>Edit</h1>

            <form method="POST" action="" id="profile">
                <div class="form-group">
                    <label>Title: </label>
                    <input type="text" name="title" class="form-control" value="<?=htmlentities($content->title)?>">
                </div>

                <div class="form-group">
                    <label>slug: </label>
                    <input type="text" name="slug" class="form-control" value="<?=htmlentities($content->slug)?>">
                </div>

                <div class="form-group">
                    <label>path: </label>
                    <input type="text" name="path" class="form-control" value="<?=htmlentities($content->path)?>">
                </div>

                <div class="form-group">
                    <label>data: </label>
                    <textarea class="form-control" rows="5" id="profile" name="data"><?=htmlentities($content->data)?></textarea>
                </div>

                <div class="form-group">
                    <label>type: </label>
                    <input type="text" name="type" class="form-control" value="<?=htmlentities($content->type)?>">
                </div>

                <div class="form-group">
                    <label>filter: </label>
                    <input type="text" name="filter" class="form-control" value="<?=htmlentities($content->filter)?>">
                </div>

                <div class="form-group">
                    <label>published: </label>
                    <input type="text" name="published" class="form-control" value="<?=htmlentities($content->published)?>">
                </div>

                <input type="hidden" name="id" value="<?=$content->id?>">

                <input type="submit" name="editContent" value="Edit" class="btn btn-default">
            </form>

        </div>
    </div>
</div>
