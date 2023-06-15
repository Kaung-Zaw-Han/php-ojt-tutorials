<?php
include '../database.php';
$year = date('Y');
$month = date('m');
$num_days = date('t', strtotime("$year-$month-01"));
$dates = [];
for ($day = 1; $day <= $num_days; $day++) {
    array_push($dates, date("$year-$month-$day"));
}
function monthly($month, $conn)
{
    $sql = "SELECT * FROM post WHERE DATE_FORMAT(created_datetime, '%Y-%m-%d') = '$month'";
    $run = mysqli_query($conn, $sql);
    $lists = mysqli_fetch_all($run, MYSQLI_ASSOC);
    $finalResult = count($lists);
    return $finalResult;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Page</title>
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
                <a href="monthly.php" class="btn btn-white border-dark ml-2" id="active">Monthly</a>
                <a href="yearly.php" class="btn btn-white border-dark ml-2">Yearly</a>
            </div>
        </div>
        <div style="width: 800px;"><canvas id="acquisitions"></canvas></div>
        <script>
            (async function() {
                const data = [
                    <?php for ($i = 0; $i < $num_days; $i++) : ?> {
                            week: '<?php echo $dates[$i]; ?>',
                            count: <?php echo monthly($dates[$i], $conn); ?>
                        },
                    <?php endfor; ?>
                ];
                new Chart(
                    document.getElementById('acquisitions'), {
                        type: 'bar',
                        data: {
                            labels: data.map(row => row.week),
                            datasets: [{
                                label: '# Monthly Created Post',
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