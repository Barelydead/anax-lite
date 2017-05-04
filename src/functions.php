<?php

function getTableBodyForContent($array, $app)
{
    $html = "";
    $editUrl = $app->url->create("content/edit_content");
    $deleteUrl = $app->url->create("content/delete_content");
    foreach ($array as $row) {
        $html .= "<tr>
            <td>$row->id</td>
            <td>$row->title</td>
            <td>$row->type</td>
            <td>$row->published</td>
            <td>$row->created</td>
            <td>$row->updated</td>
            <td>$row->deleted</td>
            <td>
                <a href='{$editUrl}?id=$row->id'>Edit</a> |
                <a href='{$deleteUrl}?id=$row->id'>Del</a>
            </td>
        </tr>";
    }

    return $html;
}

function getTableBodyForPages($array, $app)
{
    $html = "";
    $url = $app->url->create("content/view");
    foreach ($array as $row) {
        if ($row->status != "isPublished") {
            $html .= "<tr class='unpublished'>
                <td>$row->title</a></td>
                <td>$row->id</td>
                <td>$row->path</td>
                <td>$row->slug</td>
                <td>$row->ingress</td>
                <td>$row->published</td>
                <td>$row->created</td>
                <td>$row->updated</td>
                <td>$row->deleted</td>
                <td>$row->status</td>
            </tr>";
        } else {
            $html .= "<tr>
                <td><a href='$url?path=$row->path'>$row->title</a></td>
                <td>$row->id</td>
                <td>$row->path</td>
                <td>$row->slug</td>
                <td>$row->ingress</td>
                <td>$row->published</td>
                <td>$row->created</td>
                <td>$row->updated</td>
                <td>$row->deleted</td>
                <td>$row->status</td>
            </tr>";
        }
    }

    return $html;
}


function getGet($key, $default = null)
{

    if (is_array($key)) {
        foreach ($key as $val) {
            $get[$val] = getPost($val);
        }
        return $get;
    }

    return isset($_GET[$key])
        ? $_GET[$key]
        : $default;
}

function getPost($key, $default = null)
{

    if (is_array($key)) {
        foreach ($key as $val) {
            $post[$val] = getPost($val);
        }
        return $post;
    }

    return isset($_POST[$key])
        ? $_POST[$key]
        : $default;
}
