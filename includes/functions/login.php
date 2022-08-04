<?php
require_once "../config.php";

if (isset($_SESSION["logged"]))
    header("Location: " . SITE_URL);

$hash = "";
$jsonFile = $_SERVER["DOCUMENT_ROOT"] . "/php-learning/advanced/online-student-grade-system/data/accounts.json";

function checkUserData(
    string $username,
    string $password
) {
    global $jsonFile;

    try {
        // Check if user exists
        $currentJsonData = file_get_contents($jsonFile);
        $currentJsonDataArray = json_decode($currentJsonData);

        // Populating $userArray with correct user
        foreach ($currentJsonDataArray as $user) {
            if ($user->username == $username){
                $userArray = $user;
                $loggedUserArray = $userArray;
            }
        }

        // Checking username and password to match
        if ($userArray->username == $username) {
            if (password_verify($password, $userArray->password)) {
                $_SESSION["logged"] = $loggedUserArray;
                header ("Location: " . SITE_URL);
            }
        }
    } catch (Exception $excepiton) {
        echo "Unable to check account " . $excepiton;
    }
}

if (!isset($_POST["submit"])) {
    return;
} else {
    $username = htmlspecialchars($_POST["uname"]);
    $password = htmlspecialchars($_POST["passwd"]);

    // Hashing the password
    global $hash;
    $hash = password_hash($password, PASSWORD_DEFAULT);

    checkUserData($username, $password);
}
