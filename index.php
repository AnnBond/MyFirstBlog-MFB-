<?php
/*phpinfo();
die();*/
include ('posts.php');
include ('search.php');
include ('header.php');
?>
<section class="posts clearfix"> <!--All Posts Section-->
    <?php foreach ($blog_project as $post): ?>
        <div class="post">
            <p class="post-title"><?= $post['title'] ?></p>
            <p class="date"><?= $post['date']?></p>
            <p class="post-desc"><?= $post['description']?></p>
            <!--<a href="#" class="more">Read more...</a>-->
            <a href="edit.php?id=<?= $post['id'] ?>" class="editPost">EDIT post </a>
            <a href="delete.php?id=<?= $post['id'] ?>" class="deletePost">DELETE THIS POST</a>
        </div>
    <?php endforeach;?>
</section>
<div class="navigation"><!--Pagination-->
    <?php if($page != 1): ?>
        <a href="?page=1">First</a>
        <a href="?page=<?= ($page - 1) ?>">Previous</a>
        <?php endif ?>
    <?php for ($i = 0; $i < $pages; $i++): ?>
        <a href="?<?= http_build_query(array_merge($_GET, ['page'=> ($i+1)])) ?>"><?= ($i + 1) ?></a>
    <?php endfor; ?>
    <?php if($page != intval($pages)): ?>
        <a href="?page=<?= ($page + 1)?>">Next</a>
        <a href="?page=<?= intval($pages) ?>">Last</a>
    <?php endif ?>
</div>
<?php include ('footer.php'); ?>
