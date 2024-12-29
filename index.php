<?php
include 'db.php';

$result = $conn->query("SELECT * FROM students");

if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Attendance</title>
    <style>
        /* Body Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
        }

        /* Heading Styles */
        h1 {
            color: #2c3e50;
            text-align: center;
            padding-bottom: 20px;
        }

        /* Add Student Link */
        a {
            text-decoration: none;
            color: #3498db;
            font-size: 18px;
            display: inline-block;
            margin-bottom: 20px;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        /* Table Header Styles */
        th {
            background-color: #2c3e50;
            color: white;
            padding: 12px;
            text-align: left;
        }

        /* Table Row Styles */
        tr:nth-child(even) {
            background-color: #ecf0f1;
        }

        tr:hover {
            background-color: #d5d8dc; /* Light gray on hover */
        }

        td {
            padding: 10px;
        }

        /* Action Links in Table */
        td a {
            color: #f39c12;
            margin-right: 10px;
        }

        td a:hover {
            color: #e67e22;
        }

        /* Padding for cells */
        th, td {
            padding: 10px 15px;
        }
    </style>
</head>
<body>
    <h1>Student Attendance System</h1>
    <a href="add.php">Add Student</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Attendance Status</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['attendance_status']) ?></td>
                <td>
                    <a href="edit.php?id=<?= htmlspecialchars($row['id']) ?>">Edit</a>
                    <a href="delete.php?id=<?= htmlspecialchars($row['id']) ?>">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
