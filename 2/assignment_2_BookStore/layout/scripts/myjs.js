
// //start url
function detectQueryString() {
    var currentQueryString = window.location.search;
    if (currentQueryString) {
        return true;
    } else {
        return false;
    }
};
$(document).ready(function () {//build the big map only if there is a query in the url
    if (!detectQueryString()) {
        showAllJson();
    }
});



function showAllJson() {// open the core functionality with the current tab and with the url below
    window.open(window.location.pathname + "?format=json", "_self");
}
function buildURL() {
    var output = window.location.pathname + "?";//build the initial url with the file.php followed by the query

    // get appropriate values from elements
    var format = $('#format').val();
    var isbn = $("#isbn").val();
    var author = $("#author").val();
    var category = $("#category").val();
    var title = $("#title").val();
    var language = $("#language").val();
    var orderby = $("#orderby").val();
    var limit = $('#limit').val();

    // build the url
    output += "format=" + format;
    if (isbn) {
        output += "&isbn=" + isbn;
    }
    if (author) {
        output += "&author=" + author;
    }
    if (category) {
        output += "&category=" + category;
    }
    if (title) {
        output += "&title=" + title;
    }
    if (language) {
        output += "&language=" + language;
    }
    if (orderby) {
        output += "&orderby=" + orderby;
    }
    if (limit) {
        output += "&limit=" + limit;
    }
    window.open(output, "_self");//open the url in the current tab
    //alert(output);

}
//end url


//start fill html elements
function fillElements() {
    var url = window.location.href;// get current url
    url = new URL(url);//change text to url

    // get appropriate queries from url
    var format = url.searchParams.get("format");
    var isbn = url.searchParams.get("isbn");
    var author = url.searchParams.get("author");
    var category = url.searchParams.get("category");
    var title = url.searchParams.get("title");
    var language = url.searchParams.get("language");
    var orderby = url.searchParams.get("orderby");
    var limit = url.searchParams.get("limit");

    //set the elements with the appropriate values from the query
    $('#format').val(format);
    if (isbn) {
        $("#isbn").val();
    }
    if (author) {
        $("#author").val();
    }
    if (category) {
        $("#category").val();
    }
    if (title) {
        $("#title").val();
    }
    if (language) {
        $("#language").val();
    }
    if (orderby) {
        $("#orderby").val();
    }
    if (limit) {
        $('#limit').val();
    }
}
//end filling html elements

