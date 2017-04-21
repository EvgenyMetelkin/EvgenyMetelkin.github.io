<?php
require_once 'include/database.php';
require_once '/function.php';

include 'header.php';

if ($_GET['action'] == 'edit') {
    $id = $_GET['id'];
    $article = get_post_by_id_from_database($id);
}

if (isset($_POST['submit_2'])) {
    $id = $_POST['id'];

    $img_position = $_POST['imgposition'];
    $img_name = $_POST['image'];

    $title = mysqli_real_escape_string($link, trim($_POST['title']));
    $category = mysqli_real_escape_string($link, trim($_POST['category']));
    $content = mysqli_real_escape_string($link, trim($_POST['content']));
    if (!empty($title) && !empty($category) && !empty($content)) {
        post_edit($id, $title, $category, $img_name, $img_position, $content);
        echo '<div class="alert alert-info"> <b>Запись отредактированна</b> </div>';
    } else {
        echo '<div class="alert alert-danger"> <b>НЕкорректный ввод, повторите попытку</b> </div>';
    }
}


if (isset($_POST['submit_1'])) {
    if (!empty($_FILES['load'])) {
        $img_position = photo_processing();
        $img_name = $_FILES['load']['name'];
    } else {
        echo '<div class="alert alert-danger"> <b>Пост без изображения не так привлекателен</b> </div>';
    }

    $title = mysqli_real_escape_string($link, trim($_POST['title']));
    $category = mysqli_real_escape_string($link, trim($_POST['category']));
    $content = mysqli_real_escape_string($link, trim($_POST['content']));
    if (!empty($title) && !empty($category) && !empty($content)) {
        add_new_post($_COOKIE['username'], $title, $category, $img_name, $img_position, $content, time());
        echo '<div class="alert alert-info"> <b>Запись добавлена</b> </div>';
    } else {
        echo '<div class="alert alert-danger"> <b>НЕкорректный ввод, повторите попытку</b> </div>';
    }
}
?>

<title>Новый пост</title>


<div class="container">
    <h1>Редактирование блога</h1>   

    <?php if ($_COOKIE['username'] == 'admin') { ?>
        <h2><a href="../admin/admin.php">Назад</a></h1> 
        <?php } else { ?>
            <h2><a href="/app/myCabinet.php">Назад</a></h1> 
            <?php } ?>

            <div>
                <form method="POST" action="addPost.php" class="navbar-nav" enctype="multipart/form-data" style="padding:  0 0 0 14px;">
                    <h2 >  Название статьи</h2>
                    <div class="form-group" >
                        <label><input class="form-control" type="text" name="title" value="<?= $article['title'] ?>" autofocus required></label>
                    </div>

                    <h2 >  Категория</h2>
                    <div class="form-group" >
                        <label><input class="form-control" type="text" name="category" value="<?= $article['category'] ?>" required></label>
                    </div>

                    <input type="file" name="load" value="<?= $article['image'] ?>">

                    <input type="hidden" name="id" value="<?= $article['id'] ?>">
                    <input type="hidden" name="image" value="<?= $article['image'] ?>">
                    <input type="hidden" name="imgposition" value="<?= $article['imgposition'] ?>">

                    <h2 >  Текст статьи </h2>
                    <div class="form-group" >
                        <label><textarea class="form-control" rows="8" cols="74" type="text" name="content" required><?= $article['content'] ?></textarea></label>
                    </div>  
                    <?php if ($_GET['action'] == "edit") { ?>
                        <input class="btn btn-primary" type="submit" name="submit_2" value="Редактировать"></input> 
                        <? } else { ?>
                        <input class="btn btn-primary" type="submit" name="submit_1" value="Cохранить"></input> 
                    <?php } ?>
                </form>       
            </div>
            </div>


