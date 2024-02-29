function submitForm() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var message = document.getElementById("message").value;

    var formData = {
        name: name,
        email: email,
        message: message
    };
//
    // Assuming you have a server-side script to handle the form submission
    var url = "server-script.php"; // Replace with your actual server-side script URL

    var xhr = new XMLHttpRequest();
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Handle the response from the server if needed
            console.log(xhr.responseText);
        }
    };

    // Convert the form data to JSON before sending
    var jsonData = JSON.stringify(formData);

    xhr.send(jsonData);
}
