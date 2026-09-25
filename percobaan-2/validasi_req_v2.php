<?php // Script Validasi ?>
<style>
    .error {color: navy;}
</style>

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $webErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z]*$/", $name)) {
            $nameErr = "Only letters and space are allowed";
        }
    }
    if (empty($_POST["email"])) {
        $emailErr = "Email is reuired";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }
    if (empty($_POST["website"])) {
        $webErr = "Website is required";
    } else {
        $website = test_input($_POST["website"]);
        if (!filter_var($website, FILTER_VALIDATE_URL)) {
            $emailErr = "Invalid URL";
        }
    }
    $comment = test_input($_POST["comment"]);
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
    $gender = test_input($_POST["gender"]);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<?php // Pembuatan form ?>
<h2>PHP Validation Example</h2>
<p><span class="error">* Required field.</span></p>
<form method="post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Name: <input type="text" name="name">
    <span class="error">* <?php echo $nameErr; ?></span>
    <br><br>
    E-Mail: <input type="text" name="email">
    <span class="error">* <?php echo $emailErr; ?></span>
    <br><br>
    Website: <input type="text" name="website">
    <span class="error">* <?php echo $webErr?></span>
    <br><br>
    Comment: <textarea name="comment" rows="5" cols="40"></textarea>
    <br><br>
    Gender:
    <input type="radio" name="gender" value="famale">Female
    <input type="radio" name="gender" value="male">Male
    <span class="error">* <?php echo $genderErr; ?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php //Menampilkan data masukkan ?>
<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>
