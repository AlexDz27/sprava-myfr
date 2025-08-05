const categories = document.querySelectorAll('.js-editable-entity')
for (const category of categories) {
  const editBtn = category.querySelector('.js-edit-btn')
  editBtn.onclick = () => {
    const categorySection = category.querySelector('.js-editable-entity__subsection')
    categorySection.classList.contains('js-dn') ? categorySection.classList.remove('js-dn') : categorySection.classList.add('js-dn')
  }
  category.querySelector('.js-category-name').onclick = editBtn.onclick
  
  const idInput = document.querySelector('input[name=id]')
  const hideBtn = category.querySelector('.js-hide-btn')
  if (hideBtn) hideBtn.onclick = () => {
    if (confirm('Вы уверены, что хотите скрыть эту категорию с сайта?')) {
      fetch('/admin-9kasu/api/manage-categories', {
        method: 'POST',
        body: JSON.stringify({justHidden: true, id: idInput.value, hidden: 1})
      })
      .then(r => r.json())
      .catch(err => {
        alert('Произошла ошибка чтения результатов операции. Свяжитесь с программистом Алексеем: тг - @rain_xxxx; телефон - +375298191624')
        throw err
      })
      .then(r => {
        alert(r.text)
        location.reload()
      })
    }
  }
  const unhideBtn = document.querySelector('.js-unhide-btn')
  if (unhideBtn) unhideBtn.onclick = () => {
    if (confirm('Вы уверены, что хотите вернуть эту категорию на сайт?')) {
      fetch('/admin-9kasu/api/manage-categories', {
        method: 'POST',
        body: JSON.stringify({justHidden: true, id: idInput.value, hidden: 0})
      })
      .then(r => r.json())
      .catch(err => {
        alert('Произошла ошибка чтения результатов операции. Свяжитесь с программистом Алексеем: тг - @rain_xxxx; телефон - +375298191624')
        throw err
      })
      .then(r => {
        alert(r.text)
        location.reload()
      })
    }
  }
  const deleteBtn = category.querySelector('.js-delete-btn')
  deleteBtn.onclick = () => {
    if (confirm('Вы уверены, что хотите удалить этоу категорию? Она больше не будет показываться на сайте и в админ. панели. Но её можно будет восстановить, если понадобится.')) {
      fetch('/admin-9kasu/api/manage-categories', {
        method: 'POST',
        body: JSON.stringify({justDelete: true, id: idInput.value, is_deleted: 1})
      })
      .then(r => r.json())
      .catch(err => {
        alert('Произошла ошибка чтения результатов операции. Свяжитесь с программистом Алексеем: тг - @rain_xxxx; телефон - +375298191624')
        throw err
      })
      .then(r => {
        alert(r.text)
        location.reload()
      })
    }
  }
}

// main img upload
const changeCatImgInput = document.getElementById('changeCatImg')
const changeCatImgHolder = document.getElementById('changeCatImgHolder')
changeCatImgInput.onchange = (e) => {
  const file = e.target.files[0]
  
  const reader = new FileReader();
  reader.onload = (event) => {
    console.log(changeCatImgHolder.querySelector('img'))
    changeCatImgHolder.querySelector('img')?.remove()
    
    const img = document.createElement('img');
    img.src = event.target.result;
    changeCatImgHolder.appendChild(img);
  };
  reader.readAsDataURL(file);
}

const form = document.querySelector('form')
const submitBtn = document.querySelector('button[type=submit]')

form.onsubmit = (e) => {
  e.preventDefault()
  
  const payload = []
  for (const cat of categories) {
    const id = Number(cat.dataset.id)
    const entity = {
      id: id,
      name: cat.querySelector('input[name="name"]').value,
      name_tech: cat.querySelector('input[name="name_tech"]').value,
      hidden: Number(cat.querySelector(`input[name="hide-${id}"]:checked`).value),
      description: cat.querySelector('textarea[name="description"]').value,
    }
    if (cat.querySelector('input[name="img"]').value) {
      entity.img = 'app/Data/downloaded-imgs/' + getLastPathSegment(cat.querySelector('input[name="img"]').value)
      entity.imgBase64 = cat.querySelector('#changeCatImgHolder').querySelector('img').src
    }
    payload.push(entity)
  }
  
  submitBtn.disabled = true
  
  fetch('/admin-9kasu/api/manage-categories', {
    method: 'POST',
    body: JSON.stringify(payload)
  })
  .then(r => r.json())
  .catch(err => {
    alert('Произошла ошибка чтения результатов операции. Свяжитесь с программистом Алексеем: тг - @rain_xxxx; телефон - +375298191624')
    throw err
  })
  .then(r => {
    alert(r.text)
    
    submitBtn.disabled = false
    
    location.reload()
    window.scrollTo(0, 0)
  })
}


function getLastPathSegment(path) {
  // Handle both forward and backward slashes
  const segments = path.split(/[\\/]/);
  
  // Filter out empty segments (in case of trailing slashes)
  const nonEmptySegments = segments.filter(segment => segment.trim() !== '');
  
  // Return the last segment
  return nonEmptySegments.pop() || '';
}