var myField = document.theform.name;
var myError = document.getElementById('formerror');

myField.onchange = function() {
	var myPattern = new RegExp("[A-Za-z ]+", "i");
	var isValid = this.value.search(myPattern) >= 0;
	if (!(isValid)) {
		myError.innerHTML = "Please use only alphabates";
	} else {
		myError.innerHTML = "";
	}
}

