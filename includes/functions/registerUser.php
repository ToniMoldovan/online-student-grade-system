<?php
require_once "../config.php";

if (isset($_SESSION["logged"]))
    header("Location: " . SITE_URL);

$hash = "";
$jsonFile = $_SERVER["DOCUMENT_ROOT"] . "/php-learning/advanced/online-student-grade-system/data/accounts.json";

function addUserToJSONFile(
    string $firstName,
    string $lastName,
    string $username,
    string $hashedPassword,
    string $email
) {

    // Creating an associative array as a structure for the new user
    $newUser = array(
        "firstName" =>  $firstName,
        "lastName"  =>  $lastName,
        "username"  =>  $username,
        "password"  =>  $hashedPassword,
        "email"     =>  $email
    );

    global $jsonFile;

    // Writing data to file
    try {

        // Check if user exists
        $currentJsonData = file_get_contents($jsonFile);
        $currentJsonDataArray = json_decode($currentJsonData, true);

        foreach ($currentJsonDataArray as $array){
            foreach ($array as $key => $value) {
                if ($key == "username") {
                    if ($value == $username) //Username exists already
                        return;
                }
            }
        }

        if (filesize($jsonFile) == 0) {
            $data = array($newUser);
            file_put_contents($jsonFile, json_encode($data, JSON_PRETTY_PRINT));
        }
        else {
            $oldJson = file_get_contents($jsonFile);
            $tempArray = json_decode($oldJson, true);
            array_push($tempArray, $newUser);
            $jsonData = json_encode($tempArray, JSON_PRETTY_PRINT);
            file_put_contents($jsonFile, $jsonData);
        }
        
        echo "user created successfully!";
        // TODO: make a registration-successfull thing
    } catch (Exception $excepiton) {
        echo "Unable to write to file. " . $excepiton;
    }
}

if (!isset($_POST["submit"])) {
    return;
} else {
    $firstName = htmlspecialchars($_POST["fname"]);
    $lastName = htmlspecialchars($_POST["lname"]);
    $username = htmlspecialchars($_POST["uname"]);
    $password = htmlspecialchars($_POST["passwd"]);
    $email = filter_var(htmlspecialchars($_POST["email"]), FILTER_SANITIZE_EMAIL);

    // Hashing the password
    global $hash;
    $hash = password_hash($password, PASSWORD_DEFAULT);

    addUserToJSONFile($firstName, $lastName, $username, $hash, $email);
}
