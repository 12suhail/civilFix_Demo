const form = document.getElementById("reportForm");
const message = document.getElementById("formMessage");

form.addEventListener("submit", function(event) {

    const name = form.name.value.trim();
    const description = form.description.value.trim();

    // Validate name
    if (name.length < 2) {
        event.preventDefault();
        message.textContent = "Please enter a valid name.";
        return;
    }

    // Validate description
    if (description.length < 10) {
        event.preventDefault();
        message.textContent = "Description must be at least 10 characters.";
        return;
    }

    // Confirm before submitting
    const confirmed = confirm("Are you sure you want to submit this report?");

    if (!confirmed) {
        event.preventDefault();
        message.textContent = "Report submission cancelled.";
    }
});