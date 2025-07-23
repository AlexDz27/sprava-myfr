class Slider {
  constructor(trackId) {
    this.track = document.getElementById(trackId)
    this.btnsPrev = document.querySelectorAll('.js__btn-slider-prev')
    this.btnsNext = document.querySelectorAll('.js__btn-slider-next')
    this.dotsConts = document.querySelectorAll('.js__slider-dots')
    this.dotsArr = Array.from(this.dotsConts).map(cont => {
      return cont.children
    })

    this._currentSlideIdx = 0

    this.init()
  }

  init() {
    this.track.style.transform = `translate3d(0, 0, 0)`

    this.btnsPrev.forEach(b => {
      b.onclick = () => {
        this.currentSlideIdx--
      }
    })

    this.btnsNext.forEach(b => {
      b.onclick = () => {
        this.currentSlideIdx++
      }
    })

    this.dotsArr.forEach(dots => {
      Array.from(dots).forEach((dot, i) => {
        dot.onclick = () => {
          this.currentSlideIdx = i
        }
      })
    })
  }

  get currentSlideIdx() {
    return this._currentSlideIdx
  }
  set currentSlideIdx(val) {
    this._currentSlideIdx = val

    if (this._currentSlideIdx > 0) this.track.style.transform = `translate3d(calc(-${this._currentSlideIdx * 100}% - ${this._currentSlideIdx * 5}px), 0, 0)`
    else this.track.style.transform = `translate3d(0, 0, 0)`
    smoothScrollTo(document.getElementById('qs').offsetTop - 30, 800)
  }
}

let slider = new Slider('track')
window.addEventListener('changeOfCat', () => {
  slider = new Slider('track')
})