<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $invoice = $_POST["Invoice"];
    $categories = isset($_POST["categories"]) ? implode(", ", $_POST["categories"]) : "";
    $information = $_POST["information"];

    $_SESSION["firstname"] = $firstname;
    $_SESSION["lastname"] = $lastname;
    $_SESSION["email"] = $email;
    $_SESSION["invoice"] = $invoice;
    $_SESSION["categories"] = $categories;
    $_SESSION["information"] = $information;

    if ($_FILES["file"]["error"] === 0) {
        $uploadDir = "uploads/";
        $uploadFile = $uploadDir . basename($_FILES["file"]["name"]);
        move_uploaded_file($_FILES["file"]["tmp_name"], $uploadFile);

        $_SESSION["uploaded_file"] = $uploadFile;
    }

    setcookie("firstname", $firstname, time() + 3600);
    setcookie("lastname", $lastname, time() + 3600);
    setcookie("email", $email, time() + 3600);
    setcookie("invoice", $invoice, time() + 3600);
    setcookie("categories", $categories, time() + 3600);
    setcookie("information", $information, time() + 3600);
    if (isset($_SESSION["uploaded_file"])) {
        setcookie("uploaded_file", $_SESSION["uploaded_file"], time() + 3600);
    }
}
?>

<?php
if (isset($_SESSION["firstname"])) {
    echo '<div id="displayInfo">';
    echo '<h2>Thông tin đã nhập:</h2>';
    echo '<p><strong>Name:</strong> ' . $_SESSION["firstname"] . " " . $_SESSION["lastname"] . '</p>';
    echo '<p><strong>Email:</strong> ' . $_SESSION["email"] . '</p>';
    echo '<p><strong>Invoice ID:</strong> ' . $_SESSION["invoice"] . '</p>';
    echo '<p><strong>Pay for:</strong> ' . $_SESSION["categories"] . '</p>';
    if (isset($_SESSION["uploaded_file"])) {
        echo '<div id="displayImage">';
        echo '<p><strong>Your payment receipt:</strong></p>';
        echo '<img src="' . $_SESSION["uploaded_file"] . '" alt="Uploaded Receipt" style="max-width: 100px;">';
        echo '</div>';
    }
    echo '<p><strong>Additional Information:</strong> ' . $_SESSION["information"] . '</p>';
    echo '</div>';
}
?>