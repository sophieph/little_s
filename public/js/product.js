function orderProduct() {
    var order = document.getElementById("sort").value;


    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            document.getElementById("text-product").innerHTML = this.responseText;
		} else {
            document.getElementById("text-product").innerHTML = 'Could not make it.';

        }
	};
    xhr.open("GET", "index.php?action=edit-product&codeProduit=" + codeProduit , true);
    xhr.send(null);

    return false;
}