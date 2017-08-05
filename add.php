<?php
include_once('db.php');

if (isset($_POST['add'])) {
    if (!empty($_POST['title']) && !empty($_POST['description'])) {
        $STH = $DBH->prepare("INSERT INTO post (title, description, date) VALUES (:title, :description, CURRENT_DATE())");
        $STH->bindParam(":title", $_POST["title"]);
        $STH->bindParam(":description", $_POST["description"]);
        $STH->execute();
        header('Location:index.php');
    } else {
        echo '<style>
        .errors {
        display: block !important;
        }
        </style>';
    }
}

include ('header.php');
?>
            <section class="addPost clearfix">
                <form class="newPost" method="post" action="add.php">
                    <label>Title: <br>
                        <input type="text" class="add-post-title" name="title" placeholder="Title of post" required/>
                    </label>
                    <label>Post:
                        <textarea name="description" cols="74" rows="10" placeholder="Some interesting..." required></textarea>
                    </label>
                    <button type="submit" class="submit" name="add">Submit</button>
                </form>
                <p class="errors">Fill all inputs, please !!!!!!!!!!!!!!!!!!!</p>
            </section>
        </div>
    </body>
</html>
