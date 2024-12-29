<?php
include 'db.php';

$id = $_GET['id'];
$student = $conn->query("SELECT * FROM students WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $attendance = $_POST['attendance'];

    $conn->query("UPDATE students SET name='$name', email='$email', attendance_status='$attendance' WHERE id=$id");
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <style>
        /* Body Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
        }

        /* Heading Styling */
        h1 {
            color: #2c3e50;
            text-align: center;
            padding-bottom: 20px;
        }

        /* Form Container */
        .form-container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        /* Label and Input Styles */
        label {
            font-size: 16px;
            color: #555;
            margin-bottom: 8px;
            display: block;
        }

        input[type="text"], input[type="email"], select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        /* Button Styles */
        button {
            background-color: #3498db;
            color: white;
            font-size: 16px;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #2980b9;
        }

        /* Form Submit Button */
        button:active {
            background-color: #1c5983;
        }

        /* Padding and Margin Adjustments */
        .form-container input, .form-container select {
            margin-bottom: 15px;
        }

    </style>
</head>
<body>
    <h1>Edit Student</h1>
    <div class="form-container">
        <form method="POST">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?= htmlspecialchars($student['name']) ?>" required><br>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?= htmlspecialchars($student['email']) ?>" required><br>

            <label for="attendance">Attendance:</label>
            <select name="attendance" id="attendance">
                <option value="Present" <?= $student['attendance_status'] == 'Present' ? 'selected' : '' ?>>Present</option>
                <option value="Absent" <?= $student['attendance_status'] == 'Absent' ? 'selected' : '' ?>>Absent</option>
            </select><br>

            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
