const categorySections = document.querySelectorAll('.js-category-section')
for (const catSec of categorySections) {
  catSec.querySelector('.js-category-name').onclick = () => {
    catSec.classList.toggle('mb-7-5rem')
    catSec.querySelector('.js-products-grid').classList.toggle('js-dn')
  }
}
