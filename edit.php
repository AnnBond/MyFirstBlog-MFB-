<?php
include_once('db.php');

    $idPost = $_GET['id'];
    $STH = $DBH->query("SELECT * FROM post WHERE id = '$idPost'");
    $STH->setFetchMode(PDO::FETCH_ASSOC);
    $STH->execute();
    $blog_project = $STH->fetchAll();

if (isset($_POST['edit'])) {

    $STH = $DBH->prepare("UPDATE post SET title=:title, description=:description WHERE id='$idPost'");
    $STH->bindParam(":title", $_POST["title"]);
    $STH->bindParam(":description", $_POST["description"]);
    $STH->execute();
    header('Location:index.php');
}

include ('header.php');
?>
            <section class="addPost clearfix">
                <?php foreach ($blog_project as $post): ?>
                    <form class="newPost" method="post" action="edit.php?id=<?= $_GET['id']?>">
                        <label>Title: <br> <input type="text" class="add-post-title" name="title" placeholder="Title of post" value="<?= isset($post['title']) ? htmlspecialchars($post['title']) : '' ?>" required />
                        </label>
                        <label>Post:
                            <textarea name="description" cols="74" rows="10" placeholder="Some interesting...">
                                <?= isset($post['description']) ? htmlspecialchars($post['description']) : '' ?>
                            </textarea>
                        </label>
                        <button type="submit" class="edit" name="edit" value="edit">Submit</button>
                    </form>
                <?php endforeach;?>
            </section>
        </div>
    </body>
</html>
