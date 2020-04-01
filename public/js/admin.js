function admin() {
    var mail = document.getElementById("email").value;
    var password = document.getElementById("pass").value;

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            if (this.responseText) {
                document.getElementById("text").innerHTML = 'ok';
                // window.location = 'admin-board.php';
            } else {
                document.getElementById("text").innerHTML = this.responseText;
            }
        }
	};
    xhr.open("GET", "index.php?action=adminC&email=" + mail + "&pass=" + password , true);
    xhr.send(null);

    return false;
}

function deleteNewsletter($email){

   document.getElementById("demo").innerHTML = $email;

}
function adminC() {
    var mail = document.getElementById("email").value;
    var password = document.getElementById("pass").value;

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            if (this.responseText) {
                document.getElementById("text").innerHTML = this.responseText;
                 window.location = '/little';
            } else {
                document.getElementById("text").innerHTML = this.responseText;
            }
        }
	};
    xhr.open("GET", "index.php?action=adminC&email=" + mail + "&pass=" + password , true);
    xhr.send(null);

    return false;  
}


function string(word) {
    var re = /^[A-Za-z ]+$/;
    var val = re.test(word);

    return val;
}

function nameProduct() {
    var name =  document.getElementById("name").value;
    
    if (string(name)) {
        document.getElementById("text-product").innerHTML = "";
        document.getElementById("button").disabled = false;
    }
    else {
        document.getElementById("text-product").innerHTML = "Ne mettez que des lettres alphabétiques.";
        document.getElementById("button").disabled = true;
    }
}

function isInt(value) {
    var re = /^[1-9]+$/;
    var val = re.test(value);

    return val;
  }

function stockProduct() {
    var stock = document.getElementById("stock").value;
    if (isInt(stock)){
        document.getElementById("text-product").innerHTML = "";
        document.getElementById("button").disabled = false;
    } else {
        document.getElementById("text-product").innerHTML = "Ne mettez que des chiffres au dessus de 0";
        document.getElementById("button").disabled = true;
    }
}