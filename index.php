<?php
require_once 'app/include/database.php';

include 'app/header.php';   
?>

<title>Блогг</title>

<div class="container">
    <div class="row">
        <div >            
            <h2>Наиболее популярная статья:</h2>
        </div>
        <div class="col-md-9">

            <?php
            $posts = get_posts_from_database();
            $count = 1;
            ?>          

            <?php foreach ($posts as $post): ?>
                <?php if ($count == 1) { ?>

                    <div class="row">

                        <div <?php if ($post['imgposition'] == "v") { ?>class="col-lg-6 col-md-12"  <?php } else { ?> class="col-lg-12 col-md-12" <?php } ?>>
                            <h2><a  href="/post.php?post_id=<?= $post['id'] ?>"><b><?= $post['title'] ?></b></a></h2>
                            <?php if ($post['image'] != "") { ?>
                                <a href="post.php?post_id=<?= $post['id'] ?>" class="img-thumbnail"> 
                                    <img src="upload/medium/<?= $post['image'] ?>" alt=""></img>                     
                                </a>
                            <?php } ?>
                        </div >
                        <div style="padding:  10px 0 0 0; "<?php
                        if ($post['imgposition'] == "v") {
                            $tit = 921;
                            ?> class="col-lg-6 col-md-12"  <?php
                             } else {
                                 $tit = 444;
                                 ?> class="col-lg-12 col-md-12" <?php } ?>>

                            <p>
                                <?= mb_substr($post['content'], 0, $tit, 'UTF-8') . '...' ?>
                            </p>
                            <p><a class="btn btn-info btn-sm" href="/post.php?post_id=<?= $post['id'] ?>">Читать полностью</a></p>
                            <br/>
                            <ul class="list-inline" >
                                <li><i class="fa fa-list"></i> <?= $post['category'] ?> | </li>
                                <li><i class="fa fa-user"></i> <?= $post['username'] ?> | </li>
                                <li><i class="fa fa-calendar"></i> <?= date("d-m-Y ", $post['datetime']) ?>  | </li>
                                <li><i class="fa fa-comment"></i> <?=count(get_comments_by_id_from_database($post['id']))?> Comments | </li>
                                <li><i class="fa fa-eye"></i>  <?= $post['views'] ?> | </li>                                
                                <li><i class="fa fa-thumbs-up"></i>  <?= $post['likes'] ?></li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <br>
                    <hr>
                    <h1>Все записи:</h1>
                <?php } else { ?>

                    <!------------------------------------------------------------------------------------------------------>

                    <div class="row">
                        <?php if ($post['image'] != "") { ?>
                            <div <?php if ($post['imgposition'] == "v") { ?>class="col-lg-4 col-md-11"ol-md-11  <?php } else { ?> class="col-lg-7 col-md-11" <?php } ?>>
                                <a href="/post.php?post_id=<?= $post['id'] ?>" class="img-thumbnail"> 
                                    <img src="/upload/mini/<?= $post['image'] ?>" alt=""></img>                     
                                </a>

                            </div>
                        <?php } ?>
                        <div <?php
                        if ($post['image'] == "") {
                            $tit = 774;
                            ?> class="col-lg-11 col-md-11"  <?php
                            } elseif ($post['imgposition'] == "v") {
                                $tit = 574;
                                ?> class="col-lg-7 col-md-11"  <?php
                            } else {
                                $tit = 264;
                                ?> class="col-lg-4 col-md-11" <?php } ?>>
                            <h4><a href="/post.php?post_id=<?= $post['id'] ?>"><?= $post['title'] ?></a></h4>
                            <p>
                                <?= mb_substr($post['content'], 0, $tit, 'UTF-8') . '...' ?>
                            </p>
                            <p><a class="btn btn-info btn-sm" href="/post.php?post_id=<?= $post['id'] ?>">Читать полностью</a></p>
                            <br/>

                        </div>
                        <div class="col-md-7" >
                            <ul class="list-inline" >
                                <li><i class="fa fa-list"></i> <?= $post['category'] ?> | </li>
                                <li><i class="fa fa-user"></i> <?= $post['username'] ?> | </li>
                                <li><i class="fa fa-calendar"></i> <?= date("d-m-Y ", $post['datetime']) ?>  | </li>
                                <li><i class="fa fa-comment"></i> <?=count(get_comments_by_id_from_database($post['id']))?> | </li>
                                <li><i class="fa fa-eye"></i>  <?= $post['views'] ?>  | </li>
                                <li><i class="fa fa-thumbs-up"></i>  <?= $post['likes'] ?></li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <?php
                }$count++;
            endforeach;
            ?>
        </div>
    </div>
</div>
<?php
include 'app/footer.php';
