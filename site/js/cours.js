function validateForm() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    var checked = false;
    checkboxes.forEach(function(checkbox) {
        if (checkbox.checked) {
            checked = true;
        }
    });
    if (!checked) {
        alert("Veuillez sélectionner au moins un cours.");
        return false; // Empêche l'envoi du formulaire si aucune case n'est cochée
    }
    return true;
}