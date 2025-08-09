// TODO: window.scroll to top (0, 0) добавить

const tableSprava = document.getElementById('tableSprava')
const tableRoshma = document.getElementById('tableRoshma')
const btnSprava = document.getElementById('SPRAVA')
const btnRoshma = document.getElementById('ROSHMA')

let currentCompany = 'SPRAVA'
const currentCompanyToCompanyName = {SPRAVA: 'SPRAVA', ROSHMA: 'Рошма'}
Array.from([btnSprava, btnRoshma]).forEach(i => {
  i.addEventListener('click', () => {
    currentCompany = i.id
    if (currentCompany === 'ROSHMA') {
      tableSprava.classList.add('table--hidden')
      tableRoshma.classList.remove('table--hidden')
    } else if (currentCompany === 'SPRAVA') {
      tableRoshma.classList.add('table--hidden')
      tableSprava.classList.remove('table--hidden')
    }

    document.querySelector('.table-switcher-pane__btn--active').classList.remove('table-switcher-pane__btn--active')
    i.classList.add('table-switcher-pane__btn--active')
  })
})