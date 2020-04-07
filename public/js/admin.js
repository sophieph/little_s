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

/* if word is a word */
function string(word) {
    var re = /^[A-Za-z ]+$/;
    var val = re.test(word);

    return val;
}

/* check if name is a word */
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

/* if value is Integer */
function isInt(value) {
    var re = /^[0-9]+$/;
    var val = re.test(value);

    return val;
  }

/* check if stock value is int */
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

/* check if price value is int */
function priceProduct() {
    var price = document.getElementById("price").value;
    if (isInt(price) && price > 0){
        document.getElementById("text-product").innerHTML = "";
        document.getElementById("button").disabled = false;
    } else {
        document.getElementById("text-product").innerHTML = "Ne mettez que des chiffres au dessus de 0";
        document.getElementById("button").disabled = true;
    }
}


/* add a product to database with ajax */
function addP() {
    var name = document.getElementById("name").value;
    var date = document.getElementById("date").value;
    var stock = document.getElementById("stock").value;
    var category = document.getElementById("category").value;
    var price = document.getElementById("price").value;

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            document.getElementById("text-product").innerHTML = this.responseText;
            window.location = "/little/?action=admin-product";
		} else {
            document.getElementById("text-product").innerHTML = 'Could not make it.';

        }
	};
    xhr.open("GET", "index.php?action=add-product&name=" + name + "&date=" + date + "&stock=" + stock + "&price=" + price + "&category=" + category  , true);
    xhr.send(null);

    return false;
}

/* add a path */
function addPath() {
    var path = document.getElementById("image").value;
    var category = document.getElementById("category").value;
    document.getElementById("image").value = 'public/images/produit/' + category + '/' +path;
}

function addImage() {
    var path = document.getElementById("image").value;
    var code = document.getElementById("codeProduit").value

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            document.getElementById("image-text").innerHTML = this.responseText;
            window.location = "/little/?action=image-product&codeProduit=" + code;
		} else {
            document.getElementById("image-text").innerHTML = 'Could not make it.';

        }
	};
    xhr.open("GET", "index.php?action=add-image&image=" + path + "&codeProduit=" + code   , true);
    xhr.send(null);
    document.getElementById("image-text").innerHTML = path;
    return false;
}

function edit() {
    var codeProduit = document.getElementById("codeProduit").value;
    var name = document.getElementById("name").value;
    var stock = document.getElementById("stock").value;
    var category = document.getElementById("category").value;
    var price = document.getElementById("price").value;

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            document.getElementById("text-product").innerHTML = this.responseText;
            window.location = "/little/?action=edit-product&codeProduit=" + codeProduit;
		} else {
            document.getElementById("text-product").innerHTML = 'Could not make it.';

        }
	};
    xhr.open("GET", "index.php?action=edit-product&codeProduit=" + codeProduit + "&name=" + name + "&stock=" + stock + "&price=" + price + "&category=" + category  , true);
    xhr.send(null);

    return false;
}