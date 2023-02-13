var player = new Playerjs({id:"player",poster:"/assets/img/poster/poster2.jpg", file:"/assets/video/krab.mp4"});


// burger
let burger = document.querySelector('.burger');
let navigationList = document.querySelector('.header__navigations-list');
let city = document.querySelector('.header__box-cities');
let phone = document.querySelector('.header__box-phones');

burger.addEventListener('click', function() {
    navigationList.classList.toggle('show-navigation');
    city.classList.toggle('show-city');
    phone.classList.toggle('show-phone');
});

// Modal city
let cityModal = document.getElementById("city-modal");
let btnCity = document.getElementById("open-modal");
let spanClose = document.getElementsByClassName("close-modal")[0];

btnCity.onclick = function() {
  cityModal.style.display = "block";
}

spanClose.onclick = function() {
  cityModal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == cityModal) {
    cityModal.style.display = "none";
  }
}

let cityItems = document.querySelectorAll('.city-item');
for(let i = 0; i < cityItems.length; i++) {
    cityItems[i].addEventListener('click', function(){
        let selectedCity = this.getAttribute('data-city');
        let phoneNumber = this.getAttribute('data-phone');
        let link = this.getAttribute('data-link');
        document.getElementById('selected-city').innerHTML = selectedCity;
        document.getElementById('phone-number').innerHTML = phoneNumber;
        document.querySelector('.header__city-link').setAttribute('href', link);
        document.querySelector('.header__phone-number').setAttribute('href', 'tel:' + phoneNumber.replace(/-/g, ''));
        cityModal.style.display = "none";
    });
}

// Modal feedback
let feedbackModal = document.getElementById("feedback-modal");
let feedbackBtn = document.getElementById("feedback-btn");
let closeBtnFeedback = document.getElementById("close-btn-feedback");

feedbackBtn.addEventListener("click", function() {
  feedbackModal.style.display = "block";
});

closeBtnFeedback.addEventListener("click", function() {
  feedbackModal.style.display = "none";
});

window.addEventListener("click", function(event) {
  if (event.target == feedbackModal) {
    feedbackModal.style.display = "none";
  }
});

function sendToServer(name, email, message) {

let feedbackForm = document.querySelector("#feedback-modal .modal-form");

feedbackForm.addEventListener("submit", function(event) {
    event.preventDefault();
    let name = this.elements.name.value;
    let phone = this.elements.phone.value;
    let data = new FormData(feedbackForm);
    data.append("name", name);
    data.append("phone", phone);
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "mail.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
            feedbackModal.style.display = "none";
        }
    };
    xhr.send(data);
});
}
// Modal feedback

// убирает значок в инпуте

let inputPhone = document.querySelector('.form-phone');
let inputEmail = document.querySelector('.form-email');

function togglePlaceholderAndIcon(input) {
  let inputIcon = input.nextElementSibling;
  input.addEventListener('focus', function() {
    this.placeholder = '';
    inputIcon.style.display = 'none';
  });
  input.addEventListener('blur', function() {
    if (this.id === 'phone') {
      this.placeholder = 'Номер телефона';
    } else {
      this.placeholder = 'E-mail';
    }
    inputIcon.style.display = 'block';
  });
}

togglePlaceholderAndIcon(inputPhone);
togglePlaceholderAndIcon(inputEmail);

// чекбокс
let checkbox = document.querySelector('.form-checkbox');
let label = document.querySelector('.calculation__label');
checkbox.addEventListener('change', function() {
  if (this.checked) {
    label.classList.add('checked');
  } else {
    label.classList.remove('checked');
  }
});

label.addEventListener('click', function() {
  checkbox.checked = !checkbox.checked;
  if (checkbox.checked) {
    label.classList.add('checked');
  } else {
    label.classList.remove('checked');
  }
});

// калькулятор карточек
const cards = document.querySelectorAll('.card');
cards.forEach(card => {
const input = card.querySelector('.card__set-number');
const price = card.querySelector('.card__price-meaning');
const button = card.querySelector('.card__btn');
const unitPrice = parseInt(price.textContent);
input.value = 1;
input.addEventListener('focus', (event) => {
event.target.value = '';
});
input.addEventListener('input', (event) => {
const value = event.target.value;
if (value && value >= 1 && value <= 999 && !isNaN(value)) {
price.textContent = value * unitPrice;
} else {
input.value = '';
price.textContent = unitPrice;
}
});
});


// consultation-modal
let consultationModal = document.getElementById("consultation-modal");
let consultationBtn = document.getElementById("consultation-btn");
consultationBtn.addEventListener("click", function() {
  consultationModal.style.display = "block";
});

let closeBtnConsultation = document.getElementById("close-btn-consultation");
closeBtnConsultation.addEventListener("click", function() {
  consultationModal.style.display = "none";
});

window.addEventListener("click", function(event) {
  if (event.target == consultationModal) {
    consultationModal.style.display = "none";
  }
});

function sendToServer(name, email, message) {

  let formConsultation = document.querySelector("#consultation-modal form");
  formConsultation.addEventListener("submit", function(event) {
    event.preventDefault(); 
    let name = document.getElementById("name").value;
    let phone = document.getElementById("phone").value;
    let email = document.getElementById("email").value;
    sendDataToServer(name, phone, email);
  });
  
  function sendDataToServer(name, phone, email) {
    let xhr = new XMLHttpRequest();
    let url = "mail.php";
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        console.log(xhr.responseText);
      }
    };
    let data = "name=" + name + "&phone=" + phone + "&email=" + email;
    xhr.send(data);
  }
