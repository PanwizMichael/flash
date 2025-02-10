document.getElementById("passwordForm").addEventListener("submit", function (e) {
    e.preventDefault();

    const password = document.getElementById("password").value;
    const errorMessage = document.getElementById("errorMessage");

    if (password === "securetheapp") {
        // Redirect to main page
        window.location.href = "main.html";
    } else {
        // Show error message
        errorMessage.textContent = "Incorrect password. Please try again.";
    }
});