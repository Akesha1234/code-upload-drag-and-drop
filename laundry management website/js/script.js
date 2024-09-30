function validateForm() {
  // Basic form validation before submission
  const pickupDate = document.getElementById('pickupDate').value;
  const pickupTime = document.getElementById('pickupTime').value;
  const addressLine1 = document.getElementById('addressLine1').value;
  const city = document.getElementById('city').value;

  if (!pickupDate || !pickupTime || !addressLine1 || !city) {
    alert('Please fill out all required fields.');
    return false;
  }

  return true; // Submit the form if validation passes
}