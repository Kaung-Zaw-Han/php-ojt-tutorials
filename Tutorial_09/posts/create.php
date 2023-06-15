<?php
include("../database.php");
$title = $content = "";
$titleError = $contentError = "";
if (isset($_POST['btnCreate'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    if (empty($title) && empty($content)) {
        $titleError = "Title field is required";
        $contentError = "Content field is required";
    } elseif (empty($title)) {
        $titleError = "Title field is required";
    } elseif (empty($content)) {
        $contentError = "Content field is required";
    } else {
        $check = isset($_POST['publish']) ? $_POST['publish'] = '1' : $_POST['publish'] = '0';

        $query = "INSERT INTO Post (title,content,is_published) VALUES ('$title','$content','$check')";

        $run = mysqli_query($conn, $query);
        if ($run) {
            header("Location: ../index.php");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Page</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../libs/css/bootstrap.min.css">
    <script src="../libs/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>Create Post</h2>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="mb-2">
                        <label for="" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" value="<?php echo $title?>">
                        <small class="text-danger"><?php echo $titleError ?></small>
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Content</label>
                        <textarea cols="30" rows="10" class="form-control" name="content"><?php echo $content?></textarea>
                        <small class="text-danger"><?php echo $contentError ?></small>
                    </div>
                    <div class="mb-2">
                        <input class="form-check-input" type="checkbox" name="publish">
                        <label class="form-check-label">Publish</label>
                    </div>
                    <div class="mb-2">
                        <a href="../index.php" class="btn btn-secondary">Back</a>
                        <input type="submit" value="Create" class="btn btn-primary float-end" name="btnCreate">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>