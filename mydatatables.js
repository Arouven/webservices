$(document).ready(function () {


    $('#earthquakes1').dataTable({
        "columnDefs": [{
            "targets": -1,
            "searchable": false
        }, {
            "targets": [-1, 3],
            "orderable": false,
        }],
        "oLanguage": {
            "sSearch": "Quick Search:"
        }
    });
});