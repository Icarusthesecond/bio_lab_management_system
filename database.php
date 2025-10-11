<?php
// Get the single connection string from the environment variable
$db_url = getenv('DATABASE_URL');

if (!$db_url) {
    die("Database connection URL not found.");
}

// Parse the URL into its components
$db_parts = parse_url($db_url);

$host = $db_parts['host'];
$user = $db_parts['user'];
$password = $db_parts['pass'];
$dbname = ltrim($db_parts['path'], '/'); // Remove the leading slash
$port = $db_parts['port'];

// Create the DSN for PostgreSQL
$dsn = "pgsql:host={$host};port={$port};dbname={$dbname};user={$user};password={$password}";

try {
    // Create a PDO instance
    $pdo = new PDO($dsn);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
