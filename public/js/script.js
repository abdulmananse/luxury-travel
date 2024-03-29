// paginacija
// const cardsPerPage = 9;
// const cardsContainer = document.querySelector('.properties-card');
// const cards = Array.from(cardsContainer.querySelectorAll('.card-info'));
// const pagination = document.querySelector('.pagination');
// const prevBtn = document.querySelector('.prev-btn');
// const nextBtn = document.querySelector('.next-btn');
let currentPage = 1;

function showCards(page) {
  // const start = (page - 1) * cardsPerPage;
  // const end = start + cardsPerPage;
  // cards.forEach((card, index) => {
  //   if (index >= start && index < end) {
  //     card.style.display = 'block';
  //   } else {
  //     card.style.display = 'none';
  //   }

  // });
}

function showPageNumbers() {
  // const totalPages = Math.ceil(cards.length / cardsPerPage);
  // pagination.innerHTML = '';
  // for (let i = 1; i <= totalPages; i++) {
  //   const page = document.createElement('span');
  //   page.textContent = i;
  //   if (i === currentPage) {
  //     page.classList.add('current-page');
  //   }
  //   pagination.appendChild(page);
  // }
}

// prevBtn.addEventListener('click', () => {
//   if (currentPage > 1) {
//     currentPage--;
//     showCards(currentPage);
//     showPageNumbers();
//   }

//   if (currentPage == 1) {
//     prevBtn.style.color = '#fff8f0';
//     nextBtn.style.color = '#0b3841';

//   }else{
//     prevBtn.style.color = '#0b3841';
//     nextBtn.style.color = '#0b3841';
//   }
// });

// nextBtn.addEventListener('click', () => {
//   if (currentPage < Math.ceil(cards.length / cardsPerPage)) {
//     currentPage++;
//     showCards(currentPage);
//     showPageNumbers();

//     if (currentPage == Math.ceil(cards.length / cardsPerPage)) {
//       nextBtn.style.color = '#fff8f0';
//       prevBtn.style.color = '#0b3841';

//     }else{
//       nextBtn.style.color = '#0b3841';
//       prevBtn.style.color = '#0b3841';
//     }

//   }
// });

// pagination.addEventListener('click', (event) => {
//   if (event.target.tagName === 'SPAN') {
//     currentPage = parseInt(event.target.textContent);
//     showCards(currentPage);
//     showPageNumbers();


//     if (currentPage == Math.ceil(cards.length / cardsPerPage)) {
//       nextBtn.style.color = '#fff8f0';
//       prevBtn.style.color = '#0b3841';

//     }

//     if (currentPage == 1) {
//       prevBtn.style.color = '#fff8f0';
//       nextBtn.style.color = '#0b3841';

//     }

//   }
// });
;

showCards(currentPage);
showPageNumbers();


const propertyFilter = document.querySelector('.property-filter');
const showFilter = document.querySelector('.show-filter');
const topArrow = document.querySelector('.arrow-filter');

showFilter.addEventListener('click', () => {
  propertyFilter.classList.toggle('active');
  topArrow.classList.toggle('active');
})


const downloads = document.querySelectorAll('.download');
const requests = document.querySelectorAll('.request');

const downloadCard = document.querySelectorAll('.download-card-open');
const downloadCardsRequest = document.querySelectorAll('.download-card-request-open');

let downloadOpen = '';
let secondElement = '';

for(const download of downloads) {
  download.addEventListener('click', () => {
    const downloadFirstParent = download.parentNode;
    downloadOpen = downloadFirstParent.nextElementSibling;
    downloadOpen.classList.add('active');
  })
}

for(const requst of requests) {
  requst.addEventListener('click', () => {
    const firstElement = requst.parentElement.nextElementSibling;
    secondElement = firstElement.nextElementSibling;
    secondElement.classList.add('active');

  })
}



const arrowsBackDownloads = document.querySelectorAll('.arrow-back-download');
const arrowsBackRequests = document.querySelectorAll('.arrow-back-request');


