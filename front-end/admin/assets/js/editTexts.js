const form = document.querySelector('form')
const submitBtn = document.querySelector('button[type=submit]')

form.onsubmit = (e) => {
  e.preventDefault()

  submitBtn.disabled = true

  const formData = new FormData(form)
  fetch('/admin-9kasu/api/edit-texts', {
    method: 'POST',
    body: formData
  })
  .then(r => r.json())
  .then(r => {
    alert(r.text)

    submitBtn.disabled = false
  })
}