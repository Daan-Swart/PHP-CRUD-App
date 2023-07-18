<?php
include('header.php');
include('dbcon.php');
?>
<?php
if (isset($_GET['message'])) {
    echo "<h6>" . $_GET['message'] . "</h6>";
}
?>
<div class="box1">
    <h2>STUDENTEN</h2>

    <a href="data_toevoegen.php"><button class="btn btn-primary">Student toevoegen</button></a>
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
<?php
include('footer.php');
?>