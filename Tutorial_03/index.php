<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="libs/css/bootstrap.min.css">
    <script src="libs/js/bootstrap.min.js"></script>
</head>
<body>
    <?php
    session_start();
    $errorDate = "";
    if (isset($_POST['btnSave'])) {
        if (empty($_POST['date'])) {
            $errorDate = "data field is required";
        } else {
            $date = $_POST['date'];
            $currentDate = date("Y-m-d");
            if ($date > $currentDate) {
                $_SESSION['error'] = "date must not greater than or equal tomorrow";
            } else {
                $diff = date_diff(date_create($date), date_create($currentDate));
                if ($diff->format('%y') == 0 || $diff->format('%y') == 1) {
                    $resultYear = " Year , ";
                } else {
                    $resultYear = " Years , ";
                }
                if ($diff->format('%m') == 0 || $diff->format('%m') == 1) {
                    $resultMonth = " month and ";
                } else {
                    $resultMonth = " months and ";
                }
                if ($diff->format('%d') == 0 || $diff->format('%d') == 1) {
                    $resultDay = " day";
                } else {
                    $resultDay = " days";
                }
                $_SESSION['message'] = "Your age is "
                    . $diff->format('%y') . $resultYear
                    . $diff->format('%m') . $resultMonth
                    . $diff->format('%d') . $resultDay;
            }
        }
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-5 offset-3">
                <?php
                if (isset($_SESSION['message'])) {
                ?>
                    <div class="alert alert-primary" role="alert">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                <?php
                    unset($_SESSION['message']);
                }
                ?>
                <?php
                if (isset($_SESSION['error'])) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION['error']; ?>
                    </div>
                <?php
                    unset($_SESSION['error']);
                }
                ?>
                <div class="card mt-5">
                    <div class="card-header bg-secondary-subtle">
                        <h1 class="text-black  fs-2 text-center">Age Calculator</h1>
                    </div>
                    <form method="POST">
                        <div class="card-body d-flex col-10 offset-2">
                            <label for="dateOfBirth" class="col-4 pt-2">Date of birth :</label>
                            <div class="col-8">
                                <input type="date" name="date" class="form-control w-75" id="dateOfBirth">
                                <span class="text-danger"><?php echo $errorDate; ?></span>
                            </div>
                        </div>
                        <div class="col-10 offset-1">
                            <input type="submit" name="btnSave" class="form-control btn btn-primary text-white mb-2 p-2" value="Calculate">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>