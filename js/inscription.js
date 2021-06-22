/*function form_inscription() {

    let prenom = $("#prenom").val();
    let nom = $("#nom").val();
    let mail = $("#mail").val();
    let pseudo = $("#pseudo").val();
    let telephone = $("#telephone").val();
    let mot_de_passe = $("#mot_de_passe").val();
    let mot_de_passe_verification = $("#mot_de_passe_verification").val();

    if (mot_de_passe !== mot_de_passe_verification) {
        alert("Les deux mots de passe ne correspondent pas");
        return false;
    }

    fetch("api/v1/utilisateurs", {
        method: "POST",
        body: JSON.stringify({
            prenom: prenom, nom: nom,
            mail: mail, pseudo: pseudo, telephone: telephone, mot_de_passe: mot_de_passe
        })
    }).then(response => console.log(response));

    alert("uwu");
    return false;
}*/