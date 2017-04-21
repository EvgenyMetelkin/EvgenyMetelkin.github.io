<?php

require_once '/include/database.php';

if($_GET['action'] == 'delete_post')
{
    $id = $_GET['id'];
    post_delete($id);
    header('Location: /admin/admin.php');
}

if($_GET['action'] == 'delete')
{
    $id = $_GET['id'];
    post_delete($id);
    header('Location: /app/myCabinet.php');
}

if (isset($_POST['comment'])) {
    $id_post = $_POST['id_post'];
    $content = mysqli_real_escape_string($link, trim($_POST['content']));
    if (!empty($content)) {
        add_new_comment( $id_post, $content, $_COOKIE['username'], time());
        
        header('Location: /post.php?post_id='.$id_post);
    } 
}

function resize_image($type, $filename, $size) {
    switch ($type) {
        case 'jpeg':
            $img = imagecreatefromjpeg($filename);
            break;
        case 'png':
            $img = imagecreatefrompng($filename);
            break;
        default :
            return false;
    }
    $img_widgh = imageSX($img);
    $img_height = imageSY($img);

    if ($size == 's') {
        $size_img = 250;
    } else {
        $size_img = 384;
    }
    if ($img_widgh < $img_height) {
        $x = round($img_widgh / $size_img, 3);
    } else {
        $x = round($img_height / $size_img, 3);
    }

// $y = round($img_widgh / $size_img, 4);

    $new_wight = $img_widgh / $x;
    $new_height = $img_height / $x;

    $new_img = imagecreatetruecolor($new_wight, $new_height);

    imagecopyresampled($new_img, $img, 0, 0, 0, 0, $new_wight, $new_height, $img_widgh, $img_height);

    if ($size == 's') {

        switch ($type) {
            case 'jpeg':
                $res = imagejpeg($new_img, '../upload/mini/' . $_FILES['load']['name']);
                break;
            case 'png':
                $res = imagepng($new_img, '../upload/mini/' . $_FILES['load']['name']);
                break;
        }
    } else {
        switch ($type) {
            case 'jpeg':
                $res = imagejpeg($new_img, '../upload/medium/' . $_FILES['load']['name']);
                break;
            case 'png':
                $res = imagepng($new_img, '../upload/medium/' . $_FILES['load']['name']);
                break;
        }
    }
    imagedestroy($new_img);
    imagedestroy($img);

    if ($img_widgh > $img_height) {
        return 'h';
    } else {
        return 'v';
    }
}

function photo_processing() {

    if ($_FILES['load']['error'] == 0 && $_FILES['load']['size'] < 2 * 1024 * 1024) {
        switch ($_FILES['load']['type']) {

            case 'image/jpeg':
            case 'image/jpg':
            case 'image/pjpeg':
                $type = 'jpeg';
                break;

            case 'image/png':
            case 'image/x-png':
                $type = 'png';
                break;
            default :
                echo '<div class="alert alert-danger"> <b>Неверный тип изображения изображения</b> </div>';
                break;
        }
        if (move_uploaded_file($_FILES['load']['tmp_name'], '../upload/original/' . $_FILES['load']['name'])) {
            $img_position = resize_image($type, '../upload/original/' . $_FILES['load']['name'], 's');
            resize_image($type, '../upload/original/' . $_FILES['load']['name'], 'm');            
        } else {
            echo '<div class="alert alert-danger"> <b>Не удалось загрузить изображение</b> </div>';
        }
    } else {
        echo '<div class="alert alert-danger"> <b>Пост с изображением намного привлекательнее</b> </div>';
    }
    return $img_position;
}
