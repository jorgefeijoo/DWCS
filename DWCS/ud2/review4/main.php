<?php
require_once("Operations.php");
$obx = new Operations();
$post = new Post();
$section = "";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .post-content {
            display: none;
        }


        .post-content:target {
            display: block;
        }
    </style>
</head>

<body>
    <h1>POSTS</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <ul>
            <?php
            $postList = $obx->getAllPost();

            for ($i = 0; $i < count($postList); $i++) {
                echo "<li>" . "<a href='#$i'>" . $postList[$i]->getTitle() . "</a>" . "</li>";

                $section .= "<section id = '$i' class='post-content'>" .
                    "<h2>" .
                    $postList[$i]->getTitle() .
                    "</h2>" .
                    "<p>" .
                    $postList[$i]->getContents() .
                    "</p>" .

                    "</section>";
            }
            ?>
        </ul>

        <a href="addPost.php">
            <input type="submit" value="Add a new post">
        </a>

        <?php
        echo $section
        ?>
        <br>

    </form>




</body>

</html>