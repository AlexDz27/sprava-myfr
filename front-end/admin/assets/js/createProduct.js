// TODO: SORTABLE inside galImgs + currentOrder

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
  fetch('/admin-9kasu/api/create-product', {
    method: 'POST',
    body: formData
  })
  .then(r => r.json())
  .catch(err => {
    alert('Произошла ошибка чтения результатов операции. Свяжитесь с программистом Алексеем: тг - @rain_xxxx; телефон - +375298191624')
    throw err
  })
  .then(r => {
    submitBtn.disabled = false
    submitBtn.classList.remove('btn-edit--loading')
    submitBtn.innerText = 'Подтвердить создание'
    counter = 0
    clearInterval(intervalId)
    
    alert(r.text)
    location.reload()
    window.scrollTo(0, 0)
  })
}

const changeMainImgInput = document.getElementById('changeMainImg')
const changeMainImgHolder = document.getElementById('changeMainImgHolder')
changeMainImgInput.onchange = (e) => {
  const file = e.target.files[0]
  
  const reader = new FileReader();
  reader.onload = (event) => {
    console.log(changeMainImgHolder.querySelector('img'))
    changeMainImgHolder.querySelector('img')?.remove()
    changeMainImgHolder.style.minHeight = '530px';
    
    const img = document.createElement('img');
    img.src = event.target.result;
    changeMainImgHolder.appendChild(img);
  };
  reader.readAsDataURL(file);
}

const changeGalImgInput = document.getElementById('changeGalImg')
const changeGalImgHolder = document.getElementById('changeGalImgHolder')
changeGalImgInput.onchange = (e) => {
  changeGalImgHolder.innerHTML = ''
  const files = e.target.files
  if (files.length === 0) {
    changeGalImgHolder.textContent = 'Пока что картинок нет';
    return;
  }  
  
  for (let i = 0; i < files.length; i++) {
    const file = files[i];
    
    // Only process image files
    if (!file.type.match('image.*')) {
      continue;
    }

    const reader = new FileReader();
    
    reader.onload = function(e) {
      // Create image element for preview 
      const img = document.createElement('img');
      img.src = e.target.result;
      img.className = 'gallery__item';
      img.title = file.name;
      
      // Add image to preview container
      changeGalImgHolder.appendChild(img);
    }
    
    // Read the image file as a data URL
    reader.readAsDataURL(file);
  }
}

document.querySelectorAll('.gallery__item__x').forEach(x => {
  x.onclick = () => {
    if (confirm('Удалить эту картинку?')) {
      x.parentElement.remove()
      currentOrder = getCurrentOrder()
    }
  }
})
