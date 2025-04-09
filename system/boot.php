<?php
/**
 * Created by Aman Chauhan
 * Date: 19/08/2023
 * Project: AdultWire
 * Description: This script initializes error reporting, requires necessary files and classes,
 * and defines custom error handling for the AdultWire project.
 */

// Require the necessary files and classes
require_once ROOT.'/system/routeHandler.php';
require_once ROOT.'/system/adultwire.php';
require_once ROOT."/system/database.php";

class Boot {
    public static function Intance() {
        // Return this class as an object
        return new Boot();
    }

    public function run() {
        // Register the custom error handler
        set_error_handler([$this, 'customErrorHandling']);

        // Include all route list
        include_once ROOT.'/public/route.php';

        // Create a new instance of the Route class
        if (!Route::match($_SERVER["REQUEST_URI"])) {
            include_once ROOT."/public/view/404.php";
        }
    }

    // Function to convert error type number to string
    function errorTypeToString($errorType) {
        $errorTypes = array(
            E_ERROR => 'Error',
            E_WARNING => 'Warning',
            E_PARSE => 'Parse Error',
            E_NOTICE => 'Notice',
            E_CORE_ERROR => 'Core Error',
            E_CORE_WARNING => 'Core Warning',
            E_COMPILE_ERROR => 'Compile Error',
            E_COMPILE_WARNING => 'Compile Warning',
            E_USER_ERROR => 'User Error',
            E_USER_WARNING => 'User Warning',
            E_USER_NOTICE => 'User Notice',
            E_STRICT => 'Strict Standards',
            E_RECOVERABLE_ERROR => 'Recoverable Error',
            E_DEPRECATED => 'Deprecated',
            E_USER_DEPRECATED => 'User Deprecated',
        );

        return isset($errorTypes[$errorType]) ? $errorTypes[$errorType] : 'Unknown';
    }

    // Custom error handling function
    function customErrorHandling($errorNo, $errorMsg, $errorFile, $errorLine) {
        $dateTime = date('Y-m-d H:i:s');
        $serverInfo = $_SERVER['SERVER_SOFTWARE'];
        $phpVersion = phpversion();
        $clientIP = $_SERVER['REMOTE_ADDR'];
        $requestURI = $_SERVER['REQUEST_URI'];

        echo "
        <style>
            .error-container {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background-color: #1e1e1e;
                color: #ffffff;
                margin: 20px auto;
                padding: 20px;
                border-radius: 10px;
                max-width: 800px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
                overflow: hidden;
            }
            .error-header {
                background-color: #e74c3c;
                padding: 15px;
                border-radius: 10px 10px 0 0;
                font-size: 1.5em;
            }
            .error-details {
                padding: 20px;
                background-color: #2c2c2c;
                border-radius: 0 0 10px 10px;
            }
            .error-section {
                margin: 10px 0;
                padding: 10px;
                background-color: #333;
                border-radius: 5px;
            }
            .error-section strong {
                color: #e74c3c;
            }
            .error-section pre {
                margin: 0;
                white-space: pre-wrap;
                word-break: break-all;
            }
            .error-section pre {
                max-height: 200px;
                overflow-y: auto;
            }
        </style>

        <div class='error-container'>
            <div class='error-header'>Error: $errorMsg</div>
            <div class='error-details'>
                <div class='error-section'>
                    <strong>Error Code:</strong> $errorNo
                </div>
                <div class='error-section'>
                    <strong>Error Type:</strong> " . $this->errorTypeToString($errorNo) . "
                </div>
                <div class='error-section'>
                    <strong>Error Message:</strong> $errorMsg
                </div>
                <div class='error-section'>
                    <strong>Error in File:</strong> $errorFile on line $errorLine
                    <pre>";
                    
                    if (file_exists($errorFile)) {
                        $fileLines = file($errorFile);
                        $errorLine = $errorLine - 1;
                        $startLine = max(0, $errorLine - 3);
                        $endLine = min(count($fileLines), $errorLine + 3);

                        for ($i = $startLine; $i <= $endLine; $i++) {
                            $lineNumber = $i + 1;
                            $line = htmlspecialchars($fileLines[$i]);
                            if ($i == $errorLine) {
                                echo "<span style='background-color: #e74c3c; color: #fff;'>Line $lineNumber: $line</span><br>";
                            } else {
                                echo "Line $lineNumber: $line<br>";
                            }
                        }
                    }
                    
        echo "      </pre>
                </div>
                <div class='error-section'>
                    <strong>Stack Trace:</strong>
                    <pre>";
                    
                    $trace = debug_backtrace();
                    array_shift($trace); // Remove the first element which is this error handling function
                    foreach ($trace as $item) {
                        if (isset($item['file']) && isset($item['line'])) {
                            echo "File: {$item['file']} on Line: {$item['line']}<br>";
                        }
                    }
                    
        echo "      </pre>
                </div>
                <div class='error-section'>
                    <strong>Date and Time:</strong> $dateTime
                </div>
                <div class='error-section'>
                    <strong>Server Info:</strong> $serverInfo
                </div>
                <div class='error-section'>
                    <strong>PHP Version:</strong> $phpVersion
                </div>
                <div class='error-section'>
                    <strong>Client IP:</strong> $clientIP
                </div>
                <div class='error-section'>
                    <strong>Request URI:</strong> $requestURI
                </div>
                <div class='error-section'>
                    <strong>Error generated by:</strong> Aman Chauhan
                </div>
            </div>
        </div>";
    }
}

// Example of setting the custom error handler
set_error_handler([Boot::Intance(), 'customErrorHandling']);
?>