$(document).ready(function () {
    $('#myTable').DataTable({
        "bFilter": false,
        "bInfo": false,
        "bLengthChange": false,
        "bPaginate": false,
        "order": [0, 'asc'], // par défaut tri par nom
        "columnDefs": [{
            "orderable": false, // désactive tri colonne action
            "targets": 2
        }],
        "language": {
            "emptyTable": "Vous n'avez aucun produit." 
        }

    });
});