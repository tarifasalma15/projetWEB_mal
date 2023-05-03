jQuery.extend(jQuery.fn.dataTableExt.oSort, { // tri des dates au format euro
    "date-euro-pre": function (a) {
        var x;

        if ($.trim(a) !== '') {
            var frDatea = $.trim(a).split(' à ');
            var frTimea = (undefined != frDatea[1]) ? frDatea[1].split('h') : [00, 00];
            var frDatea2 = frDatea[0].split('/');
            x = (frDatea2[2] + frDatea2[1] + frDatea2[0] + frTimea[0] + frTimea[1]) * 1;
        } else {
            x = Infinity;
        }

        return x;
    },

    "date-euro-asc": function (a, b) {
        return a - b;
    },

    "date-euro-desc": function (a, b) {
        return b - a;
    }
});

$(document).ready(function () {
    $('#myTable').DataTable({
        "bFilter": false,
        "bInfo": false,
        "bLengthChange": false,
        "bPaginate": false,
        "order": [2, 'desc'], // par défaut tri par date
        "columnDefs": [{
            "orderable": false, // désactive tri première colonne
            "targets": 0
        }, {
            type: 'date-euro',
            targets: 2
        }],
        "language": {
            "emptyTable": "Vous n'avez aucune commande."
        }

    });
});