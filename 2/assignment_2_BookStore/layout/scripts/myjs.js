




// //start url
// function xmlCore() {// open the core functionality with the current tab and with the url below
//     window.open(window.location.pathname + "?url='https://earthquake.usgs.gov/fdsnws/event/1/query?format=quakeml&starttime=2020-01-15T00:00:00&endtime=2020-01-15T12:00:00'", "_self");
// }

// function jsonCore() {// open the core functionality with the current tab and with the url below
//     window.open(window.location.pathname + "?url='https://earthquake.usgs.gov/fdsnws/event/1/query?format=geojson&starttime=2020-01-15T00:00:00&endtime=2020-01-15T12:00:00'", "_self");
// }
// function buildURL() {
//     var output = window.location.pathname + "?url='https://earthquake.usgs.gov/fdsnws/event/1/query?";//build the initial url with the file.php followed by the query

//     // get appropriate values from elements
//     var format = $('#format').val();
//     var starttime = $("#start_date").val();
//     var endtime = $("#end_date").val();
//     var longitude = $("#lon").val();
//     var latitude = $("#lat").val();
//     var maxradiuskm = $("#rad").val();
//     var alertlevel = $('#alertlevel').val();
//     var currenttime = new Date();

//     //validation
//     if ((Date.parse(starttime) > Date.parse(endtime)) || ((Date.parse(endtime) > Date.parse(currenttime)))) {//validation date
//         alert("Invalid Date Range");
//     } else if ((parseFloat(maxradiuskm) > 20001.6)) {// validation on the max radius
//         alert("Invalid radius must be less than 20001.6");
//     } else {// build the url
//         output += "format=" + format;
//         if (starttime) {
//             output += "&starttime=" + starttime;
//         }
//         if (endtime) {
//             output += "&endtime=" + endtime;
//         }
//         if (alertlevel) {
//             output += "&alertlevel=" + alertlevel;
//         }
//         if (longitude) {
//             output += "&longitude=" + longitude;
//         }
//         if (latitude) {
//             output += "&latitude=" + latitude;
//         }
//         if ((maxradiuskm) && (longitude) && (latitude)) {
//             output += "&maxradiuskm=" + maxradiuskm;
//         }
//         output += "'";//closing the url
//         window.open(output, "_self");//open the url in the current tab
//         //alert(output);
//     }
// }
// //end url


// //start fill html elements
// function fillElements() {
//     var url = window.location.href;// get current url
//     url = url.substring(url.indexOf('%27') + 0);//reject text before %27
//     url = url.replaceAll('%27', '');//remove all %27
//     url = new URL(url);//change text to url

//     // get appropriate queries from url
//     var format = url.searchParams.get("format");
//     var starttime = url.searchParams.get("starttime");
//     var endtime = url.searchParams.get("endtime");
//     var alertlevel = url.searchParams.get("alertlevel");
//     var longitude = url.searchParams.get("longitude");
//     var latitude = url.searchParams.get("latitude");
//     var maxradiuskm = url.searchParams.get("maxradiuskm");

//     //set the elements with the appropriate values from the query
//     $('#format').val(format);
//     if (starttime) {
//         $("#start_date").attr('value', starttime);
//     }
//     if (endtime) {
//         $("#end_date").attr('value', endtime);
//     }
//     if (alertlevel) {
//         $('#alertlevel').val(alertlevel);
//     }
//     if (longitude) {
//         $("#lon").val(longitude);
//     }
//     if (latitude) {
//         $("#lat").val(latitude);
//     }
//     if (maxradiuskm) {
//         $("#rad").val(maxradiuskm);
//     }
// }
// //end filling html elements

