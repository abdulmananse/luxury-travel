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

for(const request of requests) {
  request.addEventListener('click', () => {
    const firstElement = request.parentElement.nextElementSibling;
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
// for(const dropdown of dropdowns){
//   document.addEventListener('click', function(event) {
//     if (dropdown.classList.contains('active')) {
//       dropdown.classList.remove('active');
//     }
//   });
// }
for(const dropdown of dropdowns){
  document.addEventListener('click', function(event) {
    const dropdownTrigger = dropdown.querySelector('.dropdown-trigger');
    const selectDestResult = document.querySelector('.select-destionation');
    const guestsApplay = document.querySelector('.guests-applay');
    const budgetApplayButton = document.querySelector('.budget-applay-button');
    

    if (event.target === dropdown || dropdown.contains(event.target) || event.target === dropdownTrigger) {
      // selectDestResult.textContent = `${event.target.textContent}`;
      // if (dropdown.classList.contains('active')) {
      //   console.log('zatvaranje dropdown-a na izbor elementa')
      //   dropdown.classList.remove('active');
      // }
      return;
    }

    if(event.target === guestsApplay){
      const parentGuest = event.target.parentElement;
      parentGuest.parentElement.classList.remove('active');
    }
    if(event.target === budgetApplayButton){
      const paretBudget = event.target.parentElement;
      paretBudget.parentElement.classList.remove('active');
    }
    if (dropdown.classList.contains('active')) {
      dropdown.classList.remove('active');
    }
  });
}

// $(document).on("click", function(event) {
//   // If the clicked element is not a child of the dropdown, close the dropdown
//   if (!$(event.target).closest(".dropdown-open").length) {
//     $(".dropdown-open").hide();
//   }
// });

// document.addEventListener('click', function () {
//   let clientBudget = document.getElementById('budget');
//   clientBudget.style.display = 'none';
// })

// let clientBudget = document.getElementsByClassName('budget')[0];
// console.log(clientBudget)
// let guests = document.getElementsByClassName('guests-open')[0];
// console.log(guests)

// function openBudget() {
//   clientBudget.style.display = 'flex';
// }

// function closeBudget() {
//   if (clientBudget.style.display === 'flex') {
//     clientBudget.style.display = 'none';
//     clientBudget.classList.remove('active');
//   } else {
//     clientBudget.classList.add('active');
//   }
// }

// function openGuests() {
//   guests.style.display = 'flex';
// }

// function closeGuests() {
//   if (guests.style.display === 'flex') {
//     guests.style.display = 'none';
//     guests.classList.remove('active');
//   } else {
//     guests.classList.add('active');
//   }
// }

const priceInput = document.getElementById('price');

priceInput.addEventListener('input', function() {
  const price = priceInput.value;
});

let profilePicture = document.getElementsByClassName('profile-picture')[0];
let nextSiblingProfile = profilePicture.nextElementSibling;

if (nextSiblingProfile.innerHTML.length >= 25) {
  let substringInnerHTML = nextSiblingProfile.innerHTML.substring(0, 24);
  nextSiblingProfile.innerHTML = substringInnerHTML + '...';
}



const copyButton = document.querySelectorAll('.ical-link button');
const inputText = document.querySelectorAll('.ical-link input');


for(const copy of copyButton){

  copy.addEventListener('click', function() {

    const prevElementInput = copy.previousElementSibling;

      navigator.clipboard.writeText(prevElementInput.value) 
      // .then(() => {
      //   alert('Copied to clipboard!');  
      // })
      // .catch(err => {
      //   console.error('Copy failed: ', err);  
      // });

  });

}


const destionationName = document.querySelectorAll('.destination span');

for(const desName of destionationName){
  desName.addEventListener('click', function(){
    for(const desName of destionationName){
      desName.classList.remove('active');
    }
    desName.classList.add('active');
    const colorName = desName.parentElement.previousElementSibling;
    const colors = colorName.childNodes;

    colors[1].classList.add('color');
  })
}

const filtersSpan= document.querySelectorAll('.filters span');

for(const filter of filtersSpan) {
  filter.addEventListener('click', function() {
    for(const filter of filtersSpan) {
      filter.classList.remove('active');
    }
    filter.classList.add('active');
    
  })
}

const propertyType = document.querySelectorAll('.property-type span');

for(const type of propertyType){
  type.addEventListener('click', function(){
    for(const property of propertyType){
      property.classList.remove('active');
    }
    type.classList.add('active');
    const colorName = type.parentElement.previousElementSibling;
    const color = colorName.childNodes;

    color[1].classList.add('color');
  })
}

const bathrooms = document.querySelectorAll('.bathrooms span');

for(const bad of bathrooms){
  bad.addEventListener('click', function(){
    for(const badroom of bathrooms){
      badroom.classList.remove('active');
    }
    bad.classList.add('active');
    const colorName = bad.parentElement.previousElementSibling;
    const color = colorName.childNodes;

    color[1].classList.add('color');
  })
}

const destinations = document.querySelectorAll('.destinations span');

for(const destination of destinations) {
  destination.addEventListener('click', function() {
    for(const dest of destinations) {
      dest.classList.remove('active');
    }
    destination.classList.add('active');
    const colorName = destination.parentElement.previousElementSibling;
    const color = colorName.childNodes;

    color[1].classList.add('color');
  })
}

/* function for guests */

const guests = document.querySelectorAll('span.custom-option.select-guest-name');

for (const guest of guests) {
  guest.addEventListener('click', function() {
    for (const g of guests) {
      g.classList.remove('active');
    }
    guest.classList.add('active');
    const colorName = document.parentElement.previousElementSibling;
    const color = colorName.childNodes;

    color[1].classList.add('color');
  })
}

const priceRange = document.querySelector('.price-range');
const valueDrop = document.querySelectorAll('.value-drop')[2];
const priceSlider = document.querySelector('#price');

priceSlider.addEventListener('click', function () {
  valueDrop.classList.add('color');
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
    console.log('vise');
  
    priceRange.textContent = `$ ${maxRangeValue}+`;
    valueDrop.textContent = `$ ${maxRangeValue}+`;

  }else{
    priceRange.textContent = `$ ${maxRangeValue}`;
    valueDrop.textContent = `$ ${maxRangeValue}`;
  }





});

const datePicker = document.querySelector('#demo');
console.log(datePicker)

datePicker.addEventListener('click', function() {
  datePicker.classList.add('color');
})

const slides = document.querySelector('.properties-slides');
const nextSlideButton = document.querySelectorAll('.next');

for(const slideNext of nextSlideButton){

  slideNext.addEventListener('click', () => {
    const shadowRight = slideNext.parentElement.previousElementSibling;
    const slidesNext = shadowRight.previousElementSibling;

    const currentScrollPosition = slidesNext.scrollLeft;
    const slideWidth = slidesNext.clientWidth;
    const numberOfSlides = slidesNext.children.length;
  
    let nextScrollPosition = currentScrollPosition + slideWidth;
  
    if (nextScrollPosition >= slideWidth * numberOfSlides) {
      nextScrollPosition = 0;
    }
  
    slidesNext.scrollTo({
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
