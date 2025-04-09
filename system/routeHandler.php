<?php
/**************************
 * Project : Adultwire.online
 * Theme   : @TruckUI
 * Earlier : @desiwire for adultwire
 * Version : v3.29.2
 * Dev     : Aman Chauhan™
 * Date    : 21/03/2021
 * Support : djamanmixprime@gmail.com
 * license : https://www.apache.org/licenses/LICENSE-2.0
 * **************************/
class Route {
  public static $routes = array();

  // function to match the requested URL with a route
  
  public static function match($requestUrl) {
    // extract the path component of the request URL
    
    $urlParts = parse_url($requestUrl);
    
    $path = $urlParts['path'];

    foreach (self::$routes as $routePattern => $callback) {
      if (preg_match($routePattern, $path, $matches)) {
        // call the callback function with any captured parameters
        array_shift($matches); // remove the full match
        
        call_user_func($callback, $matches);

        return true;
      }
    }
    return false;
  }
}




class RouteAdd {
  public static function add($routePattern, $callback) {
    // replace multiple placeholders with regex patterns
   
    $routePattern = preg_replace('/:([^\/]+)/', '(?P<$1>[^/]+)/?', $routePattern);

    // add the route to the static $routes array in the Route class
    Route::$routes['#^' . $routePattern . '(\/?)$#'] = $callback;
  }
}


// define some routes using the RouteAdd class

?>