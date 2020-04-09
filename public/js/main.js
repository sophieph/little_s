function init() {
    initEvents();

}

function initEvents() {
    $(".hamburger").click(function(){
        $("nav").slideToggle();
    });

    
    $("#add-to-bag").click(function() {

        addBag();
        
    }
    );
    
}

function addBag() {
        id = id_member;
        codeProduit = $('#add-to-bag').val();

    $.ajax({
        url : "/little/",
        type : 'GET',
        data : "action=add-to-basket&id=" + id + "&codeProduit=" + codeProduit, 
        dataType : 'html',
        success : function(code_html, statut){
            console.log('success');
            // $(document).html(resultat.responseText);

        },
 
        error : function(resultat, statut, erreur){
            console.log(erreur);
        },
 
        complete : function(resultat, statut){
            console.log( resultat);
            window.location.replace('/little/?action=basket');

            // $(document).html(resultat.responseText);
            // init();
        }
     });

}