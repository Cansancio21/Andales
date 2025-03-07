<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submitted Data</title>
    <link rel="stylesheet" href="submit.css">
</head>
<body>
    <div class="container">
        <h2>Submitted Information</h2>
        <div class="form-group">
            <label>Full Name:</label>
            <input type="text" value="<?php echo htmlspecialchars($_POST['name']); ?>" readonly>
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input type="email" value="<?php echo htmlspecialchars($_POST['email']); ?>" readonly>
        </div>

        <div class="form-group">
            <label>Age:</label>
            <input type="number" value="<?php echo htmlspecialchars($_POST['age']); ?>" readonly>
        </div>

        <div class="form-group">
            <label>Gender:</label>
            <input type="text" value="<?php echo htmlspecialchars($_POST['gender']); ?>" readonly>
        </div>

        <div class="form-group">
            <label>Coding Skill Level:</label>
            <input type="text" value="<?php echo htmlspecialchars($_POST['coding_skill']); ?>" readonly>
        </div>

        <div class="form-group">
            <label>Favorite Programming Language:</label>
            <input type="text" value="<?php echo htmlspecialchars($_POST['fav_language']); ?>" readonly>
        </div>

        <div class="form-group">
            <label>Development Fields:</label>
            <textarea readonly><?php echo !empty($_POST['dev_field']) ? htmlspecialchars(implode(", ", $_POST['dev_field'])) : "None selected"; ?></textarea>
        </div>

        <div class="form-group">
            <label>Coding Frequency:</label>
            <input type="text" value="<?php echo htmlspecialchars($_POST['coding_frequency']); ?>" readonly>
        </div>

        <button class="submit-btn" onclick="window.history.back()">Go Back</button>
    </div>
</body>
</html>
