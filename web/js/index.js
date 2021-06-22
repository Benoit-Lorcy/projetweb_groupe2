$(function () {
    $('header').load('navbar.html');
    $('footer').load('footer.html');
});

function afficher(div) {
    $('#main').hide();
    $('#allerisen').hide();
    $('#allerville').hide();
    $(`#${div}`).show();
}

