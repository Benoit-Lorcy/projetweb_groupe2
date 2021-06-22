$(function () {
    $('header').load('html/navbar.html');
    $('footer').load('html/footer.html');
});

function afficher(div) {
    $('#main').hide();
    $('#allerisen').hide();
    $('#allerville').hide();
    $(`#${div}`).show();
}

