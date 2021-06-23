function afficher(div) {
    $('#main').hide();
    $('#allerisen').hide();
    $('#allerville').hide();
    $(`#${div}`).show();
}

//On met les sites dans l'input
fetch("api/v1/site_isen", { method: "GET" })
    .then(data => data.json())
    .then(data => {
        console.log(data)
        data.forEach(element => {
            $("#isen-site").append(
                `<option>${element.nom_du_site}</option>`
            );
            $("#ville-site").append(
                `<option>${element.nom_du_site}</option>`
            );
        });
    });


//Récupération des informations du pemier form
function form_debut_ville() {
    let debut_isen = 0;
    let ville = $("#ville-address").val();
    let site = $("#ville-site").val();
    let date = $("#ville-date").val();
    let t1 = $("#ville-time-depart").val();
    let t2 = $("#ville-time-arrive").val();
    let prix = $("#ville-prix").val();
    let place = $("#ville-place").val();
    nouveauTrajet(debut_isen, ville, site, date + " " + t1 + ":00", date + " " + t2 + ":00", prix, place);
    return false;
}

//Récupération des informations du deuxième form
function form_debut_isen() {
    let debut_isen = 1;
    let ville = $("#isen-address").val();
    let site = $("#isen-site").val();
    let date = $("#isen-date").val();
    let t1 = $("#isen-time-depart").val();
    let t2 = $("#isen-time-arrive").val();
    let prix = $("#isen-prix").val();
    let place = $("#isen-place").val();
    nouveauTrajet(debut_isen, ville, site, date + " " + t1 + ":00", date + " " + t2 + ":00", prix, place);
    return false;
}


function nouveauTrajet(debut_isen, ville, site, date_depart, date_arrivee, prix, place) {
    fetch(`api/v1/addTraject?debut_isen=${debut_isen}&ville=${ville}&site=${site}&date_depart=${date_depart}&date_arrivee=${date_arrivee}&prix=${prix}&place=${place}`)
        .then(data => data.json())
        .then(data => {
            if (data == true) {
                alert("Votre trajet a bien été enregistré");
            } else {
                alert("Un problème est survenu, vérifiez votre trajet");
            }
        })
}