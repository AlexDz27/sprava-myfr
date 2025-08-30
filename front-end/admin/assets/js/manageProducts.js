const categorySections = document.querySelectorAll('.js-category-section')
for (const catSec of categorySections) {
  catSec.querySelector('.js-category-name').onclick = () => {
    catSec.classList.toggle('mb-7-5rem')
    catSec.querySelector('.js-products-grid').classList.toggle('js-dn')
  }
}

// commented bc roshma not needed appararently
// const btnSprava = document.getElementById('SPRAVA')
// const btnRoshma = document.getElementById('ROSHMA')
// let currentCompany = 'SPRAVA'
// const currentCompanyToCompanyName = {SPRAVA: 'SPRAVA', ROSHMA: 'Рошма'}
// Array.from([btnSprava, btnRoshma]).forEach(i => {
//   i.addEventListener('click', () => {
//     currentCompany = i.id
//     if (currentCompany === 'ROSHMA') {
//       document.getElementById('spravaSection').style.display = 'none'
//       document.getElementById('roshmaSection').style.display = 'block'
//     } else if (currentCompany === 'SPRAVA') {
//       document.getElementById('spravaSection').style.display = 'block'
//       document.getElementById('roshmaSection').style.display = 'none'
//     }

//     document.querySelector('.table-switcher-pane__btn--active').classList.remove('table-switcher-pane__btn--active')
//     i.classList.add('table-switcher-pane__btn--active')
//   })
// })

/** SORTABLE JS FOR ORDER_ID **/
const orderSubmitBtn = document.getElementById('orderSubmitBtn')
const jsProductsGrids = document.querySelectorAll('.js-products-grid')
let orderIds = []
for (const jsProductsGrid of jsProductsGrids) {
  new Sortable(jsProductsGrid, {
    animation: 150,
    onEnd: (e) => {
      orderSubmitBtn.disabled = false

      const ps = Array.from(document.querySelectorAll('#spravaSection .products-grid__product'))
      orderIds = ps.map((p, idx) => {
        const obj = {[Number(p.dataset.id)]: idx + 1}
        return obj
      })
      console.log(orderIds)
    }
  })
}
orderSubmitBtn.onclick = () => {
  console.log(orderIds)
  fetch('/admin-9kasu/api/manage-products', {
    method: 'POST',
    body: JSON.stringify(orderIds)
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