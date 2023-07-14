<?php
try {
    $conn = new mysqli("localhost", "root", "", "crud_operations");
} catch (Exception $e) {
    $error = $e->getMessage();
    echo "Connection failed: " . $error;
}
