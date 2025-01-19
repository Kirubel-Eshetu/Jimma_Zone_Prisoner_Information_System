function prepareCertificate() {
    var prisonerId = document.getElementById('prisonerId').value;
    var fullName = document.getElementById('fullname').value;
    var date = document.getElementById('date').value;

    // Check if all fields are filled
    if (prisonerId && fullName && date) {
        // Redirect to PHP script for generating the certificate
        window.location.href = 'certificate.php?prisonerId=' + prisonerId + '&fullname=' + fullName + '&date=' + date;
    } else {
        alert('Please fill in all fields.');
    }
}
