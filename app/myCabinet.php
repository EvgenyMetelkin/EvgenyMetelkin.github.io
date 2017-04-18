<?php
require_once '/include/database.php';

include '/header.php';

$articles = get_post_by_username_from_database($_COOKIE['username']);
?>

<title>Мой кабинет</title>


<div class="container">  
    <br>
    <h1>Мои статьи:</h1>   
    <h2><a href="../app/addPost.php">Создать статью</a></h1>   


        <div>
            <table class="table table-striped">
                <tr class="info">
                    <th>Дата</th>
                    <th>Заголовок</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($articles as $a): ?>
                    <tr>
                        <th><?= date(" d-m-Y H:i:s ", $a['datetime']) ?></th>
                        <th><?= $a['title'] ?></th>
                        <th>
                            <a href="../app/addPost.php?action=edit&id=<?= $a['id'] ?>">Редактировать</a>
                        </th>
                        <th>
                            <a href="/app/function.php?action=delete&id=<?= $a['id'] ?>">Удалить</a>
                        </th>
                    </tr>               
                <?php endforeach ?>
            </table>
        </div>
</div>

