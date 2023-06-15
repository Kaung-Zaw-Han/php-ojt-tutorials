<?php
include("database.php");
// include("seeder.php");
$sql = "SELECT * FROM tutorial08.post";
$posts = mysqli_query($conn, $sql);
if (isset($_GET['id'])) {

    $deleteId = $_GET['id'];
    $deletePost = "DELETE FROM post WHERE id=$deleteId";
    $deleteResult = mysqli_query($conn, $deletePost);
    if ($deleteResult == true) {
        echo "<script>window.location='index.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Page</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="libs/css/bootstrap.min.css">
    <script src="libs/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-12 mb-2">
                <a href="./posts/create.php" class="btn btn-primary">Create</a>
                <a href="./graph/weekly.php" class="btn btn-primary">Graph</a>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2>Post List</h2>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>id</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Is Published</th>
                                <th>Created Date</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($posts as $post) :
                                ?>
                                    <tr>
                                        <td><?php echo $post['id']; ?></td>
                                        <td><?php echo $post['title']; ?></td>
                                        <td><?php echo $post['content']; ?></td>
                                        <td><?php echo ($post['is_published'] == '1') ? "Published" : "UnPublished" ?></td>
                                        <td><?php echo date('M d, Y', strtotime($post['created_datetime'])); ?>
                                        </td>
                                        <td>
                                            <a href="posts/detail.php?id=<?php echo $post['id']; ?>" class="btn btn-info btn-sm">View</a>
                                            <a href="posts/edit.php?id=<?php echo $post['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                            <a href="index.php?id=<?php echo $post['id']; ?>" name="delete" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>