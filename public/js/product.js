function orderProduct(value) {
    var order = value;
    var category = document.getElementById("category").value;

    
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            document.getElementById("catalogue").innerHTML = this.responseText;

		} else {
            document.getElementById("catalogue").innerHTML = 'Could not make it.';

        }
	};
    xhr.open("GET", "index.php?action=sort&order=" + order + "&category=" + category, true);
    xhr.send(null);

    return false;
}