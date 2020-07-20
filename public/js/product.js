function changeQty(code, sign){
    console.log(sign);
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            document.getElementById("t").innerHTML = this.responseText;
            window.location = "/little/?action=basket&id=" + id_member;
		}
	};

    xhr.open("GET", "index.php?action=change-quantity&code=" + code + "&id=" + id_member + "&change=" + sign, true);
    xhr.send(null);
}

function sortProduct(value) {
    var sort = value;
    var category = document.getElementById("category").value;

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            document.getElementById("catalogue").innerHTML = this.responseText;
		} 
	};
    xhr.open("GET", "index.php?action=sort&ajax=true&sort=" + sort + "&category=" + category, true);
    xhr.send(null);

    return false;
}

function search(value) {

    if (value == '') {
        window.location = "/";
    }

    var xhr = new XMLHttpRequest();
    
    
    xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            document.getElementById("content").innerHTML = this.responseText;
		} 
	};
    xhr.open("GET", "index.php?action=search&ajax=true&str=" + value, true);
    xhr.send(null);

    return false;
}