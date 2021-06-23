function afficher(div) {
    $('#main').hide();
    $('#allerisen').hide();
    $('#allerville').hide();
    $('#result').hide();
    $('#validation').hide();
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
    let ville = $("#ville-ville").val();
    let site = $("#ville-site").val();
    let date = $("#ville-date").val();
    printTrajets(`api/v1/trajet?debute_isen=false&ville=${ville}&site=${site}&date=${date}`);
    return false;
}

//Récupération des informations du deuxième form
function form_debut_isen() {
    let ville = $("#isen-ville").val();
    let site = $("#isen-site").val();
    let date = $("#isen-date").val();
    printTrajets(`api/v1/trajet?debute_isen=true&ville=${ville}&site=${site}&date=${date}`);
    return false;
}

//Affiche le tableau grâce a l'url généré
function printTrajets(url) {
    console.log(url)
    fetch(url, { method: "GET" })
        .then(data => data.json())
        .then(data => {
            if (data == "null") {
                alert("Pas de trajet correspondant");
                return false;
            }
            console.log(data);
            afficher("result");
            $("#result-title").html(`${data.length} trajet disponibles`);
            $("#result-data").html("");
            for (i = 0; i < data.length; i++) {
                element = data[i];

                $("#result-data").append(
                    `<tr>
                    <th scope="row">${i + 1}</th>
                    <td>${element.debute_isen == "1" ? element.nom_du_site : element.nom_ville}</td>
                    <td>${element.debute_isen == "0" ? element.nom_du_site : element.nom_ville}</td>
                    <td>${formatDate(element.date_depart)}</td>
                    <td>${formatDate(element.date_arrivee)}</td>
                    <td>${element.nombre_place_restante}</td>
                    <td>${element.prix}</td>
                    <td><button class="btn btn-primary p-0 px-1" onclick="${"validation(" + element.id_trajet + ")"}">Choisir</button></td>
                    </tr>`
                );
            }
        });
}

//Permet de formatter la date pour l'afficher dans le tableau
function formatDate(date2) {
    let date = new Date(date2)
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var ampm = hours >= 12 ? 'pm' : 'am';
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? '0' + minutes : minutes;
    var strTime = hours + ':' + minutes + ' ' + ampm;
    return (date.getMonth() + 1) + "/" + date.getDate() + "/" + date.getFullYear() + "  " + strTime;
}


function validation(id) {
    console.log(`api/v1/trajet?id=${id}`)
    fetch(`api/v1/trajet?id=${id}`, { method: "GET" })
        .then(data => data.json())
        .then(data => {
            if (data == "null") {
                alert("Pas de trajet correspondant");
                return false;
            }
            data = data[0];
            console.log(data);
            afficher("validation");
            $("#validation-data").html(
                `<tr><th scope="row">Heure de départ</th><td>${formatDate(data.date_depart)}</td></tr>
                <tr><th scope="row">Heure de d'arrivée</th><td>${formatDate(data.date_arrivee)}</td></tr>
                <tr><th scope="row">Lieu de départ</th><td>${data.debute_isen == "1" ? data.nom_du_site : data.nom_ville}</td></tr>
                <tr><th scope="row">Lieu de d'arrivée</th><td>${data.debute_isen == "0" ? data.nom_du_site : data.nom_ville}</td></tr>
                <tr><th scope="row">Places Restantes</th><td>${data.nombre_place_restante}</td></tr>
                <tr><th scope="row">Prix</th><td>${data.prix}</td></tr>`
            );
        });
}

function places(url) { }