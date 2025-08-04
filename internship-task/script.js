let isSignup = false;

function formToggle() {
    isSignup = !isSignup;
    document.getElementById("title").innerHTML = isSignup ? "Sign Up" : "Login";
    document.getElementById("loginBtn").innerHTML = isSignup ? "Signup" : "Login";
    document.getElementById("toggle").innerHTML = isSignup ? "Sign Up" : "Login"
    document.getElementById("toggle-txt").innerHTML = isSignup ? "Already have an account?" : "Don't have an account?";
    document.getElementById("email-feild").style.display = isSignup ? "flex" : "none";
}

// Attach submit listener after page load
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("form");
    if (form) {
        form.addEventListener("submit", function (e) {
            if (isSignup) {
                alert("Signed up successfully!");
                // Form will still submit to PHP
            }
            // If logging in, no alert — let PHP handle the redirect
        });
    }
});
