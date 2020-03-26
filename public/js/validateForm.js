
// verification d'email
function email(mail) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var val = re.test(mail);

    return val;
}

// si le champ est nul
function empty(mail) {
    if (mail == "") {
        return false;
    }
}

// verification du mot de passe
function passwordMatched(pass) {
    var re = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    var val = re.test(pass);

    return val;
}

// verification mail
function validateNews(mail) {
    
    if (empty(mail) == false) {
        document.getElementById("messageNewsletter").innerHTML="Entrez une adresse mail !";
        document.getElementById("emailNewsletter").focus();
        return;
    }

    if (email(mail) == false) {
        document.getElementById("messageNewsletter").innerHTML="Entrez une adresse correcte !";
        document.getElementById("emailNewsletter").focus();
        return;
    }

    document.getElementById("messageNewsletter").innerHTML="";
}

// inscription de l'email dans la bdd
function validateNewsletter() {
    
    var mail = document.newsletterForm.emailNewsletter.value;
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            document.getElementById("messageNewsletter").innerHTML = this.responseText;
		}
	};
    xhr.open("GET", "index.php?action=subscribe&emailNewsletter=" + mail , true);
    xhr.send(null);

    document.getElementById("emailNewsletter").focus();

    return false;
}

function validateSignUp() {
    var message = "";
    var name = document.getElementById("sign-up-name").value;
    var mail = document.getElementById("sign-up-email").value;
    var password1 = document.getElementById("sign-up-pass1").value;
    var password2 = document.getElementById("sign-up-pass2").value;
    var category = document.getElementById("sign-up-category").value;

    // condition sur name
    if (empty(name) == false) {
        message = "Entrez un nom <br>";
        document.getElementById("text-sign-up").innerHTML = message;
        document.getElementById("sign-up-name").focus();
        return false;
    }

    // condition sur email
    if (empty(mail) == false) {
        message = "Entrez un email !<br>";
        document.getElementById("text-sign-up").innerHTML = message;
        document.getElementById("sign-up-email").focus();
        return false;
    }

    if (email(mail) == false) {
        message = "Entrez une adresse mail correcte ! <br>";
        document.getElementById("text-sign-up").innerHTML = message;
        document.getElementById("sign-up-email").focus();
        return false;
    }

    // condition sur password 1
    if (passwordMatched(password1) == false) {
        message = "Votre mot de passe doit contenir : <br> " + 
        " - au moins 8 caractères <br>" +
        " - une lettre et un chiffre <br>";
        document.getElementById("text-sign-up").innerHTML = message;
        document.getElementById("sign-up-pass1").focus();
        return false;
    }

    // condition sur password 2
    if (password1 != password2) {
        message = "Tapez le même mot de passe !"
        document.getElementById("text-sign-up").innerHTML = message;
        document.getElementById("sign-up-pass2").focus();
        return false;
    }

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            document.getElementById("text-sign-up").innerHTML = this.responseText;
		}
	};
    xhr.open("GET", "index.php?action=signupC&name=" + name + "&email=" + mail + "&pass1=" + password1 + "&category=" + category, true);
    xhr.send(null);

    return false;
}


function validateSignIn() {
    var mail = document.getElementById("sign-in-email").value;
    var password = document.getElementById("sign-in-pass").value;

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            if (this.responseText == 1) {
                window.location.replace('/little');
            } else {
                document.getElementById("text-sign-in").innerHTML = this.responseText;
            }
        }
    };
    xhr.open("GET", "index.php?action=signinC&email=" + mail + "&pass=" + password , true);
    xhr.send(null);

    document.getElementById("sign-in-pass").focus();

    return false;
}
