// ajout Objet
$('#new').submit(function (e) {
    e.preventDefault();
    let formdata = new FormData(this);

    $.ajax({
        type: "post",
        url: "http://localhost/CodeIgniterProjects/TAKALOTEMP/Compte/insertObjet",
        data: formdata,
        processData: false,
        contentType: false,
        success: function (response) {
            alert("ajout d'objet reussi");
        },
        error: function (response) {
            alert("erreur");

        }
    });
});


// demande echange
$('#echangement').submit(function (e) {
    e.preventDefault();
    let formdata = new FormData(this);

    $.ajax({
        type: "post",
        url: $(this).attr('action'),
        data: formdata,
        processData: false,
        contentType: false,
        success: function (response) {
            alert("Demande d'echange reussi");
        },
        error: function (response) {
            alert("erreur");

        }
    });
});

// acceptation echange
$('.accepter').click(function (e) {
    e.preventDefault();
    $.ajax({
        type: "post",
        url: $(this).attr('href'),
        processData: false,
        contentType: false,
        success: function (response) {

        },
        error: function (response) {
            console.log(response)

        }
    });
    $(this).parent().slideUp(500, function () {
        $(this).remove();
    });

});

// refuser echange
$('.refuser').click(function (e) {
    e.preventDefault();
    $.ajax({
        type: "post",
        url: $(this).attr('href'),
        processData: false,
        contentType: false,
        success: function (response) {
            $(this).parent().slideUp(500, function () {
                $(this).remove();
            });
        },
        error: function (response) {
            // alert("erreur");

        }
    });

    $(this).parent().fadeOut(1000, function () {
        $(this).remove();
    });
});

// tabs 
function configCard(data) {
    $.each(data, function (index, card) {
        let c = `
            <div class="card reveal">
                <i data-idobjet="${card['idObjet']}" class="${(card['class'] == 'love') ? 'fas' : 'far'} fa-heart heart ${card['class']}"></i>

                <a class="image" href="http://localhost/CodeIgniterProjects/TAKALOTEMP/Home/details/${card['idObjet']}">
                    <img class="pro-image" src="http://localhost/CodeIgniterProjects/TAKALOTEMP/assets/images/${card['photo']}" alt="">
                </a>
                <div class="info">
                    <p class="titre">${card['titre']} </p>
                    <p class="descri">${card['descri']} </p>
                    <p class="price">$${card['prix']}ar</p>
                    <span class="note">@${card['prenom']} </span>
                </div>
            </div>
            `;
        $('.shop').append(c);
    })
    aimer();
}
function chargerObjets(chemin) {
    $('.shop').empty();
    $.ajax({
        type: "post",
        url: chemin,
        dataType: 'json',
        success: function (data) {
            configCard(data);
        },
        error: function (response) {
        }
    });

}


$('.tabs-box .tab').each(function () {
    $(this).click(function (e) {
        e.preventDefault();
        let ch = $(this).attr('href');
        chargerObjets(ch);
    });
})

// $('.navbar .navlink').each(function () {
//     $(this).click(function (e) {
//         e.preventDefault();
//         let ch = $(this).attr('href');
//         chargerObjets(ch);
//     });
// })


// chargerObjets('http://localhost/CodeIgniterProjects/TAKALOTEMP/Home/ajax')
