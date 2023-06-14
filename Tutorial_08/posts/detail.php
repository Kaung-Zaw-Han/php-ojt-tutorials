<?php
include("../database.php");
if (isset($_GET['id'])) {
    // echo $_GET['id'];
    $viewId = $_GET['id'];
    $read = "SELECT * FROM tutorial08.post WHERE id = $viewId";
    $viewResult = mysqli_query($conn, $read);
    $post = mysqli_fetch_array($viewResult);
    // echo gettype($post['created_datetime']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Page</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../libs/css/bootstrap.min.css">
    <script src="../libs/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>Post Detail</h2>
            </div>
            <div class="card-body">
                <h3><?php echo $post['title']; ?></h3>
                <span><i><?php echo ($post['is_published'] == '1') ? "Published" : "UnPublished" ?></i></span> at
                <span><?php echo date('M d, Y', strtotime($post['created_datetime'])); ?></span>
                <p class="my-2"></p><?php echo $post['content']; ?></p>
                <div class="mb-2">
                    <a href="../index.php" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>