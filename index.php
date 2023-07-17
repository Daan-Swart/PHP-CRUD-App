<?php
include('header.php');
include('dbcon.php');
?>

<div class="box1">
    <h2>STUDENTEN</h2>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Student toevoegen</button>
</div>
<table class="table table-hover table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Voornaam</th>
            <th>Achternaam</th>
            <th>Leeftijd</th>
        </tr>
    </thead>
    <tbody>
        <?php
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

<!-- Modal -->
<form>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Student toevoegen</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="voornaam">Voornaam</label>
                    <input type="text" name="voornaam" class="form-control">
                </div>
                <div class="form-group">
                    <label for="voornaam">Achternaam</label>
                    <input type="text" name="voornaam" class="form-control">
                </div>
                <div class="form-group">
                    <label for="voornaam">Leeftijd</label>
                    <input type="text" name="voornaam" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sluiten</button>
                <button type="button" class="btn btn-success">Toevoegen</button>
            </div>
        </div>
    </div>
</div>
</form>
<?php
include('footer.php');
?>