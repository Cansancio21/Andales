<?php
session_start(); // Start the session
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate Name
    if (empty($_POST['name']) || preg_match('/[0-9]/', $_POST['name'])) {
        $errors['name'] = "Name must not contain numbers and is required.";
    }

    // Validate Age
    if (empty($_POST['age']) || !is_numeric($_POST['age'])) {
        $errors['age'] = "Age must be a number and is required.";
    }

    // Validate Gender
    if (empty($_POST['gender'])) {
        $errors['gender'] = "Please select at least one gender.";
    }

    // Validate Hobbies
    if (empty($_POST['hobby'])) {
        $errors['hobby'] = "Please select at least one hobby.";
    }

    // Validate Favorite Colors
    if (empty($_POST['favorite_color'])) {
        $errors['favorite_color'] = "Please select at least one color.";
    }

    // Validate Text Inputs for Numbers
    $textFields = ['favorite_food', 'occupation', 'favorite_movie', 'favorite_book', 'vacation_destination', 'languages', 'favorite_sport', 'ideal_weekend', 'comments'];
    foreach ($textFields as $field) {
        if (!empty($_POST[$field]) && preg_match('/[0-9]/', $_POST[$field])) {
            $errors[$field] = ucfirst(str_replace('_', ' ', $field)) . " must not contain numbers.";
        }
    }

    // Check for errors
    if (empty($errors)) {
        // No errors, store data in session
        $_SESSION['formData'] = $_POST; // Store all form data in session
        header("Location: submit.php"); // Redirect to submit.php
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Form</title>
    <link rel="stylesheet" href="index.css"> 
    <style>
        .error {
            color: red; 
            font-size: 0.9em; 
            margin-top: -5px; 
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <form method="post"> <!-- No action specified, submits to itself -->
    <h1>Test Form</h1>
        <ol>
            <li>
                <label for="question1">What is your name?</label>
                <input type="text" id="question1" name="name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>" required>
                <div class="error"><?php echo isset($errors['name']) ? $errors['name'] : ''; ?></div>
            </li>
            <li>
                <label for="question2">What is your age?</label>
                <input type="text" id="question2" name="age" value="<?php echo isset($_POST['age']) ? htmlspecialchars($_POST['age']) : ''; ?>" required>
                <div class="error"><?php echo isset($errors['age']) ? $errors['age'] : ''; ?></div>
            </li>
            <li>
             <label>What is your gender?</label>
             <div class="radio-group">
             <input type="radio" id="male" name="gender" value="male" <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'male') ? 'checked' : ''; ?>>
             <label for="male">Male</label>
             <input type="radio" id="female" name="gender" value="female" <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'female') ? 'checked' : ''; ?>>
             <label for="female">Female</label>
            </div>
            <div class="error"><?php echo isset($errors['gender']) ? $errors['gender'] : ''; ?></div>
            </li>
            <li>
            <label>What are your hobbies? (Select all that apply)</label>
            <div class="checkbox-group">
            <input type="checkbox" id="hobby1" name="hobby[]" value="reading" <?php echo (isset($_POST['hobby']) && in_array('reading', $_POST['hobby'])) ? 'checked' : ''; ?>>
            <label for="hobby1">Reading</label>
            <input type="checkbox" id="hobby2" name="hobby[]" value="traveling" <?php echo (isset($_POST['hobby']) && in_array('traveling', $_POST['hobby'])) ? 'checked' : ''; ?>>
            <label for="hobby2">Traveling</label>
            <input type="checkbox" id="hobby3" name="hobby[]" value="sports" <?php echo (isset($_POST['hobby']) && in_array('sports', $_POST['hobby'])) ? 'checked' : ''; ?>>
            <label for="hobby3">Sports</label>
            <input type="checkbox" id="hobby4" name="hobby[]" value="music" <?php echo (isset($_POST['hobby']) && in_array('music', $_POST['hobby'])) ? 'checked' : ''; ?>>
            <label for="hobby4">Music</label>
            <input type="checkbox" id="hobby5" name="hobby[]" value="art" <?php echo (isset($_POST['hobby']) && in_array('art', $_POST['hobby'])) ? 'checked' : ''; ?>>
            <label for="hobby5">Art</label>
            </div>
           <div class="error"><?php echo isset($errors['hobby']) ? $errors['hobby'] : ''; ?></div>
           </li>
           <li>
            <label>What are your favorite colors? (Select all that apply)</label>
            <div class="checkbox-group">
            <input type="checkbox" id="color_red" name="favorite_color[]" value="red" <?php echo (isset($_POST['favorite_color']) && in_array('red', $_POST['favorite_color'])) ? 'checked' : ''; ?>>
            <label for="color_red">Red</label>
            <input type="checkbox" id="color_blue" name="favorite_color[]" value="blue" <?php echo (isset($_POST['favorite_color']) && in_array('blue', $_POST['favorite_color'])) ? 'checked' : ''; ?>>
            <label for="color_blue">Blue</label>
            <input type="checkbox" id="color_yellow" name="favorite_color[]" value="yellow" <?php echo (isset($_POST['favorite_color']) && in_array('yellow', $_POST['favorite_color'])) ? 'checked' : ''; ?>>
            <label for="color_yellow">Yellow</label>
            <input type="checkbox" id="color_violet" name="favorite_color[]" value="violet" <?php echo (isset($_POST['favorite_color']) && in_array('violet', $_POST['favorite_color'])) ? 'checked' : ''; ?>>
            <label for="color_violet">Violet</label>
            <input type="checkbox" id="color_pink" name="favorite_color[]" value="pink" <?php echo (isset($_POST['favorite_color']) && in_array('pink', $_POST['favorite_color'])) ? 'checked' : ''; ?>>
            <label for="color_pink">Pink</label>
            <input type="checkbox" id="color_black" name="favorite_color[]" value="black" <?php echo (isset($_POST['favorite_color']) && in_array('black', $_POST['favorite_color'])) ? 'checked' : ''; ?>>
            <label for="color_black">Black</label>
            </div>
            <div class="error"><?php echo isset($errors['favorite_color']) ? $errors['favorite_color'] : ''; ?></div>
          </li>
            <li>
                <label for="question6">What is your favorite food?</label>
                <input type="text" id="question6" name="favorite_food" value="<?php echo isset($_POST['favorite_food']) ? htmlspecialchars($_POST['favorite_food']) : ''; ?>" required>
                <div class="error"><?php echo isset($errors['favorite_food']) ? $errors['favorite_food'] : ''; ?></div>
            </li>
            <li>
            <label>Do you have any pets?</label>
            <div class="radio-group">
            <input type="radio" id="pets_yes" name="pets" value="yes" <?php echo (isset($_POST['pets']) && $_POST['pets'] == 'yes') ? 'checked' : ''; ?>>
            <label for="pets_yes">Yes</label>
            <input type="radio" id="pets_no" name="pets" value="no" <?php echo (isset($_POST['pets']) && $_POST['pets'] == 'no') ? 'checked' : ''; ?>>
            <label for="pets_no">No</label>
            </div>
            <div class="error"><?php echo isset($errors['pets']) ? $errors['pets'] : ''; ?></div>
            </li>
            <li>
                <label for="question8">What is your occupation?</label>
                <input type="text" id="question8" name="occupation" value="<?php echo isset($_POST['occupation']) ? htmlspecialchars($_POST['occupation']) : ''; ?>" required>
                <div class="error"><?php echo isset($errors['occupation']) ? $errors['occupation'] : ''; ?></div>
            </li>
            <li>
                <label for="question9">What is your favorite movie?</label>
                <input type="text" id="question9" name="favorite_movie" value="<?php echo isset($_POST['favorite_movie']) ? htmlspecialchars($_POST['favorite_movie']) : ''; ?>" required>
                <div class="error"><?php echo isset($errors['favorite_movie']) ? $errors['favorite_movie'] : ''; ?></div>
            </li>
            <li>
                <label for="question10">What is your favorite book?</label>
                <input type="text" id="question10" name="favorite_book" value="<?php echo isset($_POST['favorite_book']) ? htmlspecialchars($_POST['favorite_book']) : ''; ?>" required>
                <div class="error"><?php echo isset($errors['favorite_book']) ? $errors['favorite_book'] : ''; ?></div>
            </li>
            <li>
                <label for="question11">What is your dream vacation destination?</label>
                <input type="text" id="question11" name="vacation_destination" value="<?php echo isset($_POST['vacation_destination']) ? htmlspecialchars($_POST['vacation_destination']) : ''; ?>" required>
                <div class="error"><?php echo isset($errors['vacation_destination']) ? $errors['vacation_destination'] : ''; ?></div>
            </li>
            <li>
                <label for="question12">What languages do you speak?</label>
                <input type="text" id="question12" name="languages" value="<?php echo isset($_POST['languages']) ? htmlspecialchars($_POST['languages']) : ''; ?>" required>
                <div class="error"><?php echo isset($errors['languages']) ? $errors['languages'] : ''; ?></div>
            </li>
            <li>
                <label for="question13">What is your favorite sport?</label>
                <input type="text" id="question13" name="favorite_sport" value="<?php echo isset($_POST['favorite_sport']) ? htmlspecialchars($_POST['favorite_sport']) : ''; ?>" required>
                <div class="error"><?php echo isset($errors['favorite_sport']) ? $errors['favorite_sport'] : ''; ?></div>
            </li>
            <li>
                <label for="question14">Please describe your ideal weekend:</label><br>
                <textarea id="question14" name="ideal_weekend" rows="4" cols="50"><?php echo isset($_POST['ideal_weekend']) ? htmlspecialchars($_POST['ideal_weekend']) : ''; ?></textarea>
                <div class="error"><?php echo isset($errors['ideal_weekend']) ? $errors['ideal_weekend'] : ''; ?></div>
            </li>
            <li>
                <label for="question15">Any additional comments or suggestions:</label><br>
                <textarea id="question15" name="comments" rows="4" cols="50"><?php echo isset($_POST['comments']) ? htmlspecialchars($_POST['comments']) : ''; ?></textarea>
                <div class="error"><?php echo isset($errors['comments']) ? $errors['comments'] : ''; ?></div>
            </li>
        </ol>
        <input type="submit" value="Submit">
    </form>
</body>
</html>