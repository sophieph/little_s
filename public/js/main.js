function init() {
    initEvents();

}

function initEvents() {
    $(".hamburger").click(function(){
        $("nav").slideToggle();
    });

    $("#form-sort #sort").change(function() {
        sortProduct(this.value);
    }

    );
}

function sortProduct(tri) {
    
    $.ajax({
        url : "/little/",
        type : 'GET',
        data : "action=sort&ajax=true&category=&order=" + tri, 
        dataType : 'html',
        success : function(code_html, statut){
            console.log('success');
        },
 
        error : function(resultat, statut, erreur){
            console.log(erreur);
        },
 
        complete : function(resultat, statut){
            console.log(resultat);
            $('main').html(resultat.responseText);
            init();
        }
 
     });
}