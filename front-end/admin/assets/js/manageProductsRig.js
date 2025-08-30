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
    // alert(r.text)
    // location.reload()
  })
}