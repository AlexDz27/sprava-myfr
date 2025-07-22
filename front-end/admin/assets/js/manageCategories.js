const categories = document.querySelectorAll('.js-editable-datum')
for (const category of categories) {
  const editBtn = category.querySelector('.js-edit-btn')
  editBtn.onclick = () => {
    const categorySection = category.querySelector('.js-editable-datum__subsection')
    categorySection.classList.contains('js-dn') ? categorySection.classList.remove('js-dn') : categorySection.classList.add('js-dn')
  }
  category.querySelector('.js-category-name').onclick = editBtn.onclick

  const hideBtn = category.querySelector('.js-hide-btn')
  hideBtn.onclick = () => {
    confirm('Вы уверены, что хотите скрыть эту категорию с сайта?')
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

  submitBtn.disabled = true

  const formData = new FormData(form)
  fetch('/admin-9kasu/api/manage-categories', {
    method: 'POST',
    body: formData
  })
  .then(r => r.json())  // TODO: catch here on line 48
  .then(r => {
    alert(r.text)

    submitBtn.disabled = false
  })
}