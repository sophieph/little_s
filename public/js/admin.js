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