// consultation-modal


// calculation-form
const form = document.querySelector('.calculation-form');
form.addEventListener('submit', function(e) {
  e.preventDefault();
  const phone = document.querySelector('.form-phone').value;
  const email = document.querySelector('.form-email').value;
  const terms = document.querySelector('.form-checkbox').checked;
  if (!phone || !email || !terms) {
    alert('Заполните все поля формы и примите условия передачи данных');
    return;
  }
  // Отправляем данные на сервер
  fetch('/send_form', {
    method: 'POST',
    body: JSON.stringify({ phone, email }),
    headers: { 'Content-Type': 'application/json' }
  })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        alert('Форма успешно отправлена');
      } else {
        alert('Произошла ошибка при отправке формы');
      }
    });
});


// calculation-form

  // форма покупки модалка
let cartItems = [];
const modal = document.getElementById("cart-modal");
const closeButton = document.getElementById("close-btn-cart");

orderButtons.forEach(button => {
    button.addEventListener("click", function() {
        const card = this.parentElement;
        const description = card.querySelector(".card__description").textContent;
        const quantity = card.querySelector(".card__set-number").value;
        const price = card.querySelector(".card__price-meaning").textContent;
        const item = {
            description: description,
            quantity: quantity,
            price: price
        };
        cartItems.push(item);
        modal.innerHTML = `
            <p>Product: ${item.description}</p>
            <p>Quantity: ${item.quantity}</p>
            <p>Price: ${item.price}</p>
        `;
        modal.style.display = "block";
    });
});

closeButton.addEventListener("click", function() {
    modal.style.display = "none";
});
}

let selectedCity = localStorage.getItem("selectedCity");
if (selectedCity) {
  let selectedCityItem = document.querySelector(`[data-city="${selectedCity}"]`);
  if (selectedCityItem) {
    document.querySelector(".header__city-name").textContent = selectedCity;
    document.querySelector(".header__city-link").setAttribute("href", selectedCityItem.dataset.link);
  }
}

// Save selected city to localStorage
document.querySelector("#city-modal").addEventListener("click", function(event) {
  if (event.target.classList.contains("city-item")) {
    let selectedCity = event.target.dataset.city;
    localStorage.setItem("selectedCity", selectedCity);
    document.querySelector(".header__city-name").textContent = selectedCity;
    document.querySelector(".header__city-link").setAttribute("href", event.target.dataset.link);
  }
});

let $cardsProduct = document.querySelectorAll('.card__btn')
$cardsProduct.forEach(element => {
  element.addEventListener('click', function(event) {
    let name = event.target.parentElement.querySelector('.card__description').innerText
    let amount = event.target.parentElement.querySelector('.card__set-number').value
    let price = event.target.parentElement.querySelector('.card__price-meaning').innerText

    let modal = document.getElementById('orderModal')
    modal.style.display = 'block'

    let productName = document.getElementById('productName')
    productName.innerText = name

    let productAmount = document.getElementById('productAmount')
    productAmount.innerText = amount

    let productPrice = document.getElementById('productPrice')
    productPrice.innerText = price

    let closeModal = modal.querySelector('.modal-close')
    closeModal.addEventListener('click', function() {
      modal.style.display = 'none'
    })

  })
})

// // скрытые формы

// $cardsProduct.forEach(element => {
//   element.addEventListener('click', function(event) {
//     // получаем данные из карточки
//     let name = event.target.parentElement.querySelector('.card__description').innerText
//     let amount = event.target.parentElement.querySelector('.card__set-number').value
//     let price = event.target.parentElement.querySelector('.card__price-meaning').innerText

//     // заполняем скрытые поля формы
//     let productName = document.getElementById('productName')
//     productName.value = name

//     let productAmount = document.getElementById('productAmount')
//     productAmount.value = amount

//     let productPrice = document.getElementById('productPrice')
//     productPrice.value = price
//   })
// })



// form.addEventListener('submit', function(event) {
//     event.preventDefault();
//     let formData = new FormData(form);
//     // добавляем данные из карточек в данные формы
//     formData.append("productName", document.getElementById("productName").value);
//     formData.append("productAmount", document.getElementById("productAmount").value);
//     formData.append("productPrice", document.getElementById("productPrice").value);
//     // отправляем данные
//     fetch('https://yourserver.com/submit-form', {
//         method: 'POST',
//         body: formData
//     })
//     .then(response => response.json())
//     .then(data => {
//         console.log(data);
//     });
// });

// document.querySelector('form').addEventListener('submit', (e) => {
//   e.preventDefault();
//   const productName = document.querySelector('#productName').innerText;
//   const productAmount = document.querySelector('#productAmount').innerText;
//   const productPrice = document.querySelector('#productPrice').innerText;
//   document.querySelector('input[name="productName"]').value = productName;
//   document.querySelector('input[name="productAmount"]').value = productAmount;
//   document.querySelector('input[name="productPrice"]').value = productPrice;
//   document.querySelector('form').submit();
// });