document.getElementById('contactForm').addEventListener('submit', function (event) {
  event.preventDefault();
  const name = document.getElementById('name').value.trim();
  const email = document.getElementById('email').value.trim();
  const message = document.getElementById('message').value.trim();

  if (name && email && message) {
    document.getElementById('response').textContent = `Thanks, ${name}! Your message has been received.`;
    
    // Clear the form
    this.reset();
  } else {
    document.getElementById('response').textContent = 'Please fill in all fields.';
  }
});
