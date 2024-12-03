function validateForm() {
    var currentPassword = document.getElementById("current_password").value;

    // Vérifier si le champ du mot de passe actuel est vide
    if (currentPassword.trim() === "") {
        alert("Veuillez entrer votre mot de passe actuel.");
        return false;
    }
    return true;
}
