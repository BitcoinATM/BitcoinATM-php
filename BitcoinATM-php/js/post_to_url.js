// function for posting to URL

function post_to_url(path, params, method, csrf_token) {
	var method = method || "POST"; // Set method to post by default, if not specified.
	var csrf_token = csrf_token || "";

	var form = document.createElement("form");
	form.setAttribute("method", method);
	form.setAttribute("action", path);
	form.innerHTML = csrf_token

	for(var key in params) {
		var hiddenField = document.createElement("input");
		hiddenField.setAttribute("type", "hidden");
		hiddenField.setAttribute("name", key);
		hiddenField.setAttribute("value", params[key]);

		form.appendChild(hiddenField);
	}

	document.body.appendChild(form); 
	form.submit();
}