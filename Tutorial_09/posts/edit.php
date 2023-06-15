<?php
include("../database.php");
$titleError = $contentError = "";
if (isset($_GET['id'])) {
    $editId = $_GET['id'];
    $getData = "SELECT * FROM post WHERE id=$editId";
    $editResult = mysqli_query($conn, $getData);
    $post = mysqli_fetch_array($editResult);
}
if (isset($_POST['btnUpdate'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $id = $_POST['id'];
    if (empty($title) && empty($content)) {
        $titleError = "Title field is required";
        $contentError = "Content field is required";
    } elseif (empty($title)) {
        $titleError = "Title field is required";
    } elseif (empty($content)) {
        $contentError = "Content field is required";
    } else {
        $check = isset($_POST['publish']) ? $_POST['publish'] = '1' : $_POST['publish'] = '0';

        $query = "UPDATE tutorial08.post SET  title = '$title' , content = '$content', is_published= '$check' WHERE id = $id ";

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
                <h2>Post Edit</h2>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?php echo $post['id'] ?>">
                    <div class="mb-2">
                        <label for="" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" value="<?php echo $post['title'] ?>">
                        <small class="text-danger"><?php echo $titleError; ?></small>
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Content</label>
                        <textarea cols="30" rows="10" class="form-control" name="content"><?php echo $post['content'] ?></textarea>
                        <small class="text-danger"><?php echo $contentError; ?></small>
                    </div>
                    <div class="mb-2">
                        <input class="form-check-input" <?php if ($post['is_published'] == '1') {
                                                            echo 'checked';
                                                        } ?> type="checkbox" name="publish" value="<?php echo ($post['is_published'] == '1') ? "Published" : "UnPublished" ?>">
                        <label class="form-check-label">Publish</label>
                    </div>
                    <div class="mb-2">
                        <a href="../index.php" class="btn btn-secondary">Back</a>
                        <input type="submit" value="Update" class="btn btn-primary float-end" name="btnUpdate">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>