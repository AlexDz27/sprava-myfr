class Slider {
  constructor(trackId, btnPrevId, btnNextId, btnPrevMob, btnNextMob, dots) {
    this.track = document.getElementById(trackId)
    this.btnPrev = document.getElementById(btnPrevId)
    this.btnPrevMob = document.getElementById(btnPrevMob)
    this.btnNext = document.getElementById(btnNextId)
    this.btnNextMob = document.getElementById(btnNextMob)
    this.dotsCont = document.getElementById(dots)
    this.dots = this.dotsCont.children

    this.cards = this.track.children
    this.initCardsCount = this.cards.length

    this._windowPos = 0 // Notion of 'window' represents viewing window for the cards, e.g. [[1, 2, 3], 4, 5,], and it could be [[1, 2], 3, 4, 5] for mobile
    this.WINDOW_POS_MAX = this.initCardsCount - 3

    // FIXME: mb i can do the same as _windowPos kinda..
    this.changeSlideDistance = 407.5 // .slider__track's children grid-auto-columns + column-gap
    if (window.innerWidth <= 1365) {
      this.changeSlideDistance = 340.5
    }
    if (window.innerWidth <= 1168) {
      this.changeSlideDistance = 288.5
    }
    if (window.innerWidth <= 812) {
      this.changeSlideDistance = 229
    }
    if (window.innerWidth <= 670) {
      this.changeSlideDistance = 243
    }
    if (window.innerWidth <= 577) {
      this.changeSlideDistance = 235
    }
    if (window.innerWidth <= 540) {
      this.changeSlideDistance = 210
    }
    if (window.innerWidth <= 476) {
      this.changeSlideDistance = 166
    }
    window.addEventListener('resize', () => {
      this.changeSlideDistance = 407.5
      if (window.innerWidth <= 1365) {
        this.changeSlideDistance = 340.5
      }
      if (window.innerWidth <= 1168) {
        this.changeSlideDistance = 288.5
      }
      if (window.innerWidth <= 812) {
        this.changeSlideDistance = 229
      }
      if (window.innerWidth <= 670) {
        this.changeSlideDistance = 243
      }
      if (window.innerWidth <= 577) {
        this.changeSlideDistance = 235
      }
      if (window.innerWidth <= 540) {
        this.changeSlideDistance = 210
      }
      if (window.innerWidth <= 476) {
        this.changeSlideDistance = 166
      }
    })

    this.touchStartX = 0
    this.touchEndX = 0
    this._threshold = 50 // Minimum swipe distance to trigger slide change

    this.init()
  }

  init() {
    this.btnPrev.onclick = () => {
      this.slidePrev()
    }
    this.btnPrevMob.onclick = () => {
      this.slidePrev()
    }

    this.btnNext.onclick = () => {
      console.log(this.windowPos, this._windowPos)
      this.slideNext()
      this.btnNext.disabled = true // [1] hack to prevent going too much farther when clicking fast
    }
    this.btnNextMob.onclick = () => {
      this.slideNext()
      this.btnNextMob.disabled = true
    }

    // create dots based on count of slides and set event listeners
    for (let i = 4; i <= this.initCardsCount; i++) {
      this.dotsCont.insertAdjacentHTML('beforeend', '<span class="slider__dots__dot"></span>')
    }
    for (let i = 0; i < this.dots.length; i++) {
      const dot = this.dots[i]
      dot.onclick = () => {
        this.dotsCont.querySelector('.slider__dots__dot--active').classList.remove('slider__dots__dot--active')
        dot.classList.add('slider__dots__dot--active')

        this.slideToPos(i)
      }
    }

    this.track.addEventListener('transitionend', () => {
      this.btnNext.disabled = false // [2] hack to prevent going too much farher when clicking fast
      this.btnNextMob.disabled = false

      console.log(`trans: ${this.windowPos} === ${this.initCardsCount}`)
      if (this.windowPos === this.initCardsCount) {
        for (let i = 0; i < this.initCardsCount; i++) {
          this.track.firstElementChild.remove()
        }
        this.track.style.transition = 'none'
        this.track.style.transform = `translate3d(0px, 0, 0)`
        this.windowPos = 0

        void this.track.offsetWidth // force reflow. Without this, line below won't work
        this.track.style.transition = 'transform 400ms cubic-bezier(0.165, 0.84, 0.44, 1)'
      }
    })

    this.track.addEventListener('touchstart', (e) => {
      this.touchStartX = e.changedTouches[0].screenX
    }, {passive: true})
    this.track.addEventListener('touchend', (e) => {
      this.touchEndX = e.changedTouches[0].screenX
      this._handleSwipe()
    }, {passive: true})
  }

  slidePrev() {
    this.windowPos--
    this._slide(this.windowPos)
  }
  slideNext() {
    this.windowPos++
    this._slide(this.windowPos)
  }
  slideToPos(pos) {
    this.windowPos = pos
    this._slide(this.windowPos)
  }

  _slide(windowPos) {
    this.track.style.transform = `translate3d(-${this.changeSlideDistance * windowPos}px, 0, 0)`
  }

  _handleSwipe() {
    const difference = this.touchStartX - this.touchEndX;
    if (difference > this._threshold) {
      // Swipe left - go to next slide
      this.slideNext();
    } else if (difference < -this._threshold) {
      // Swipe right - go to previous slide
      this.slidePrev();
    }
  }

  get windowPos() {
    return this._windowPos
  }
  set windowPos(val) {
    this._windowPos = getNonNegative(val)

    if (this._windowPos > 0) {
      this.btnPrev.disabled = false
      this.btnPrevMob.disabled = false
      this.btnPrev.classList.remove('btn-slider--inactive')
      this.btnPrevMob.classList.remove('btn-slider--inactive')
    } else if (this._windowPos === 0) {
      this.btnPrev.disabled = true
      this.btnPrevMob.disabled = true
      this.btnPrev.classList.add('btn-slider--inactive')
      this.btnPrevMob.classList.add('btn-slider--inactive')
    }

    if (this.windowPos === this.WINDOW_POS_MAX) {
      console.log(this.track.children.length)
      if (this.track.children.length >= this.initCardsCount * 2) return  // fix bug: if clicking on last dot, unnecessary cards are created which then could make the slider lag
      const fragment = document.createDocumentFragment()
      for (const card of this.cards) {
        const clone = card.cloneNode(true)
        fragment.appendChild(clone)
      }
      this.track.appendChild(fragment)
    }

    // console.log(this.windowPos, this._windowPos)
    // This is for when clicking on arrows, and not on dots themselves
    let numberForDot = this.windowPos
    if (this.windowPos > this.WINDOW_POS_MAX) {
      numberForDot = this.initCardsCount - 3  // last dot element
    }
    const neededDot = this.dots[numberForDot]
    this.dotsCont.querySelector('.slider__dots__dot--active').classList.remove('slider__dots__dot--active')
    neededDot.classList.add('slider__dots__dot--active')
  }
}

const slider = new Slider('track', 'btnPrev', 'btnNext', 'btnPrevMob', 'btnNextMob', 'dots')

/* Utilities for Slider */
function getNonNegative(num) {
  return Math.max(0, num);
}
