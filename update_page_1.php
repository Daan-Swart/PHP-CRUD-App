<?php
include('header.php');
include('dbcon.php');
?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    try {
        $query = "SELECT * FROM `studenten` WHERE `id` = '$id'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        // print_r($row);
    } catch (Exception $e) {
        $error = $e->getMessage();
        echo "Query failed: " . $error;
        die();
    }
}

if(isset($_POST['update_student'])){
    if(isset($_GET['id_new'])){
        $idnew = $_GET['id_new'];    
    }
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $leeftijd = $_POST['leeftijd'];
    try {
        $query = "UPDATE `studenten` SET `voornaam` = '$voornaam', `achternaam` = '$achternaam', `leeftijd` = '$leeftijd' WHERE `id` = '$idnew' ";
        $result = mysqli_query($conn, $query);
        header("Location: index.php?update_msg= ID $idnew is succesvol geüpdatet");
    } catch (Exception $e) {
        $error = $e->getMessage();
        echo "Query failed: " . $error;
        die();
    }
    
}
?>
<form action="update_page_1.php?id_new=<?php echo $id ?>" method="post">
    <div class="form-group">
        <label for="voornaam">Voornaam</label>
        <input type="text" name="voornaam" class="form-control" value="<?php echo $row['voornaam'] ?>">
    </div>
    <div class="form-group">
        <label for="voornaam">Achternaam</label>
        <input type="text" name="achternaam" class="form-control" value="<?php echo $row['achternaam'] ?>">
    </div>
    <div class=" form-group">
        <label for="voornaam">Leeftijd</label>
        <input type="text" name="leeftijd" class="form-control" value="<?php echo $row['leeftijd'] ?>">
    </div>
    <input type="submit" class="btn btn-success" name="update_student" value="Bewerken">
</form>

<?php include('footer.php'); ?>