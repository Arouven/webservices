<?php
function addPagination($array, $recordPerPage, $page)
{

    //for pagination
    // $numberOfdata= count($array);
    // $dtPerPage = $recordPerPage;
    // $numOfPage = $numberOfdata/$dtPerPage;


    $GLOBALS['numberOfdata'] = count($array);
    $GLOBALS['dtPerPage'] = $recordPerPage;
    $numOfPage =  $GLOBALS['numberOfdata'] / $GLOBALS['dtPerPage'];

    if (!empty($_GET['page'])) {

        $GLOBALS['actualPage'] = $_GET['page'];
    } else {
        $GLOBALS['actualPage'] = 1;
        header("Location: $page&page=" . $GLOBALS['actualPage']);
    }


    $GLOBALS['dtEnd'] = $GLOBALS['actualPage'] * $GLOBALS['dtPerPage'] - 1;
    $GLOBALS['dtStart'] = $GLOBALS['dtEnd'] - ($GLOBALS['dtPerPage'] - 1);
    $txt = "";


    if ($_GET['page'] == $numOfPage) {
        $GLOBALS['hideEnd'] = "d-none";
    } else {
        $GLOBALS['hideEnd'] = "d-block";
    }

    if ($_GET['page'] == 1) {
        $GLOBALS['hideStart'] = "d-none";
    } else {
        $GLOBALS['hideStart'] = "d-block";
    }

    echo '<nav>
        <ul class="pagination">

            <li class="page-item ' . $GLOBALS['hideStart'] . '"><a class="page-link" href="' . $page . '&page=' . intval($_GET['page'] - 1)  . '" aria-label="Previous"><span aria-hidden="true">«</span></a></li>';

    for ($i = 1; $i <= $numOfPage; $i++) {

        if ($i == $_GET['page']) {
            $txt = "bg-success";
        } else {
            $txt = "";
        }



        echo '<li class="page-item"><a class="page-link ' . $txt . '" href="' . $page . '&page=' . $i . '">' . $i . '</a></li>';
    }


    echo ' <li class="page-item ' . $GLOBALS['hideEnd'] . '"><a class="page-link" href="' . $page . '&page=' . intval($_GET['page'] + 1) . '" aria-label="Next"><span aria-hidden="true">»</span></a></li>
        </ul>
    </nav>';
}
function get_the_Title()
{
    $url = 'http://localhost/1/2/assignment_2_BookStore/apis/myapi.php?format=json';

    $jsonData = file_get_contents($url, true);
    $dt = json_decode($jsonData);

    addPagination($dt, 3, "index.php");

    for ($i = $GLOBALS['dtStart']; $i <= $GLOBALS['dtEnd']; $i++) {



        $count = $dt[$i]->rating;
        $rate = "";
        for ($x = 0; $x < $count - 1; $x++) {
            $rate .= '<i class="fa fa-star" style="color:rgb(255,255,255);"></i>';
        }


        echo ' 
                    <div>
                        <div class="container">
                            <div class="row" style="height: 100vh;">
                                <div class="col-md-12 align-self-center">
                                    <div class="card" style="background-color: rgb(171,228,221);">
                                        <div class="card-body">
                                            <img class="d-xl-flex" style="margin: auto;" src="' . $dt[$i]->cover . '">
                                            <h4 class="text-center card-title"> <b>TITLE</b> : ' . $dt[$i]->title . '</h4>
                                            <h5 class="text-center card-title"> <b>ISBN</b> : ' . $dt[$i]->isbn . '</h5>
                                            <h6 class="card-title"> <b>Author</b> : ' . $dt[$i]->author . '</h6>
                                            <h6 class="text-muted card-subtitle mb-2"> <b>Year released</b> : ' . $dt[$i]->year_published . '</h6>
                                            <h6 class="text-muted card-subtitle mb-2"> <b>Language</b> : ' . $dt[$i]->language . '</h6>
                                            <h6 class="text-muted card-subtitle mb-2"> <b>Rating</b> : ' . $rate . '</h6>
                                            <h2 class="text-center text-muted card-subtitle mb-2"> <b>Category</b> : ' . $dt[$i]->category . '</h2>
                                            <p class="card-text" > <b>Description</b> : ' . $dt[$i]->description . '</p>
                                            <p class="card-text"> <b>Review</b> : ' . $dt[$i]->review . '</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                ';
    }
}
