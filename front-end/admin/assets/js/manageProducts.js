const categorySections = document.querySelectorAll('.js-category-section')
for (const catSec of categorySections) {
  catSec.querySelector('.js-category-name').onclick = () => {
    catSec.classList.toggle('mb-7-5rem')
    catSec.querySelector('.js-products-grid').classList.toggle('js-dn')
  }
}

const btnSprava = document.getElementById('SPRAVA')
const btnRoshma = document.getElementById('ROSHMA')
let currentCompany = 'SPRAVA'
const currentCompanyToCompanyName = {SPRAVA: 'SPRAVA', ROSHMA: 'Рошма'}
Array.from([btnSprava, btnRoshma]).forEach(i => {
  i.addEventListener('click', () => {
    currentCompany = i.id
    if (currentCompany === 'ROSHMA') {
      document.getElementById('spravaSection').style.display = 'none'
      document.getElementById('roshmaSection').style.display = 'block'
    } else if (currentCompany === 'SPRAVA') {
      document.getElementById('spravaSection').style.display = 'block'
      document.getElementById('roshmaSection').style.display = 'none'
    }

    document.querySelector('.table-switcher-pane__btn--active').classList.remove('table-switcher-pane__btn--active')
    i.classList.add('table-switcher-pane__btn--active')
  })
})