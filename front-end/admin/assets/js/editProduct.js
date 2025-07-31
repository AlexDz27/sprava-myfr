const currentGalleryImgsEl = document.getElementById('currentGalleryImgs')
let currentOrder = getCurrentOrder()
let selectedGalImgs = []

// TODO: actual form handling

const changeMainImgInput = document.getElementById('changeMainImg')
const changeMainImgHolder = document.getElementById('changeMainImgHolder')
changeMainImgInput.onchange = (e) => {
  const file = e.target.files[0]
  
  const reader = new FileReader();
  reader.onload = (event) => {
    console.log(changeMainImgHolder.querySelector('img'))
    changeMainImgHolder.querySelector('img')?.remove()
    
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

    selectedGalImgs.push(file)
    console.log(selectedGalImgs)
    
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

/** SORTABLE JS FOR GALLERY IMGS ON THE LEFT **/
new Sortable(currentGalleryImgsEl, {
  animation: 150,
  onEnd: (e) => {
    currentOrder = getCurrentOrder()
  }
})


function getCurrentOrder() {
  const arr = []
  Array.from(currentGalleryImgsEl.children).forEach(c => {
    const img = c.querySelector('img')
    arr.push(img.getAttribute('src'))
  })
  return arr
}