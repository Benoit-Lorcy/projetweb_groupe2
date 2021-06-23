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
function creation_trajet(url) {
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

