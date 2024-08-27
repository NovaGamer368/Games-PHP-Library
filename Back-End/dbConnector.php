<?php
//include_once './Back-End/apiSqlQuery.php';

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

function MyLogin($dbConn, $username, $password)
{
    $stmt = $dbConn->prepare("SELECT Username, isAdmin FROM UsersTable WHERE Username = ? AND Password = ?");
    // Bind the parameters
    $stmt->bind_param("ss", $username, $password);
    // Execute the query
    $stmt->execute();
    // Get the result
    $result = $stmt->get_result();
    return $result;
}

function updateGame($dbConn, $id, $name, $creator, $genre, $description)
{
    $stmt = $dbConn->prepare("UPDATE GamesTable SET name=?, creator=?, genre=?, description=? WHERE gameId=?");
    $stmt->bind_param("ssssi", $name, $creator, $genre, $description, $id);

    // Execute the query
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Record updated successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error updating record: ' . $stmt->error]);
    }
}
function deleteGame($dbConn, $id)
{
    $stmt = $dbConn->prepare("DELETE FROM GamesTable WHERE Name = ?");
    $stmt->bind_param("s", $id);

    // Execute the query
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Record deleted successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error deleting record: ' . $stmt->error]);
    }
}

function createGame ($dbConn, $name, $creator, $genre, $description)
{

    $stmt = $dbConn->prepare("INSERT INTO GamesTable (name, creator, genre, description) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $creator, $genre, $description);

    // Execute the query
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Record inserted successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error inserting record: ' . $stmt->error]);
    }
}


// Get all records
function GamesGet($dbConn) {
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

function GameSearch($dbConn, $name)
{
    $stmt = $dbConn->prepare("SELECT JSON_OBJECT('Name', g.Name, 'Creator', g.Creator, 'Genre', g.Genre, 'Description', g.Description) FROM GamesTable AS g WHERE Name = ?");
    $stmt->bind_param("s", $name);
    $stmt->execute();
    // Get the result
    $result = $stmt->get_result();
    return $result;
}

function GameGenresGet($dbConn)
{
    $stmt = $dbConn->prepare("SELECT JSON_OBJECT('Genre', g.Genre) FROM GamesTable AS g GROUP BY Genre ORDER BY Genre ASC");
    $stmt->execute();
    // Get the result
    $result = $stmt->get_result();
    return $result;
}

function GameFilterGenre($dbConn, $genre)
{
    $stmt = $dbConn->prepare("SELECT JSON_OBJECT('Name', g.Name, 'Creator', g.Creator, 'Genre', g.Genre, 'Description', g.Description) FROM GamesTable AS g WHERE Genre = ?");
    $stmt->bind_param("s", $genre);
    $stmt->execute();
    // Get the result
    $result = $stmt->get_result();
    return $result;
}

function GetGameById($dbConn, $id) {
    $stmt = $dbConn->prepare("SELECT JSON_OBJECT('Name', g.Name, 'Creator', g.Creator, 'Genre', g.Genre, 'Description', g.Description) FROM GamesTable AS g WHERE gameId = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    // Get the result
    $result = $stmt->get_result();
    return $result;
}

?>