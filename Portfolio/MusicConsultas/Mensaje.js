document.getElementById("submitButton").addEventListener("click", function() {
    fetch("Music4.php", {
        method: "POST",
        body: new FormData(document.getElementById("transactionForm"))
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById("message").innerHTML = data;
    })
    .catch(error => {
        console.error("Error:", error);
    });
});

