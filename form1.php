<?php
$host = "localhost";
$users = "root";
$pass = "";
$db = "hotel1";
$conn = mysqli_connect($host, $users, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Form submission handling
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];

    // Prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO rese (name, email, address, phone, date) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $address, $phone, $date);

    if ($stmt->execute()) {
        echo "<tr><td colspan='7'>Record added successfully.</td></tr>";
    } else {
        echo "<tr><td colspan='7'>Error: " . $stmt->error . "</td></tr>";
    }

    $stmt->close();
}

// Fetching and displaying records
$query = "SELECT * FROM rese";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    // الحصول على التاريخ الحالي
    $currentDate = date('Y-m-d');
    
    // التحقق مما إذا كان التاريخ المدخل قد انتهى
    if ($row['date'] < $currentDate) {
        $status = "Expired";
    } else {
        $status = "Valid";
    }

    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['email']}</td>
            <td>{$row['address']}</td>
            <td>{$row['phone']}</td>
            <td>{$row['date']}</td>
            <td class='status " . strtolower($status) . "'>{$status}</td>
        </tr>";
}


mysqli_close($conn);
?>