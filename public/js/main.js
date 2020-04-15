function init() {
    initEvents();

}

function initEvents() {
    $(".hamburger").click(function () {
        $("nav").slideToggle();
    });

    $("#add-to-bag").click(function () {
        addBag();
    });

    $("#research-items").submit(function(e) {
        search();
        e.preventDefault();
        });

}
function search() {
    
    product = $('#searchItems').val();
    alert(product);
    $.ajax({
        url: "/little/",
        type: 'GET',
        data: "action=search&ajax=true&str=" + product,
        dataType: 'html',
        success: function (code_html, statut) {
            console.log('success');
            // $(document).html(resultat.responseText);
        },

        error: function (resultat, statut, erreur) {
            console.log(erreur);
        },

        complete: function (resultat, statut) {
            console.log(resultat);
            // document.location.reload(true);
            $(document).html(resultat.responseText);
            // init();
        }
    });
}
function addBag() {
    id = id_member;
    codeProduit = $('#add-to-bag').val();

    if (id.length == 0) {
        alert('Connectez-vous pour ajouter un produit au panier');
    } else {
        $.ajax({
            url: "/little/",
            type: 'GET',
            data: "action=add-to-basket&id=" + id + "&codeProduit=" + codeProduit,
            dataType: 'html',
            success: function (code_html, statut) {
                console.log('success');
                // $(document).html(resultat.responseText);
            },

            error: function (resultat, statut, erreur) {
                console.log(erreur);
            },

            complete: function (resultat, statut) {
                alert('Produit ajouté au panier');
                document.location.reload(true);
                // $(document).html(resultat.responseText);
                // init();
            }
        });
    }

}

