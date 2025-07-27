var splide = new Splide( '.splide', {type: 'loop', height: '570px', classes: {
  pagination: 'splide__pagination slider__dots slider__dots--product'
}, breakpoints: {718: {height: '515px'}, 505: {height: '365px'}}} );
splide.on('pagination:mounted', (data) => {
  data.items.forEach(d => {
    d.button.classList.add('slider__dots__dot')
  })
})
splide.mount();
