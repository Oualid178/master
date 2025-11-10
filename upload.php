<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $title = $_POST['title'];
    $description = $_POST['description'];
    $file = $_FILES['file'];

    // File details
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    // Get file extension
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    // Allowed file types
    $allowed = ['pdf'];

    // Validate file
    if (in_array($fileExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 10000000) { // Less than 10MB
                // Create a unique file name
                $fileNameNew = uniqid('', true) . "." . $fileExt;

                // Destination folder
                $fileDestination = 'uploads/' . $fileNameNew;

                // Move the file to the destination folder
                if (move_uploaded_file($fileTmpName, $fileDestination)) {
                    // Redirect with success message
                    header("Location: student-projects.html?upload=success");
                } else {
                    echo "حدث خطأ أثناء رفع الملف!";
                }
            } else {
                echo "حجم الملف كبير جدًا!";
            }
        } else {
            echo "حدث خطأ أثناء رفع الملف!";
        }
    } else {
        echo "نوع الملف غير مسموح به!";
    }
}
?>