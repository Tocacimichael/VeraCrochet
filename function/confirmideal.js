function confirmIdeal() {
    var selectedBank = document.querySelector('input[name="bankRadio"]:checked').value;
    alert("You have selected iDEAL with " + selectedBank + " bank. Proceed with the payment.");
    // Close the modal
    var modal = document.getElementById('idealModal');
    var bootstrapModal = bootstrap.Modal.getInstance(modal);
    bootstrapModal.hide();
  }

  function confirmCreditCard() {
    var cardNumber = document.getElementById('cardNumber').value;
    var expiryDate = document.getElementById('expiryDate').value;
    var cvv = document.getElementById('cvv').value;
    alert("You have entered the following credit card details:\nCard Number: " + cardNumber + "\nExpiry Date: " + expiryDate + "\nCVV: " + cvv + "\nProceed with the payment.");
    // Close the modal
    var modal = document.getElementById('creditCardModal');
    var bootstrapModal = bootstrap.Modal.getInstance(modal);
    bootstrapModal.hide();
  }

  function confirmPayPal() {
    alert("You have selected PayPal. Proceed with the payment.");
    // Close the modal
    var modal = document.getElementById('paypalModal');
    var bootstrapModal = bootstrap.Modal.getInstance(modal);
    bootstrapModal.hide();
  }   