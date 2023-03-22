<?php
if (
    isset($_SERVER['HTTPS']) &&
    ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
    isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
    $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https'
) {
    $protocol = 'https';
} else {
    $protocol = 'http';
}
/* Database credentials. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'spanel');
define('CHARSET', 'utf8mb4');
define('DOMAIN_APP', 'http://localhost/sepanel/');
define('API_SERVER', 'https://server.sentrawidyatama.my.id:3000'); // Api Server NODEJS
define('API_KEY_SERVER', 'APICLIENTID'); // Api key Server NODEJS
define('WEBSITE_MAINTENANCE', 'off'); //on or off
define('PRICE_KAS', '5000');
/* Attempt to connect to MySQL database */
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $GLOBALS['conn'] = $pdo;
    $db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($db, "utf8mb4");
} catch (PDOException $e) {
    $GLOBALS['e'] = $e;
    die("ERROR: Could not connect. " . $e->getMessage());
}
// OOP
class DB
{
    private $host = DB_SERVER;
    private $user = DB_USERNAME;
    private $pass = DB_PASSWORD;
    private $dbname = DB_NAME;

    protected function db()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $pdo = new PDO($dsn, $this->user, $this->pass);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}

$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// $dbsql = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, 'sentrawi_marketing');
$str = strpos(DOMAIN_APP, "://");
$domain = $protocol . substr(DOMAIN_APP, $str);

date_default_timezone_set("Asia/Jakarta");
