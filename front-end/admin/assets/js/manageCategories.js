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
    // TODO: доделать
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
    const datum = {
      id: id,
      name: cat.querySelector('input[name="name"]').value,
      name_tech: cat.querySelector('input[name="name_tech"]').value,
      hidden: Number(cat.querySelector(`input[name="hide-${id}"]:checked`).value),
      description: cat.querySelector('textarea[name="description"]').value,
    }
    if (cat.querySelector('input[name="img"]').value) {
      datum.img = 'app/Data/downloaded-imgs/' + getLastPathSegment(cat.querySelector('input[name="img"]').value)
      datum.imgBase64 = cat.querySelector('#changeCatImgHolder').querySelector('img').src
    }
    payload.push(datum)
  }

  submitBtn.disabled = true

  fetch('/admin-9kasu/api/manage-categories', {
    method: 'POST',
    body: JSON.stringify(payload)
  })
  .then(r => r.json())  // TODO: catch here on line 48
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