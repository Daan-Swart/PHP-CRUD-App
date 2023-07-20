<?php
include('header.php');
include('dbcon.php');
?>
<?php
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
            <th>Update</th>
            <th>Delete</th>

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
                    <td><a href="update_page_1.php?id=<?php echo $row['id'] ?>" class="btn btn-success">Update</a></td>
                    <td><a href="delete_page.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a></td>

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