for(const arrowsBackDownload of arrowsBackDownloads) {
  arrowsBackDownload.addEventListener('click', () => {

    parentDown = arrowsBackDownload.parentElement;
    parentDown.classList.remove('active');
  })
}

for(const arrowsBackRequest of arrowsBackRequests) {
  arrowsBackRequest.addEventListener('click', () => {

    parentReq = arrowsBackRequest.parentElement;
    parentReq.classList.remove('active');
  })
}

const dropdowns = document.querySelectorAll('.dropdown-open');
const selected = document.querySelectorAll('.select-destionation');

for(const select of selected){
  select.addEventListener('click', (event) => {
    const dropOpen = select.nextElementSibling;
    event.stopPropagation();
    dropOpen.classList.toggle('active');
  })
}

const guestsOpen = document.querySelector('.guests-open');

guestsOpen.addEventListener('click', function(event) {
  event.stopPropagation();
});

for(const dropdown of dropdowns){
  document.addEventListener('click', function(event) {
    if (!guestsOpen.contains(event.target) && dropdown.classList.contains('active')) {
      dropdown.classList.remove('active');
    }
  });
}

const priceInput = document.getElementById('price');

priceInput.addEventListener('input', function() {
  const price = priceInput.value;
});



const copyButton = document.querySelectorAll('.ical-link button');
const inputText = document.querySelectorAll('.ical-link input');

for(const copy of copyButton){

  copy.addEventListener('click', function() {

    const prevElementInput = copy.previousElementSibling;
    if (navigator.clipboard && window.isSecureContext) {
        navigator.clipboard.writeText(prevElementInput.value)
    }else{
        // Use the 'out of viewport hidden text area' trick
        const textArea = document.createElement("textarea");
        textArea.value = prevElementInput.value;

        // Move textarea out of the viewport so it's not visible
        textArea.style.position = "absolute";
        textArea.style.left = "-999999px";

        document.body.prepend(textArea);
        textArea.select();

        try {
            document.execCommand('copy');
        } catch (error) {
            console.error(error);
        } finally {
            textArea.remove();
        }
    }
    // .then(() => {
    //   alert('Copied to clipboard!');
    // })
    // .catch(err => {
    //   console.error('Copy failed: ', err);
    // });

  });

}


const priceRange = $('.price-range');
const valueDrop = $('.budget-value-drop');
const priceSlider = document.querySelector('#price');

priceSlider.addEventListener('click', function () {
  valueDrop.addClass('color');
})

priceSlider.addEventListener('mousemove', function() {

  const position = (priceSlider.value - priceSlider.min) / (priceSlider.max - priceSlider.min);
  const rangeWidth = priceSlider.offsetWidth - 14;

  const thumbPosition = position * rangeWidth;
  priceSlider.style.setProperty('--thumb-position', `${thumbPosition}px`);

  const maxValue = parseInt(priceSlider.max);
  const currentValue = parseInt(priceSlider.value);
  const step = parseInt(priceSlider.step);

  const maxRangeValue = Math.min(maxValue, currentValue + step * 2);

  if(maxRangeValue == '100000'){

    priceRange.text(`$ ${maxRangeValue}+`);
    valueDrop.text(`$ ${maxRangeValue}+`);

    //priceRange.textContent = `$ ${maxRangeValue}+`;
    //valueDrop.textContent = `$ ${maxRangeValue}+`;

  }else{
    priceRange.text(`$ ${maxRangeValue}`);
    valueDrop.text(`$ ${maxRangeValue}`);

    // priceRange.textContent = `$ ${maxRangeValue}`;
    // valueDrop.textContent = `$ ${maxRangeValue}`;
  }
});

