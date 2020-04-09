function editM() {

    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var home = document.getElementById("home").value;
    
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            document.getElementById("f").innerHTML = this.responseText;
            window.location = "/little/?action=account&email=" + email;

		} else {
            // document.getElementById("f").innerHTML = 'Could not make it.';

        }
	};
    xhr.open("GET", "index.php?action=edit-member&name=" + name + "&email=" + email + "&home=" + home, true);
    xhr.send(null);

    return false;
}