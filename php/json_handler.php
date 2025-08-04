
<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT');
header('Access-Control-Allow-Headers: Content-Type');

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

// Base path to your JSON files
$basePath = '/nwcc/districts/COIDC/Testing_Site/';

switch($method) {
    case 'GET':
        $file = $_GET['file'] ?? '';
        $filePath = $basePath . $file . '.json';
        
        if (file_exists($filePath)) {
            $data = file_get_contents($filePath);
            echo $data;
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'File not found']);
        }
        break;
        
    case 'POST':
    case 'PUT':
        $file = $input['file'] ?? '';
        $data = $input['data'] ?? '';
        $filePath = $basePath . $file . '.json';
        
        if ($data) {
            // Create backup before writing
            if (file_exists($filePath)) {
                copy($filePath, $filePath . '.backup.' . date('Y-m-d_H-i-s'));
            }
            
            // Write new data
            $result = file_put_contents($filePath, json_encode($data, JSON_PRETTY_PRINT));
            
            if ($result !== false) {
                echo json_encode(['success' => true, 'message' => 'File saved successfully']);
            } else {
                http_response_code(500);
                echo json_encode(['error' => 'Failed to save file']);
            }
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'No data provided']);
        }
        break;
        
    default:
        http_response_code(405);
        echo json_encode(['error' => 'Method not allowed']);
}
?>