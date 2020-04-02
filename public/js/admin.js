function adminC() {
    var mail = document.getElementById("email").value;
    var password = document.getElementById("pass").value;

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            if (this.responseText) {
                document.getElementById("text").innerHTML = this.responseText;
                 window.location = '/little/?action=board';
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
    var re = /^[0-9]+$/;
    var val = re.test(value);

    return val;
  }

function stockProduct() {
    var stock = document.getElementById("stock").value;
    if (isInt(stock) && stock > 0){
        document.getElementById("text-product").innerHTML = "";
        document.getElementById("button").disabled = false;
    } else {
        document.getElementById("text-product").innerHTML = "Ne mettez que des chiffres au dessus de 0";
        document.getElementById("button").disabled = true;
    }
}



function addP() {
    
    var name = document.getElementById("name").value;
    var date = document.getElementById("date").value;
    var stock = document.getElementById("stock").value;
    var category = document.getElementById("category").value;

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            document.getElementById("text-product").innerHTML = this.responseText;
            window.location = "/little/?action=admin-product";
		} else {
            document.getElementById("text-product").innerHTML = 'Could not make it.';

        }
	};
    xhr.open("GET", "index.php?action=add-product&name=" + name + "&date=" + date + "&stock=" + stock + "&category=" + category  , true);
    xhr.send(null);



    return false;
}