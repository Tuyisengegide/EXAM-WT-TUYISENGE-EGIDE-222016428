<html lang="en">
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>USER Page</title>
  <style>
    /* Normal link */
    a {
      padding: 10px;
      color: white;

      background: rgb(11, 77, 101);
      text-decoration: none;
      margin-right: 15px;
    }

    /* Visited link */
    a:visited {
      color: blue;
    }
    /* Unvisited link */
    a:link {
      color: brown; /* Changed to lowercase */
    }
    /* Hover effect */
    a:hover {
      background-color: white;
    }

    /* Active link */
    a:active {
      background-color: red;
    }

    /* Extend margin left for search button */
    button.btn {
      margin-left: 15px; /* Adjust this value as needed */
      margin-top: 4px;
    }
    /* Extend margin left for search button */
    input.form-control {
      margin-left: 1300px; /* Adjust this value as needed */

      padding: 8px;
     
    }
  </style>
   <!-- JavaScript validation and content load for insert data-->
        <script>
            function confirmInsert() {
                return confirm('Are you sure you want to insert this record?');
            }
        </script>
  
<header>
   

</head>

<body bgcolor="skyblue">
  <ul style="list-style-type: none; padding: 0;">
    <li style="display: inline; margin-right: 5px;">
  </li>
  <li style="display: inline; margin-right: 10px;"><a href="home.html">HOME</a>
    <li style="display: inline; margin-right: 10px;"><a href="Our programs.html">Our Programs</a>
      <li style="display: inline; margin-right: 10px;"><a href="Benefits.html">Benefits</a>
    <li style="display: inline; margin-right: 10px;"><a href="FAQ. html">FAQ</a>
    <li style="display: inline; margin-right: 10px;"><a href="Misunderstood disorders.html">Misunderstood Disorders</a>
    <li style="display: inline; margin-right: 10px;"><a href="about.html">About Us</a>
    <li style="display: inline; margin-right: 10px;"><a href="contact.html">Contact Us</a>
    <li class="dropdown" style="display: inline; margin-right: 5px;">
    <li  style="display: inline; margin-right: 10px;"><a href="logout.php">Logout</a>
      <div class="dropdown-contents">
      <!-- Links inside the dropdown menu -->
     
      </div>

  </li>
  </li>
    </li><br><br>
    
  </ul>

</header>
<section>
<h1>ACCOUNT'S  Form</h1>

    <form method="post" onsubmit="return confirmInsert();">
        <label for="id">Id:</label>
        <input type="number" id="id" name="id"><br><br>

        <label for="name">username:</label>
        <input type="text" id="name" name="username" required><br><br>

        <label for="address">password:</label>
        <input type="text" id="password" name="password" required><br><br>

    
        

        <input type="submit" name="add" value="Insert">

    </form>

    <?php
    // Connection details
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);
    // Attempt insert query execution
    $sql = "INSERT INTO form (username, password) VALUES ('$username', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
    ?>

<?php
// Connection details
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

// SQL query to fetch data from category table
$sql = "SELECT * FROM login";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ACCOUNT INFO TABLE</title>
    <style>
        table {
            width: 80%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <center><h2>Table account</h2></center>
    <table border="3">
        <tr>
          
            <th>Id</th>
            <th> USERNAME</th>
            <th>PASSWORD</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
        // Define connection parameters
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

        // Prepare SQL query to retrieve customer.
        $sql = "SELECT * FROM form";
        $result = $conn->query($sql);
        // Check if there are any product
        if ($result->num_rows > 0) {

        // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $cuid = $row['id']; // Fetch the Id
                echo "<tr>
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['username'] . "</td>
                    <td>" . $row['password'] . "</td>
                    <td><a style='padding:4px' href='delete_trainees.php?id=$cuid'>Delete</a></td> 
                    <td><a style='padding:4px' href='update_trainees.php?id=$cuid'>Update</a></td> 
                </tr>";
                
            }
        } else {
            echo "<tr><td colspan='7'>No data found</td></tr>";
        }
        // Close the database connection
        $conn->close();
        ?>
    </table>
  </body>
    </section>

  
<footer>
  <center> 
    <b><marquee><h2>UR CBE BIT grp 3 &copy, 2024 & reg</h2></marquee></b>
  </center>
</footer>
</body>
</html>