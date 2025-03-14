<?php
session_start(); 


if (!isset($_SESSION['formData'])) {
   
    header("Location: index.php");
    exit();
}


$formData = $_SESSION['formData'];


unset($_SESSION['formData']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submitted Information</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>

<div class="container">
    <h1>Submitted Information</h1>
    <p><strong>Name:</strong> <?php echo htmlspecialchars($formData['name']); ?></p>
    <p><strong>Age:</strong> <?php echo htmlspecialchars($formData['age']); ?></p>
    <p><strong>Gender:</strong> <?php echo htmlspecialchars($formData['gender']); ?></p>
    <p><strong>Hobbies:</strong> <?php echo isset($formData['hobby']) ? implode(", ", $formData['hobby']) : "None"; ?></p>
    <p><strong>Favorite Colors:</strong> <?php echo isset($formData['favorite_color']) ? implode(", ", $formData['favorite_color']) : "None"; ?></p>
    <p><strong>Favorite Food:</strong> <?php echo htmlspecialchars($formData['favorite_food']); ?></p>
    <p><strong>Do you have any pets?</strong> <?php echo htmlspecialchars($formData['pets']); ?></p>
    <p><strong>Occupation:</strong> <?php echo htmlspecialchars($formData['occupation']); ?></p>
    <p><strong>Favorite Movie:</strong> <?php echo htmlspecialchars($formData['favorite_movie']); ?></p>
    <p><strong>Favorite Book:</strong> <?php echo htmlspecialchars($formData['favorite_book']); ?></p>
    <p><strong>Dream Vacation Destination:</strong> <?php echo htmlspecialchars($formData['vacation_destination']); ?></p>
    <p><strong>Languages Spoken:</strong> <?php echo htmlspecialchars($formData['languages']); ?></p>
    <p><strong>Favorite Sport:</strong> <?php echo htmlspecialchars($formData['favorite_sport']); ?></p>
    <p><strong>Ideal Weekend:</strong> <?php echo htmlspecialchars($formData['ideal_weekend']); ?></p>
    <p><strong>Comments:</strong> <?php echo htmlspecialchars($formData['comments']); ?></p>

    <div class="button-container">
        <a href="index.php" class="button">Back</a>
    </div>
</div>

</body>
</html>