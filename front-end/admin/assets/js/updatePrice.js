const form = document.querySelector('form')
const submitBtn = document.querySelector('button[type=submit]')

form.onsubmit = (e) => {
  e.preventDefault()

  submitBtn.disabled = true
  submitBtn.classList.add('btn--admin--loading')
  submitBtn.innerText = 'Загрузка'
  let counter = 0
  const intervalId = setInterval(() => {
    if (counter === 0) {
      submitBtn.innerText = 'Загрузка'
    } else if (counter === 1) {
      submitBtn.innerText = 'Загрузка.'
    } else if (counter === 2) {
      submitBtn.innerText = 'Загрузка..'
    } else if (counter === 3) {
      submitBtn.innerText = 'Загрузка...'
      counter = -1
    }

    counter++
  }, 400)

  const formData = new FormData(form)
  fetch('/admin-9kasu/api/update-price', {
    method: 'POST',
    body: formData
  })
  .then(r => r.json())
  .catch(err => {
    alert('Произошла ошибка чтения результатов операции. Свяжитесь с программистом Алексеем: тг - @rain_xxxx; телефон - +375298191624')

    submitBtn.disabled = false
    submitBtn.classList.remove('btn-load--loading')
    submitBtn.innerText = '2. Обновить прайс-лист на сайте'
    counter = 0
    clearInterval(intervalId)

    throw err
  })
  .then(r => {
    alert(r.text)

    submitBtn.disabled = false
    submitBtn.classList.remove('btn-load--loading')
    submitBtn.innerText = '2. Обновить прайс-лист на сайте'
    counter = 0
    clearInterval(intervalId)
  })
}