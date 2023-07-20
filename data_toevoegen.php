<?php
// includes 
include('header.php');
include('dbcon.php');
?>
<!DOCTYPE html>
<html lang="en">

<!-- header -->
<div class="box1">
    <h2>STUDENTEN</h2>
    <button class="btn btn-primary">Student toevoegen</button>
</div>

<!-- tabel -->
<table class="table table-hover table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Voornaam</th>
            <th>Achternaam</th>
            <th>Leeftijd</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>


        <?php
        // Data tabel laden
        try {
            $query = "SELECT * FROM `studenten`";
            $result = mysqli_query($conn, $query);
            $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

            foreach ($result as $row) {
        ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['voornaam'] ?></td>
                    <td><?php echo $row['achternaam'] ?></td>
                    <td><?php echo $row['leeftijd'] ?></td>
                    <td><a href="#" class="btn btn-success">Update</a></td>
                    <td><a href="#" class="btn btn-danger">Delete</a></td>
                </tr>
        <?php
            }
        } catch (Exception $e) {
            $error = $e->getMessage();
            echo "Query failed: " . $error;
        }
        ?>


    </tbody>
</table>
<?php
$voornaam = "";
$achternaam = "";
$leeftijd = "";
$voornaam_error = "";
$achternaam_error = "";
$leeftijd_error = "";
$error = "";
if (isset($_POST['toevoegen_studenten'])) {

    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $leeftijd = $_POST['leeftijd'];


    if ($voornaam == "" || empty($voornaam) || $achternaam == "" || empty($achternaam) || $leeftijd == "" || empty($leeftijd)) {
        $message = "";
        if ($voornaam == "" || empty($voornaam)) {
            $voornaam_error = "Vul een voornaam in!";
        }
        if ($achternaam == "" || empty($achternaam)) {
            $achternaam_error = "Vul een achternaam in!";
        }
        if ($leeftijd == "" || empty($leeftijd)) {
            $leeftijd_error = "Vul een leeftijd in!";
        }
    } else {
        try {
            $query = "INSERT INTO `studenten` (`voornaam`, `achternaam`, `leeftijd`) VALUES ('$voornaam', '$achternaam', '$leeftijd')";
            $result =  mysqli_query($conn, $query);
            header('location:index.php');
        } catch (Exception $e) {
            $error = $e->getMessage();
            echo "Query werkt niet: " . $error;
        }
    }
}
?>

<div class="overlay"></div>
<form action="data_toevoegen.php" method="post" id="modal">
    <div class="my-modal">
        <div class="my-modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Student toevoegen</h1>
                <a href="index.php"><button type="button" class="btn-close"></button></a>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="voornaam">Voornaam</label>
                    <input type="text" name="voornaam" class="form-control" value="<?php echo $voornaam ?>">
                    <p style="color: red; font-weight:500; text-align:center"><?php echo $voornaam_error ?></p>
                </div>
                <div class="form-group">
                    <label for="voornaam">Achternaam</label>
                    <input type="text" name="achternaam" class="form-control" value="<?php echo $achternaam ?>">
                    <p style="color: red; font-weight: 500; text-align:center"><?php echo $achternaam_error ?></p>
                </div>
                <div class=" form-group">
                    <label for="voornaam">Leeftijd</label>
                    <input type="text" name="leeftijd" class="form-control" value="<?php echo $leeftijd ?>">
                    <p style="color: red; font-weight: 500; text-align:center"><?php echo $leeftijd_error ?></p>
                </div>
            </div>
            <p style="color: red; font-weight: 500; text-align:center"><?php echo $error ?></p>
            <div class=" modal-footer">
                <a href="index.php"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sluiten</button></a>
                <input type="submit" class="btn btn-success" name="toevoegen_studenten" value="Toevoegen">
            </div>
        </div>
    </div>
</form>
<?php
include('footer.php');
?>