priceSlider.addEventListener('touchmove', function() {

  const position = (priceSlider.value - priceSlider.min) / (priceSlider.max - priceSlider.min);
  const rangeWidth = priceSlider.offsetWidth - 14;

  const thumbPosition = position * rangeWidth;
  priceSlider.style.setProperty('--thumb-position', `${thumbPosition}px`);

  const maxValue = parseInt(priceSlider.max);
  const currentValue = parseInt(priceSlider.value);
  const step = parseInt(priceSlider.step);

  const maxRangeValue = Math.min(maxValue, currentValue + step * 2);

  if(maxRangeValue == '100000'){

    priceRange.text(`$ ${maxRangeValue}+`);
    valueDrop.text(`$ ${maxRangeValue}+`);

    //priceRange.textContent = `$ ${maxRangeValue}+`;
    //valueDrop.textContent = `$ ${maxRangeValue}+`;

  }else{
    priceRange.text(`$ ${maxRangeValue}`);
    valueDrop.text(`$ ${maxRangeValue}`);

    // priceRange.textContent = `$ ${maxRangeValue}`;
    // valueDrop.textContent = `$ ${maxRangeValue}`;
  }
});

const slides = document.querySelector('.properties-slides');
const prevSlideButton = document.querySelectorAll('.prev');
const nextSlideButton = document.querySelectorAll('.next');
const slideWidth = slides.clientWidth;
const numberOfSlides = slides.children.length;

for(const prev of prevSlideButton){
  prev.addEventListener('click', () => {
    const arrowLeft = prev.parentElement;
    const slide = arrowLeft.nextElementSibling;

    const currentScrollPosition = slide.scrollLeft;
    const slideWidth = slide.clientWidth;
    const numberOfSlides = slide.children.length;

    let nextScrollPosition = currentScrollPosition - slideWidth;

    if (nextScrollPosition < 0) {
      const firstSlide = slide.children[0];
      const firstSlideRect = firstSlide.getBoundingClientRect();
      nextScrollPosition = slideWidth * (numberOfSlides - 1) + currentScrollPosition - firstSlideRect.left;
      slide.scrollTo({
        left: nextScrollPosition,
        behavior: 'auto'
      });
      setTimeout(() => {
        nextScrollPosition = slideWidth * (numberOfSlides - 1);
        slide.scrollTo({
          left: nextScrollPosition,
          behavior: 'auto'
        });
      }, 0);
    } else {
      slide.scrollTo({
        left: nextScrollPosition,
        behavior: 'smooth'
      });
    }
  });
}

for(const next of nextSlideButton){

  next.addEventListener('click', () => {
    const arrowNext = next.parentElement;
    const shadow = arrowNext.previousElementSibling;
    const slide = shadow.previousElementSibling;

    const currentScrollPosition = slide.scrollLeft;
    const slideWidth = slide.clientWidth;
    const numberOfSlides = slide.children.length;

    let nextScrollPosition = currentScrollPosition + slideWidth;

    if (nextScrollPosition >= slideWidth * (numberOfSlides)) {
      nextScrollPosition = 0;
      slide.scrollTo({ left: nextScrollPosition, behavior: 'auto' });
      // setTimeout(() => {
      //   slides.scrollTo({ left: slideWidth, behavior: 'smooth' });
      // }, 0);
    }

    slide.scrollTo({
      left: nextScrollPosition,
      behavior: 'smooth'
    });
  });
}





const pricesOneDisplay = document.querySelectorAll('.all-price-one');
const pricesTwoDisplay = document.querySelectorAll('.all-price-two');

const openPrices = document.querySelectorAll('.open-price-all');

const closePrices = document.querySelectorAll('.close-price');

for(const gues of openPrices){
  gues.addEventListener('click', function(){
    gues.nextElementSibling.classList.add('open')
  })
}

for(const closePrice of closePrices){
  closePrice.addEventListener('click', function(){
    closePrice.parentElement.classList.remove('open');
  })
}

const cardsTitle = document.querySelectorAll('.card-content h4');

for(const cardTitle of cardsTitle){
  if (cardTitle.innerHTML.length >= 25) {
    let substringInnerHTML = cardTitle.innerHTML.substring(0, 24);
    cardTitle.innerHTML = substringInnerHTML + '...';
  }
}



