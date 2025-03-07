<?php
session_start();
$form_data = isset($_SESSION['form_data']) ? $_SESSION['form_data'] : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questionnaire Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Questionnaire Form</h2>
        <form action="submit.php" method="POST">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" value="<?php echo isset($form_data['name']) ? htmlspecialchars($form_data['name']) : ''; ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo isset($form_data['email']) ? htmlspecialchars($form_data['email']) : ''; ?>" required>

            <label for="age">Age:</label>
            <input type="number" id="age" name="age" value="<?php echo isset($form_data['age']) ? htmlspecialchars($form_data['age']) : ''; ?>" required>

            <label>Gender:</label>
            <select name="gender" id="gender">
                <option value="male" <?php echo (isset($form_data['gender']) && $form_data['gender'] == 'male') ? 'selected' : ''; ?>>Male</option>
                <option value="female" <?php echo (isset($form_data['gender']) && $form_data['gender'] == 'female') ? 'selected' : ''; ?>>Female</option>
                <option value="other" <?php echo (isset($form_data['gender']) && $form_data['gender'] == 'other') ? 'selected' : ''; ?>>Other</option>
            </select>

            <label>How comfortable are you with coding in JavaScript?</label>
            <div class="radio-group">
                <input type="radio" id="expert" name="coding_skill" value="Expert" <?php echo (isset($form_data['coding_skill']) && $form_data['coding_skill'] == 'Expert') ? 'checked' : ''; ?>>
                <label for="expert">Expert</label>

                <input type="radio" id="advanced" name="coding_skill" value="Advanced" <?php echo (isset($form_data['coding_skill']) && $form_data['coding_skill'] == 'Advanced') ? 'checked' : ''; ?>>
                <label for="advanced">Advanced</label>

                <input type="radio" id="beginner" name="coding_skill" value="Beginner" <?php echo (isset($form_data['coding_skill']) && $form_data['coding_skill'] == 'Beginner') ? 'checked' : ''; ?>>
                <label for="beginner">Beginner</label>
            </div>

            <label for="fav_language">What is your favorite programming language?</label>
            <select name="fav_language" id="fav_language">
                <option value="javascript" <?php echo (isset($form_data['fav_language']) && $form_data['fav_language'] == 'javascript') ? 'selected' : ''; ?>>JavaScript</option>
                <option value="python" <?php echo (isset($form_data['fav_language']) && $form_data['fav_language'] == 'python') ? 'selected' : ''; ?>>Python</option>
                <option value="java" <?php echo (isset($form_data['fav_language']) && $form_data['fav_language'] == 'java') ? 'selected' : ''; ?>>Java</option>
            </select>

            <label>Which development field interests you the most?</label>
            <div class="checkbox-group">
                <input type="checkbox" id="web_dev" name="dev_field[]" value="Web Development" <?php echo (isset($form_data['dev_field']) && in_array('Web Development', $form_data['dev_field'])) ? 'checked' : ''; ?>>
                <label for="web_dev">Web Development</label>

                <input type="checkbox" id="mobile_dev" name="dev_field[]" value="Mobile App Development" <?php echo (isset($form_data['dev_field']) && in_array('Mobile App Development', $form_data['dev_field'])) ? 'checked' : ''; ?>>
                <label for="mobile_dev">Mobile App Development</label>

                <input type="checkbox" id="game_dev" name="dev_field[]" value="Game Development" <?php echo (isset($form_data['dev_field']) && in_array('Game Development', $form_data['dev_field'])) ? 'checked' : ''; ?>>
                <label for="game_dev">Game Development</label>
            </div>

            <label>How often do you code?</label>
            <div class="radio-group">
                <input type="radio" id="daily" name="coding_frequency" value="Daily" <?php echo (isset($form_data['coding_frequency']) && $form_data['coding_frequency'] == 'Daily') ? 'checked' : ''; ?>>
                <label for="daily">Daily</label>

                <input type="radio" id="weekly" name="coding_frequency" value="Weekly" <?php echo (isset($form_data['coding_frequency']) && $form_data['coding_frequency'] == 'Weekly') ? 'checked' : ''; ?>>
                <label for="weekly">Weekly</label>

                <input type="radio" id="monthly" name="coding_frequency" value="Monthly" <?php echo (isset($form_data['coding_frequency']) && $form_data['coding_frequency'] == 'Monthly') ? 'checked' : ''; ?>>
                <label for="monthly">Monthly</label>
            </div>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
