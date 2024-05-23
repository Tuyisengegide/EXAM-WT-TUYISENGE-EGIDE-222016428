<?php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "login";
   
   // Create connection
   $conn = new mysqli($servername, $username, $password, $dbname);
   
   // Check connection
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
    
    // Prepare and execute the DELETE statement
    $stmt = $conn->prepare("DELETE FROM form WHERE id=?");
    ?>
     <!DOCTYPE html>
    <html>
    <head>
        <title>Delete Record</title>
        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete this record?");
            }
        </script>
    </head>
    <body>
        <form method="post" onsubmit="return confirmDelete();">
            <input type="hidden" name="pid" value="<?php echo $pid; ?>">
            <input type="submit" value="Delete">
        </form>

        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "Record deleted successfully.<br><br>echo 
             <a href='trainees.php'>OK</a>";
    } else {
        echo "Error deleting data: " . $stmt->error;
}
?>
</body>
</html>
<?php
$conn->close();
?>
}