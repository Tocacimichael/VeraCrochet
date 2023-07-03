import "https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"

  // Example PayPal API response
  var paymentStatus = "success"; // Change this variable to test different payment statuses

  // Function to show notification bar with appropriate message
  function showNotification(message, type) {
    var notificationBar = document.getElementById("notificationBar");
    var notificationText = document.getElementById("notificationText");
    
    notificationText.textContent = message;
    notificationBar.className = "alert alert-dismissible fade show alert-" + type;
    notificationBar.style.display = "block";
  }

  // Check payment status and display appropriate message
  if (paymentStatus === "failed") {
    showNotification("Payment failed.", "danger");
  } else if (paymentStatus === "canceled") {
    showNotification("Payment canceled.", "warning");
  } else if (paymentStatus === "success") {
    showNotification("Payment successful.", "success");
  }
