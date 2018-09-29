$(document).ready( function () {
    $('.datatable').DataTable( {
        "language": {
            "decimal":        "",
            "emptyTable":     "Nema podataka za prikazivanje",
            "info":           "Prikazano _START_ - _END_ od ukupno _TOTAL_ podataka",
            "infoEmpty":      "Prikazano  0 - 0 od ukupno 0 podataka",
            "infoFiltered":   "(filtered from _MAX_ total entries)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Prikaži _MENU_ podataka",
            "loadingRecords": "Učitavanje...",
            "processing":     "Obrađivanje...",
            "search":         "Pretraživanje:",
            "zeroRecords":    "Nema podataka koji zadovoljavaju dani ulaz",
            "paginate": {
                "first":      "Prvi",
                "last":       "Zadnji",
                "next":       "Sljedeća",
                "previous":   "Prethodna"
            },
            "aria": {
                "sortAscending":  ": aktiviraj za uzlazno sortiranje",
                "sortDescending": ": aktiviraj za silazno sortiranje"
            }
        }
    });
} )