// Load search data if not already loaded
let products = null
let searchData = localStorage.getItem('search')
if (!searchData) {
  fetch('/search')
    .then(r => r.text())
    .then(r => {
      localStorage.setItem('search', r)
      searchData = JSON.parse(r)
      products = searchData.products
    })
} else {
  searchData = JSON.parse(searchData)
  products = searchData.products
}

// Use search data
/** SEARCH **/
const search = document.getElementById('search')
const searchInput = document.getElementById('searchInput')
const searchResults = document.getElementById('searchResults')
let timeoutId
searchInput.oninput = (e) => {
  const input = e.target.value
  searchResults.innerHTML = ''
  if (input === '') {
    searchResults.innerHTML = ''
    return
  }

  if (input.length <= 2) {
    clearTimeout(timeoutId)
    timeoutId = setTimeout(() => {
      products.forEach(p => {
        const split = p.name.split(',')
        const lastPart = split.pop()
        const glued = split.join(',')

        if (p.name.toLowerCase().includes(searchInput.value.toLowerCase())) {
          searchResults.innerHTML += `
            <a href="${p.slug}" class="search__results__item">
              <img class="search__results__item__img" src="${p.img}" width="35" height="35" alt="${p.name}">
              <span>${glued}, <span class="search__results__item__text--gray">${lastPart}</span></span>
            </a>
          `
        }
      })
    }, 500)
  } else {
    clearTimeout(timeoutId)
    products.forEach(p => {
      const split = p.name.split(',')
      const lastPart = split.pop()
      const glued = split.join(',')

      if (p.name.toLowerCase().includes(searchInput.value.toLowerCase())) {
        searchResults.innerHTML += `
          <a href="${p.uri}" class="search__results__item">
            <img class="search__results__item__img" src="${p.img}" width="35" height="35" alt="${p.name}">
            <span>${glued}, <span class="search__results__item__text--gray">${lastPart}</span></span>
          </a>
        `
      }
    })
  }

  search.classList.add('search--active')
}
searchInput.onfocus = () => {
  searchResults.innerHTML = ''
  if (searchInput.value === '') return

  products.forEach(p => {
    if (p.name.toLowerCase().includes(searchInput.value.toLowerCase())) {
      const split = p.name.split(',')
      const lastPart = split.pop()
      const glued = split.join(',')

      searchResults.innerHTML += `
        <a href="${p.uri}" class="search__results__item">
          <img class="search__results__item__img" src="${p.img}" width="35" height="35" alt="Кисть">
          <span>${glued}, <span class="search__results__item__text--gray">${lastPart}</span></span>
        </a>
      `
    }
  })

  search.classList.add('search--active')
}
window.addEventListener('click', (e) => {
  if (search.contains(e.target)) return
  search.classList.remove('search--active')
})

/** NAV MOBILE **/
let mode = 'show nav items'  // WARNING: This is important in the mobile search block of code
const btnNavMob = document.getElementById('btnNavMob')
const navMob = document.getElementById('navMob')
const btnNavCloseMob = document.getElementById('btnNavCloseMob')
btnNavMob.onclick = () => {
  navMob.classList.add('nav-mob--active')
}
btnNavCloseMob.onclick = () => {
  if (mode === 'hide nav items') {
    mode = mode === 'show nav items' ? 'hide nav items' : 'show nav items'
    navMobContCont.style.display = mode === 'show nav items' ? 'block' : 'none'
    searchMob.style.display = mode === 'show nav items' ? 'none' : 'inline-block'
    navMobContSearchResults.style.display = 'none'
  } else if (mode === 'show nav items') {
    navMob.classList.remove('nav-mob--active')
  }
}
window.addEventListener('click', (e) => {
  if (btnNavMob.contains(e.target) || navMob.contains(e.target)) return
  navMob.classList.remove('nav-mob--active')
})

const btnNavMobSearch = document.getElementById('btnNavMobSearch')
const navMobCont = document.getElementById('navMobCont')
const navMobContCont = document.getElementById('navMobContCont')
const navMobContSearchResults = document.getElementById('navMobContSearchResults')
const navMobContSearchResultsReal = document.getElementById('searchResultsMob')
const searchMob = document.getElementById('searchMob')
const searchInputMob = document.getElementById('searchInputMob')
btnNavMobSearch.onclick = () => {
  mode = mode === 'show nav items' ? 'hide nav items' : 'show nav items'
  navMobContCont.style.display = mode === 'show nav items' ? 'block' : 'none'
  searchMob.style.display = mode === 'show nav items' ? 'none' : 'inline-block'

  searchInputMob.focus()
  if (searchInputMob.value) {
    navMobContSearchResults.style.display = 'block'
  }
}
searchInputMob.oninput = (e) => {
  const input = e.target.value
  navMobContSearchResultsReal.innerHTML = ''

  if (input === '') navMobContSearchResults.style.display = 'none'
  else navMobContSearchResults.style.display = 'block'

  if (input.length <= 2) {
    clearTimeout(timeoutId)
    timeoutId = setTimeout(() => {
      products.forEach(p => {
        if (p.name.toLowerCase().includes(input.toLowerCase())) {
          const split = p.name.split(',')
          const lastPart = split.pop()
          const glued = split.join(',')

          navMobContSearchResultsReal.innerHTML += `
            <a href="${p.uri}" class="search__results__item">
              <img class="search__results__item__img" src="${p.img}" width="35" height="35" alt="${p.name}">
              <span>${glued}, <span class="search__results__item__text--gray">${lastPart}</span></span>
            </a>
          `
        }
      })
    }, 850)
  } else {
    clearTimeout(timeoutId)
    products.forEach(p => {
      if (p.name.toLowerCase().includes(input.toLowerCase())) {
        const split = p.name.split(',')
        const lastPart = split.pop()
        const glued = split.join(',')

        navMobContSearchResultsReal.innerHTML += `
          <a href="${p.uri}" class="search__results__item">
            <img class="search__results__item__img" src="${p.img}" width="35" height="35" alt="${p.name}">
            <span>${glued}, <span class="search__results__item__text--gray">${lastPart}</span></span>
          </a>
        `
      }
    })
  }
}

/** ESCAPE: turn off modals **/
window.addEventListener('keydown', (e) => {
  if (e.key === 'Escape') {
    search.classList.remove('search--active')
    
    overlay.classList.remove('overlay--db')
    overlay.classList.remove('overlay--blur')
    nav.classList.remove('nav--db')
    nav.classList.remove('nav--active')
  }
})