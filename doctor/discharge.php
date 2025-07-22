<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Patient Appointment</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php
    include("../include/header.php");
    include("../include/connection.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php include("sidenav.php"); ?>
                </div>
                <div class="col-md-10">
                    <h5 class="text-center my-2">Total Appointment</h5>
                    <?php
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $query = "SELECT * FROM appointment WHERE id = '$id'";
                        $res = mysqli_query($connect, $query);
                        $row = mysqli_fetch_array($res);
                    }
                    ?>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <tr>
                                        <th colspan="2" class="text-center">Appointment Details</th>
                                    </tr>
                                    <tr>
                                        <td>Firstname</td>
                                        <td><?php echo $row['firstname']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Surname</td>
                                        <td><?php echo $row['surname']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td><?php echo $row['gender']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Phone No.</td>
                                        <td><?php echo $row['phone']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Appointment Date</td>
                                        <td><?php echo $row['appointment_date']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Symptoms</td>
                                        <td><?php echo $row['symptoms']; ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header bg-primary text-white">
                                        <h5 class="card-title mb-0">Invoice & Prescription</h5>
                                    </div>
                                    <div class="card-body">
                                        <?php
                                        if (isset($_POST['send'])) {
                                            $fee = $_POST['fee'];
                                            $des = $_POST['des'];
                                            $med_name = $_POST['med_name'];
                                            $dosage = $_POST['dosage'];
                                            $frequency = $_POST['frequency'];
                                            $duration = $_POST['duration'];
                                            $instructions = $_POST['instructions'];

                                            if (empty($fee)) {
                                                echo '<div class="alert alert-danger">Enter Fee Amount</div>';
                                            } elseif (empty($des)) {
                                                echo '<div class="alert alert-danger">Enter Description</div>';
                                            } else {
                                                $doc = $_SESSION['doctor'];
                                                $fname = $row['firstname'];

                                                $query = "INSERT INTO income(
                                                doctor, patient, date_discharge, amount_paid, description, 
                                                med_name, dosage, frequency, duration, instructions
                                            ) VALUES(
                                                '$doc', '$fname', NOW(), '$fee', '$des', 
                                                '$med_name', '$dosage', '$frequency', '$duration', '$instructions'
                                            )";

                                                $res = mysqli_query($connect, $query);

                                                if ($res) {
                                                    echo '<div class="alert alert-success">Invoice and Prescription Sent Successfully</div>';
                                                    mysqli_query($connect, "UPDATE appointment SET status ='Discharge' WHERE id = '$id' ");
                                                } else {
                                                    echo '<div class="alert alert-danger">Failed to Send Invoice: ' . mysqli_error($connect) . '</div>';
                                                }
                                            }
                                        }
                                        ?>

                                        <form method="post">
                                            <div class="mb-3">
                                                <label class="form-label">Fee</label>
                                                <input type="number" name="fee" class="form-control"
                                                    placeholder="Enter Patient Fee">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Description</label>
                                                <input type="text" name="des" class="form-control"
                                                    placeholder="Enter Description">
                                            </div>

                                            <div class="mb-3 border p-3 rounded">
                                                <h6 class="mb-3">Medication Details</h6>

                                                <div class="mb-3">
                                                    <label class="form-label">Medicine Name</label>
                                                    <input type="text" name="med_name" class="form-control"
                                                        placeholder="Enter medicine name">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Dosage</label>
                                                    <input type="text" name="dosage" class="form-control"
                                                        placeholder="e.g., 1 tablet, 5ml">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Frequency</label>
                                                    <select name="frequency" class="form-select">
                                                        <option value="Once daily">Once daily</option>
                                                        <option value="Twice daily (Morning & Night)">Twice daily
                                                            (Morning & Night)</option>
                                                        <option value="Three times daily (Morning, Afternoon, Night)">
                                                            Three times daily (Morning, Afternoon, Night)</option>
                                                        <option value="Four times daily">Four times daily</option>
                                                        <option value="Every 4 hours">Every 4 hours</option>
                                                        <option value="Every 6 hours">Every 6 hours</option>
                                                        <option value="Every 8 hours">Every 8 hours</option>
                                                        <option value="As needed">As needed</option>
                                                        <option value="Other">Other (specify in instructions)</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Duration</label>
                                                    <select name="duration" class="form-select">
                                                        <option value="1 day">1 day</option>
                                                        <option value="3 days">3 days</option>
                                                        <option value="5 days">5 days</option>
                                                        <option value="7 days" selected>7 days</option>
                                                        <option value="10 days">10 days</option>
                                                        <option value="14 days">14 days</option>
                                                        <option value="30 days">30 days</option>
                                                        <option value="Until finished">Until finished</option>
                                                        <option value="Other">Other (specify in instructions)</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Special Instructions</label>
                                                    <textarea name="instructions" class="form-control" rows="3"
                                                        placeholder="e.g., Take with food, Avoid alcohol, etc."></textarea>
                                                </div>
                                            </div>

                                            <button type="submit" name="send" class="btn btn-primary">Send Invoice &
                                                Prescription</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>