<?php

require 'allCard.php';


// Use parse_str() function to parse the
// string passed via URL
parse_str($_SERVER["QUERY_STRING"], $params); // store all queries in $params
