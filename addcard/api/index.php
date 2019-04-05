<?php


require '../config/db.config.php';

require 'Slim/Slim.php';
// Turn off error reporting
error_reporting(0);

// Report runtime errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Report all errors
error_reporting(E_ALL);

// Same as error_reporting(E_ALL);
ini_set("error_reporting", E_ALL);

// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
$std = new \slim\slim();

    
// / GET route is used to get the data in table
$app->get('/getcard', function () use ($app) {

   // $sqlList = "SELECT * FROM card";
 
    // data get using procedure
  $sqlList = 'CALL getcard(@id,@ccnumber,@cccvs,@ccexpyear,@user_id)';
 
 

   // created php associative array to store results and message

   $response = array("msg" => null, "data" => null);

   // this will return array of rows from table agains the query
   $response["data"] = DB::query($sqlList);

   // checking data is loading then adding message text
   if ($response["data"]) {
       $response["msg"] = "Data loaded";
   } else {
       $response["msg"] = "Data not loaded";
   }

   // we will send JSON response to HTTP
   $app->response()->status(200); // HTTP Status Code Set to 200
   $app->response()->header('Content-Type', 'application/json'); // Response Content Type Set to JSON
   $app->response()->write(json_encode($response)); // Response is encoded in json. The array is converted into JSON and sent out in HTTP response stream
});

// // GET route
//   $app->get('/getcard', function () use($app) {

//      $number = $app->request->get('ccnumber');
//      $cvs = $app->request->get('cccvs');
//      $month = $app->request->get('ccexpmonth');
//      $year = $app->request->get('ccexpyear');
//      $userid = $app->request->get('user_id'); 

//      array(
//          "ccnumber" => $number,
//         "cccvs" => $cvs,
//          "ccexpmonth" => $month,
//          "ccexpyear" => $year,
//         "user_id" => $userid
//      );
     
//      $result = DB::query("SELECT ccnumber,cccvs,ccexpmonth,ccexpyear FROM card");
//     //   foreach($result as $row){
//     //       echo "ccnumber" . $row['ccnumber']."\n" ;
//     //       echo "cccvs" . $row['cccvs']."\n" ;
//     //      echo "ccexpmonth" . $row['ccexpmonth']."\n" ;
//     //       echo "ccexpyear" . $row['ccexpyear']."\n" ;
//     //       echo " _ _ _ _ _/n";
         
//     //  }
     
    
    

//      die(json_encode($result));
    
     
//   }
//  );
    /*
    This is currently a default get route because if you see the function argument of get ( '/', callback) this is the signature of SLIM
    and in this default route we have $app->get ( '/', function(){

    });
     */
   // echo "THIS IS HELLO ROUTE ON HTTP_GET";


// insert data in database 

// POST Create Card
   $app->post('/card', function () use ($app) {

   $id = $app->request->post('id');
   $number = $app->request->post('ccnumber');
   $cvs = $app->request->post('cccvs');
   $month = $app->request->post('ccexpmonth');
   $year = $app->request->post('ccexpyear');
   $userid = $app->request->post('user_id');
    

    // split year and month
    // $year = explode("/",$postData["year"])[0];
    // $month = explode("/",$postData["year"])[1];

    $saveToDb =array(
        "id"=>$id,
        "ccnumber" => $number,
        "cccvs" => $cvs,
        "ccexpmonth" => $month,
        "ccexpyear" => $year,
        "user_id" => $userid
        
    );

    // simple insert of form data using meekrodb
    Db :: debugMode();
    
    $sql = "call insertcard('@id','@ccnumber','@cccvs','@ccexpmonth','@ccexpyear','@user_id')";
    DB::insert('card',$sql);
       // $saveToDb
    
    // get new inserted id
    $newId = DB::insertId();
    echo $newId;
    die(json_encode($saveToDb));
    
}
);


// PUT route for update used
$app->put('/put', function () use($app) {

   $id = $app->request->put('id');
   $number = $app->request->put('ccnumber');
   $cvs = $app->request->put('cccvs');
   $month = $app->request->put('ccexpmonth');
   $year = $app->request->put('ccexpyear');
   $userid = $app->request->post('user_id');
    

    $putData = array(
       "id" => $id,
        "ccnumber" => $number,
        "cccvs" => $cvs,
        "ccexpmonth" => $month,
        "ccexpyear" => $year,
        "user_id" => $userid
       
    );
    Db :: debugMode();
    try{
        $sql = "CALL updatecard($id)";
    DB::update('card', $putData, "id=%i", $id,$sql);
    }catch(MeekroDBException $e){
        die('Error'.$e->getMessage());  
    }
    die(json_encode($putData));
       
}

);

// PATCH route
$app->patch('/patch', function () use ($app) {

    echo 'This is a PATCH route';
});

// DELETE route
$app->post('/delete', function () use ($app) {

     $id = $app->request->post('id');
    // DB::delete('card', "id=%i", $id );
     
     $sql="CALL deletecard($id)";
     DB::query($sql);
    // print_r($id); exit;
   // echo 'This is a DELETE route';

    die(json_encode(['status'=>true]));


}
);

/**
 * Step 4: Run the Slim application
 *
 * This method should be called last. This executes the Slim application
 * and returns the HTTP response to the HTTP client.
 */
$app->run();
