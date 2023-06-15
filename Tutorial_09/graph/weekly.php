<?php
include '../database.php';
$weeks = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
function weekly($week, $conn)
{
    $sql = "SELECT * FROM post WHERE DAYOFWEEK(created_datetime) = $week";
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
    <title>Weekly Page</title>
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
                <a href="weekly.php" class="btn btn-white border-dark ml-2" id="active">Weekly</a>
                <a href="monthly.php" class="btn btn-white border-dark ml-2">Monthly</a>
                <a href="yearly.php" class="btn btn-white border-dark ml-2">Yearly</a>
            </div>
        </div>
        <div style="width: 800px;"><canvas id="acquisitions"></canvas></div>
        <script>
            (async function() {
                const data = [{
                        week: '<?php echo $weeks[1]; ?>',
                        count: <?php echo weekly(1, $conn); ?>
                    },
                    {
                        week: '<?php echo $weeks[2]; ?>',
                        count: <?php echo weekly(2, $conn); ?>
                    },
                    {
                        week: '<?php echo $weeks[3]; ?>',
                        count: <?php echo weekly(3, $conn) ?>
                    },
                    {
                        week: '<?php echo $weeks[4]; ?>',
                        count: <?php echo weekly(4, $conn) ?>
                    },
                    {
                        week: '<?php echo $weeks[5]; ?>',
                        count: <?php echo weekly(5, $conn); ?>
                    },
                    {
                        week: '<?php echo $weeks[6]; ?>',
                        count: <?php echo weekly(6, $conn); ?>
                    },
                    {
                        week: '<?php echo $weeks[0]; ?>',
                        count: <?php echo weekly(0, $conn); ?>
                    },
                ];

                new Chart(
                    document.getElementById('acquisitions'), {
                        type: 'bar',
                        data: {
                            labels: data.map(row => row.week),
                            datasets: [{
                                label: '# Weekly Created Post',
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