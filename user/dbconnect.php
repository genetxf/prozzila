<?php
error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
if (!mysql_connect("localhost", "root", "root")) {
    die('oops connection problem ! --> ' . mysql_error());

}
if (!mysql_select_db("prozzila")) {
    die('oops database selection problem ! --> ' . mysql_error());
}

    /* Windows
     error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
    if (!mysql_connect("localhost", "root", "")) {
        die('oops connection problem ! --> ' . mysql_error());

    }
    if (!mysql_select_db("prozzila")) {
        die('oops database selection problem ! --> ' . mysql_error());
    }*/
?>