<?php
include '../database.php';
function year($year, $conn)
{
    $sql = "SELECT * FROM post WHERE MONTH(created_datetime) = $year";
    $results = mysqli_query($conn, $sql);
    $lists = mysqli_fetch_all($results, MYSQLI_ASSOC);
    $year = count($lists);
    return $year;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yearly Page</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../libs/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>
    <script src="../libs/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="gp-btn mt-5">
            <a href="../index.php" class="btn btn-secondary">Back</a>
            <div class="float-end">
                <a href="weekly.php" class="btn btn-white border-dark ml-2">Weekly</a>
                <a href="monthly.php" class="btn btn-white border-dark ml-2">Monthly</a>
                <a href="yearly.php" class="btn btn-white border-dark ml-2" id="active">Yearly</a>
            </div>
        </div>
        <div style="width: 800px;"><canvas id="acquisitions"></canvas></div>
        <script>
            (async function() {
                const data = [{
                        year: 'January',
                        count: <?php echo year(1, $conn); ?>
                    },
                    {
                        year: 'February',
                        count: <?php echo year(2, $conn); ?>
                    },
                    {
                        year: 'March',
                        count: <?php echo year(3, $conn); ?>
                    },
                    {
                        year: 'April',
                        count: <?php echo year(4, $conn); ?>
                    },
                    {
                        year: 'May',
                        count: <?php echo year(5, $conn); ?>
                    },
                    {
                        year: 'June',
                        count: <?php echo year(6, $conn); ?>
                    },
                    {
                        year: 'July',
                        count: <?php echo year(7, $conn); ?>
                    },
                    {
                        year: 'August',
                        count: <?php echo year(8, $conn); ?>
                    },
                    {
                        year: 'September',
                        count: <?php echo year(9, $conn); ?>
                    },
                    {
                        year: 'October',
                        count: <?php echo year(10, $conn); ?>
                    },
                    {
                        year: 'November',
                        count: <?php echo year(11, $conn); ?>
                    },
                    {
                        year: 'December',
                        count: <?php echo year(12, $conn); ?>
                    },
                ];
                new Chart(
                    document.getElementById('acquisitions'), {
                        type: 'bar',
                        data: {
                            labels: data.map(row => row.year),
                            datasets: [{
                                label: 'Yearly Created Post',
                                data: data.map(row => row.count)
                            }]
                        }
                    }
                );
            })();
        </script>
    </div>
</body>
</html>