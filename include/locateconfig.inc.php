<?php

$GLOBALS['IMAGE_ROOT'] = '/data/www/html/images';
$GLOBALS['IMAGE_ROOT_URL'] = '/images';
$arvhive=0;

//Function to connect to the mysql server & return resource id

function db_connect() {
   $db_user = 'duncandt';
   $db_pass = 'ms12spec34';
   $db_host = 'localhost';
   $db_name = 'cpv_2d';
   $connection = @mysql_connect("$db_host", "$db_user", "$db_pass")
	or die ("Cannot connect to Mysql.");
   $db = @mysql_select_db($db_name,$connection)
	or die ("Cannot select the database.");
   return $db;
}


//Function to select a database
function db_select($connection) {
}

//Function to disconnect from the database
function db_disconnect($connection) {
        mysql_close();
}

//Function to execute a query & return result
function db_query($connection, $sql) {
   $stmt = mysql_query($sql) or die (mysql_error());; 
   return $stmt;
}


//Function to execute a query
function db_query1($connection, $sql) {
   mysql_query($sql);
   echo mysql_error();
}


//Function to fetch all rows into an array
function db_fetch($stmt,&$query_result) {
    while ($row = mysql_fetch_row($stmt)){
      array_push($query_result, $row);
    }
}


#//Function to fetch all rows into an array
#function db_fetchlob($lob,$stmt,&$query_result) {
#    while (OCIFetchInto ($stmt, &$row,OCI_RETURN_LOBS+OCI_RETURN_NULLS)){
#      array_push($query_result, $row);
#    }
#}


//Function to fetch the first row into an array
function db_fetch1($stmt){
   $query_result = mysql_fetch_row($stmt);
   return $query_result;
}

//Function to free a statement
function db_freestmt($stmt) {
}

//Function to report error to user and email administrator

function db_error($type, $errors) {
   echo "<font color=red>Error message: $errors[message]<br><br></font>";
   echo "$type<br>";
   echo "Error happened when connecting to the database. The database may be down, or there is a problem with the table you are querying. Please report this problem with the error message. Thanks!";
   exit;
}
/*
function db_error($type, $errors) {
    #echo "$type $errors[code]<br>";
    if ($user){
       echo "Error happened when connecting to the database. The database may be down, or there is a problem with the table you are querying. E-mail is being sent to the administrator. Please try again later.";
	   $subject="database error";
       $content="error type: $type\n".
                "error code: $errors[code]\n".
                "error message: $errors[message]\n".
                "error sqltext: $errors[sqltext]\n".
                "error is generated by: $user";
       $from="From: WebGestalt\r\n";
       mail($GLOBALS['site_admin_email'],$subject,$content,$from);
       exit;
    }
    else{
       echo "Error happened when connecting to the database. Please try again. Please contact us if this keeps happening.";
       #echo "Error happened when connecting to the database. You may need to enable cookies to avoid this problem. Please contact us if your cookie is on.";
       exit;
    }
}
*/
?>