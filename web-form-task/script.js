function toggleStatus(id) {
  fetch('toggle.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded'
    },
    body: 'id=' + id
  })
  .then(response => response.json())
  .then(data => {
    
    document.getElementById('status-' + id).textContent = data.new_status;
  });
}