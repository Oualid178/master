<?php
// Path to the uploads folder
$directory = 'uploads/';

// Check if the directory exists
if (is_dir($directory)) {
    // Scan the directory for files
    $files = scandir($directory);

    // Filter out unwanted entries (like . and ..)
    $files = array_diff($files, array('.', '..'));

    // Display each file
    foreach ($files as $file) {
        echo "<div class='project-card'>";
        echo "<h3>عرض: " . basename($file, '.pdf') . "</h3>";
        echo "<a href='$directory$file' class='btn' download>تحميل العرض</a>";
        echo "</div>";
    }
} else {
    echo "<p>لا توجد عروض متاحة حاليًا.</p>";
}
?>