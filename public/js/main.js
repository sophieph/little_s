function init() {
    initEvents();

}

function initEvents() {
    $(".hamburger").click(function(){
        $("nav").slideToggle();
    });

    // $("#form-sort #sort").change(function() {
    //     var sort = $("#sort").val();
    //     var category = $("#category").val();

    //     console.log("lol" + category);
    //     //sortProduct(this.value);
    // }

    );
}

function sortProduct(sort, category) {
    
    $.ajax({
        url : "/little/",
        type : 'GET',
        data : "action=sort&ajax=true&category=" + category + "&order=" + sort, 
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