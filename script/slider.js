window.addEventListener('DOMContentLoaded', function(){
    const nextEl = document.getElementById("next");
    const previousEl = document.getElementById("previous");
    sliderEl = document.getElementById("slider");
    if (nextEl) {
        nextEl.addEventListener("click", onNextClick);
    }
    if (previousEl) {
        previousEl.addEventListener("click", onPreviousClick);
    }
    if (sliderEl) {
        imgWidth = sliderEl.offsetWidth;
    }
})

const loopAutoNext = (time) => {
  setTimeout(() => {
    onNextClick()
    loopAutoNext(8000)
  }, time);
}

loopAutoNext(8000)

function onNextClick() {
  
  sliderEl.scrollLeft += imgWidth;
  //return to beginning
  const sliderFullWidth = sliderEl.scrollWidth
  const lastSlide = sliderFullWidth - imgWidth
  if (lastSlide == sliderEl.scrollLeft) {
    sliderEl.scrollLeft = 0
  }
}

function onPreviousClick() {
  const imgWidth = sliderEl.offsetWidth;
  sliderEl.scrollLeft -= imgWidth;
}
