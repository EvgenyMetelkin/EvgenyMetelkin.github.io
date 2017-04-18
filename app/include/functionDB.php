<?php

function post_delete($id) {
    global $link;

    //убираем лишние пробелы с начала и c конца
    $id = (int) $id;

    $sql = "DELETE FROM `posts` WHERE `id`='$id'";

    $result = mysqli_query($link, $sql);

    if (!$result) {
        die(mysqli_errno($link));
    }
}

function post_edit($id, $title, $category, $image, $img_position, $content) {
    global $link;

    //убираем лишние пробелы с начала и c конца
    $title = trim($title);
    $category = trim($category);
    $content = trim($content);
    $id = (int) $id;

    $sql = "UPDATE `posts` SET title='$title', category='$category', image = '$image', imgposition = '$img_position', content='$content' WHERE id='$id'";

    $result = mysqli_query($link, $sql);

    if (!$result)
        die(mysqli_errno($link));
}

function add_new_post($username, $title, $category, $image, $img_position, $content, $time) {
    global $link;

    //убираем лишние пробелы с начала и конца
    $title = trim($title);
    $category = trim($category);
    $content = trim($content);

    if (empty($category)) {
        $category = "Не выбрано";
    }

    $sql = "INSERT INTO `posts` (username, title, category, image, imgposition, content, datetime) VALUES ('$username', '$title', '$category', '$image', '$img_position', '$content', '$time')";

    $result = mysqli_query($link, $sql);

    if (!$result)
        die(mysqli_errno($link));
}

function add_new_comment($id_post, $content, $username, $time) {
    global $link;
    //убираем лишние пробелы с начала и конца   
    $content = trim($content);
    
    $sql = "INSERT INTO `comment` (id_post, content, username, time) VALUES ('$id_post', '$content', '$username', '$time')";

    $result = mysqli_query($link, $sql);
}

function entrance_to_the_blog($username, $password) {
    global $link;

    $sql = "SELECT `id` , `username` FROM `signup` WHERE username = '$username' AND password = SHA('$password')";

    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        setcookie('id', $row['id'], time() + (60 * 60 * 24 * 4));
        setcookie('username', $row['username'], time() + (60 * 60 * 24 * 4));

        if (($username == "admin") && ($password == "admin")) {

            header('Location: /admin/admin.php');
        } else {
            $home_url = 'http://' . $_SERVER['HTTP_HOST'];
            //$home_url = 'http://index.php';
            header('Location: ' . $home_url);
            //mysqli_close($link);
            //exit();
        }
    } else {
        echo '<div class="alert alert-danger"> <b>Некорректное имя или пароль</b> </div>';
        //echo 'Зап уж сущ'; 
    }
}

function registration_on_the_blog($username, $password) {
    global $link;

    $sql = "SELECT * FROM `signup` WHERE username = '$username'";

    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) == 0) {
        $sql = "INSERT INTO `signup` (username, password) VALUES ('$username', SHA('$password'))";
        mysqli_query($link, $sql);
        echo '<div class="alert alert-success"> <b>Все готово, вы можете <a href="/index.php"> авторизоваться</a></b></div>';
        //mysqli_close($link);
        //exit();        
    } else {
        echo '<div class="alert alert-danger"> <b>Запись уже существует</b> </div>';
        //echo 'Зап уж сущ'; 
    }
}

function get_posts_from_database() {
    global $link;

    $sql = "SELECT * FROM posts ORDER BY likes DESC";

    $result = mysqli_query($link, $sql);

    if (!$result)
        die(mysqli_errno($link));

    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $posts;
}

function get_post_by_id_from_database($post_id) {
    global $link;

    //$sql = "SELECT * FROM `posts` WHERE id = '$post_id'";
    $sql = "SELECT * FROM `posts` WHERE id = " . $post_id;

    $result = mysqli_query($link, $sql);

    $post = mysqli_fetch_assoc($result);

    return $post;
}

function get_comments_by_id_from_database($post_id) {
    global $link;

    //$sql = "SELECT * FROM `posts` WHERE id = '$post_id'";
    $sql = "SELECT * FROM `comment` WHERE id_post = " . $post_id;

    $result = mysqli_query($link, $sql);

    $comments = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $comments;
}

function get_post_by_username_from_database($username) {
    global $link;

    $sql = "SELECT * FROM posts WHERE username = '$username'";

    $result = mysqli_query($link, $sql);

    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //$posts = mysqli_fetch_assoc($result);

    return $posts;
}

function boost_views($id, $views) {
    global $link;

    $sql = "UPDATE `posts` SET views = '$views' WHERE id = '$id'";

    $result = mysqli_query($link, $sql);

    //$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //$posts = mysqli_fetch_assoc($result);
}

function post_like($id_post, $username) {
    global $link;

    $sql = "SELECT `id_post` , `username` FROM `likes` WHERE id_post = '$id_post' AND username = '$username'";

    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) != 0) {
        return true;
    } else {
        return false;
    }
}

function boost_like($id_post, $username) {
    global $link;

    $sql = "SELECT * FROM posts WHERE id = '$id_post'";

    $result = mysqli_query($link, $sql);

    $post = mysqli_fetch_assoc($result);

    $like_count = $post['likes'] + 1;

    $sql = "UPDATE `posts` SET likes = '$like_count' WHERE id = '$id_post'";

    mysqli_query($link, $sql);

    $sql = "INSERT INTO `likes` (id_post, username) VALUES ('$id_post', '$username')";
    mysqli_query($link, $sql);
}
