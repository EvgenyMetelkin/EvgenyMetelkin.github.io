<?php
require_once 'app/include/database.php';

$post_id = $_GET['post_id']; //передача get пaраметра
$update = $_GET['update'];

if (!is_numeric($post_id))
    exit(); //проверка что в данной переменной число 

include 'app/header.php';

$postt = get_post_by_id_from_database($post_id); //получаем массив поста
$comments = get_comments_by_id_from_database($post_id);

if ($update != "no") {
    $count_views = $postt['views']; //увеличиваем колличество просмотров
    $count_views++;

    boost_views($post_id, $count_views);
}

if (isset($_POST['submit']) && ($_COOKIE['username'] != "") && ((!post_like($post_id, $_COOKIE['username'])) || ($_COOKIE['username'] == "admin"))) {
    boost_like($post_id, $_COOKIE['username']);
}

//if (isset($_POST['comment'])) {
//    $id_post = $_POST['id_post'];
//    $content = mysqli_real_escape_string($link, trim($_POST['content']));
//    if (!empty($content)) {
//        echo 'asdf';
//        add_new_comment( $id_post, $content, $_COOKIE['username'], time());
//    } 
//}post.php?post_id=<?= $post_id ?..>
?>

<title><?= $postt['title'] ?></title>

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="">
                <h1><?= $postt['title'] ?></h1>
            </div>
            <ul class="list-inline">
                <li><i class="fa fa-list"></i> <?= $postt['category'] ?> | </li>
                <li><i class="fa fa-user"></i> <?= $postt['username'] ?> | </li>
                <li><i class="fa fa-calendar"></i> <?= date("H:i:s d-m-Y  ", $postt['datetime']) ?> | </li>
                <li><i class="fa fa-comment"></i> <?= count(get_comments_by_id_from_database($post_id)) ?> Comments | </li>
                <li><i class="fa fa-eye"></i> <?= $postt['views'] ?> | </li>              
                <li><i class="fa fa-thumbs-up"></i>  <?= $postt['likes'] ?></li>
            </ul>
            <hr>
            <div class="post-content"> <!--необходимо добавить стиль для текста -->
                <div <?php if ($postt['image'] != "") {
    if ($postt['imgposition'] == "h") { ?> class="col-md-12" <?php } ?>> <img src="/upload/medium/<?= $postt['image'] ?>"  align="left" style="padding:  0 20px 10px 0;" </img><?php } ?></div> 
                <div>   <?= $postt['content'] ?>  </div>       
            </div>  
            <form method="POST" action="post.php?post_id=<?= $post_id ?>&update=no" align="right" style="padding:  10px 10px 0 0;">
                <input class="btn btn-primary <?php if (post_like($post_id, $_COOKIE['username']) || $_COOKIE['username'] == "") { ?> disabled <?php } ?>"  type="submit"  name="submit" value="Пост достоин уважения"></input> 
            </form>  
            <hr>
        </div>

        <div class="row col-md-9">
            <h3>Коментарии:</h3>
<?php foreach ($comments as $comment): ?>
            <div class="col-md-2" ><b><?= $comment['username'] ?></b></div>   
                <div class="col-md-6"><?= $comment['content'] ?></div>   
                <div class="col-md-4"><?= date("H:i:s d-m-Y  ", $comment['time']) ?></div> 
                <div class="col-md-2"><hr></div> 
                <div class="col-md-10"><hr></div> 
<?php endforeach; ?> 
            <form  method="POST" action="app/function.php" class="navbar-nav" style="padding:  10px 0 0 0">

                <div class="col-md-2"><b><?= $_COOKIE['username'] ?></b></div>  
                <div class="form-group col-md-6" >
                    <label><textarea class="form-control"  cols="94" type="text" name="content" required></textarea></label>
                </div>  
                <input class="btn btn-primary col-md-3" type="submit" name="comment" value="Комментировать"></input> 
                <div class="col-md-1">  
                    <input type="hidden" name="id_post" value="<?= $post_id ?>"> 
                </div>  

            </form>     
        </div>
    </div>
</div>

<?php
include 'app/footer.php';
