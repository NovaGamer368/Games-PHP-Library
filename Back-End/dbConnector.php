<?php
include_once ('./Back-End/apiSqlQuery.php');

loadEnv(__DIR__ . '/../.env');
define('DB_USER', getenv('DB_USER'));
define('DB_PSWD', getenv('DB_PSWD')); 
define('DB_SERVER', getenv('DB_SERVER'));
define('DB_NAME', getenv('DB_NAME'));

//Get the .env file
function loadEnv($path)
{
    if (!file_exists($path)) {
        throw new Exception('.env file not found');
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) {
            continue; // Skip comments
        }

        list($name, $value) = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value);

        if (!array_key_exists($name, $_SERVER) && !array_key_exists($name, $_ENV)) {
            putenv("$name=$value");
            $_ENV[$name] = $value;
            $_SERVER[$name] = $value;
        }
    }
}

//Getting the databases connection
function ConnGet()
{
    $dbConn = @mysqli_connect(DB_SERVER, DB_USER, DB_PSWD, DB_NAME)
        or die('Failed to connect to MySQL ' . DB_SERVER . '::' . DB_NAME . ' : ' . mysqli_connect_error()); 

    return $dbConn;
}
function MyJoinWhereGet($dbConn, $id)
{
    $stmt = $dbConn->prepare("SELECT Name, Class, STR, DEX, `INT` FROM CharacterTable WHERE charId = ?");
    // Bind the parameter
    $stmt->bind_param("i", $id);
    // Execute the query
    $stmt->execute();
    // Get the result
    $result = $stmt->get_result();
    return $result;
}

function MyGetName($dbConn, $name)
{
    $stmt = $dbConn->prepare("SELECT Name, Class, STR, DEX, `INT` FROM CharacterTable WHERE Name = ?");
    // Bind the parameter
    $stmt->bind_param("s", $name);
    // Execute the query
    $stmt->execute();
    // Get the result
    $result = $stmt->get_result();
    return $result;
}


// Get all records
function MyJsonGet($dbConn) {
    $query = "SELECT JSON_OBJECT(
	'gameId', g.gameId,
    'Name', g.Name,
    'Creator', g.Creator,
    'Genre', g.Genre,
    'Description', g.Description
    ) 
    FROM GamesTable AS g;";
    return @mysqli_query($dbConn, $query);
}