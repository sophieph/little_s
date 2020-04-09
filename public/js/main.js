function init() {
    initEvents();

}

function initEvents() {
    $(".hamburger").click(function(){
        $("nav").slideToggle();
    });

    
    // $("#modify").click(function() {
    //     // alert('wooor');
    //     // editMember();
    // }
    // );
    
}

// function editMember() {
//     name = $("#name").val();
//     home = $("#home").val();
//     email = $("#email").val();

//     alert(home+name+email);
    
//     return true;
//     $.ajax({
//         url : "/little/",
//         type : 'GET',
//         data : "action=edit-member&ajax=true&email=" + email + "&name=" + name + "&home=" + home, 
//         dataType : 'html',
//         success : function(code_html, statut){
//             console.log('success');
//         },
 
//         error : function(resultat, statut, erreur){
//             console.log(erreur);
//         },
 
//         complete : function(resultat, statut){
//             console.log(resultat);
//             $('.info').html(resultat.responseText);
//             init();
//         }
 
//      });

// }