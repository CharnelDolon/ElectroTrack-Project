<?php
echo "<h2>PHP Extensions Test</h2>";
echo "<p><strong>PHP Version:</strong> " . phpversion() . "</p>";

echo "<p><strong>MySQLi Extension Loaded:</strong> ";
if (extension_loaded('mysqli')) {
    echo "YES ✓";
} else {
    echo "NO ✗";
}
echo "</p>";

echo "<p><strong>Loaded Extensions:</strong></p>";
echo "<ul>";
$extensions = get_loaded_extensions();
sort($extensions);
foreach ($extensions as $ext) {
    echo "<li>$ext</li>";
}
echo "</ul>";

echo "<p><strong>PHP INI Location:</strong> " . php_ini_loaded_file() . "</p>";
?> 