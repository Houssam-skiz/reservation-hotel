<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>Reservation</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #1a1a1a;
            color: #ffffff;
            min-height: 100vh;
            padding: 20px;
        }

        .rev {
            display: flex;
            gap: 20px;
            max-width: 1400px;
            margin: 0 auto;
        }

        nav {
            flex: 0 0 350px;
            background-color: #2d2d2d;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            height: fit-content;
        }

        nav img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid #4a4a4a;
            margin: 0 auto 20px;
            display: block;
            object-fit: cover;
        }

        h4 {
            font-size: 28px;
            margin-bottom: 25px;
            color: #ffffff;
            text-transform: capitalize;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #cccccc;
            font-size: 16px;
            text-align: left;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 16px;
            background-color: #3d3d3d;
            border: 1px solid #4a4a4a;
            border-radius: 6px;
            color: #ffffff;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        input:focus {
            outline: none;
            border-color: #666666;
            background-color: #454545;
            box-shadow: 0 0 0 2px rgba(76, 175, 80, 0.2);
        }

        .buttons {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-top: 20px;
        }

        button {
            padding: 12px 24px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        button[type="reset"] {
            background-color: #4a4a4a;
            color: #ffffff;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: #ffffff;
        }

        button:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }

        .social-icons {
            margin-top: 30px;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .social-icons i {
            font-size: 24px;
            color: #cccccc;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .social-icons i:hover {
            color: #4CAF50;
            transform: translateY(-2px);
        }

        .info {
            flex: 1;
            background-color: #2d2d2d;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .table-container {
            overflow-x: auto;
            margin-top: 10px;
            border-radius: 6px;
            background-color: #3d3d3d;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 10px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #4a4a4a;
        }

        th {
            background-color: #3d3d3d;
            color: #ffffff;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 14px;
            letter-spacing: 0.5px;
        }

        td {
            background-color: #2d2d2d;
            font-size: 15px;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover td {
            background-color: #363636;
        }

        .status {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
            display: inline-block;
        }

        .status.confirmed {
            background-color: rgba(76, 175, 80, 0.2);
            color: #4CAF50;
        }

        .status.pending {
            background-color: rgba(255, 152, 0, 0.2);
            color: #FF9800;
        }

        @media (max-width: 768px) {
            .rev {
                flex-direction: column;
            }
            
            nav {
                flex: none;
                width: 100%;
            }

            .table-container {
                margin-top: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="rev">
        <nav>
            <img src="image1.jpg" alt="logo">
            <h4>Reservation</h4>
            <form action="" method="post"> <!-- Form action should point to the same file -->
                <label>Name Customer</label>
                <input type="text" name="name" required>
                
                <label>Email</label>
                <input type="email" name="email" required>
                
                <label>Address</label>
                <input type="text" name="address">
                
                <label>Phone</label>
                <input type="tel" name="phone" required>
                
                <label>Date</label>
                <input type="date" name="date" required>
                
                <div class="buttons">
                    <button type="reset">Reset</button>
                    <button type="submit" name="add">Add</button>
                </div>
            </form> <!-- Move closing form tag here -->
            <div class="social-icons">
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-whatsapp"></i>
            </div>
        </nav>
        
        <div class="info">
            <div class="table-container">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                    <?php
                    // Database connection
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
                </table>
            </div>
        </div>
    </div>
</body>
</html>
