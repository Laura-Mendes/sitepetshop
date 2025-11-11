let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("Slides");
  let dots = document.getElementsByClassName("dot");

  // Esconder todos os slides e remover a classe ativa de todos os pontos
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].classList.remove("active");
  }

  // Incrementar o slideIndex e fazer o loop se necessário
  slideIndex++;
  if (slideIndex > slides.length) { slideIndex = 1 }

  // Mostrar o slide atual e adicionar a classe ativa ao ponto correspondente
  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].classList.add("active");

  // Mudar o slide a cada 2 segundos
  setTimeout(showSlides, 2000);
}


// carrinho

document.addEventListener('DOMContentLoaded', function () {
  const cartIconWrapper = document.querySelector('.cart-link');
  const cartDropdown = document.querySelector('.cart-dropdown');
  const cartItemsContainer = document.querySelector('.cart-items');
  const cartCount = document.querySelector('.cart-count');
  const subtotalDisplay = document.querySelector('.cart-subtotal p strong');
  const finalizePurchaseButton = document.querySelector('.finalizar-compra');

  let isCartVisible = false; // Estado de visibilidade do carrinho
  let products = JSON.parse(localStorage.getItem('cart_' + usuarioLogado)) || []; // Carregar produtos do localStorage (caso existam)

  // Mostrar ou esconder o carrinho
  if (cartIconWrapper) {
    cartIconWrapper.addEventListener('click', function () {
      isCartVisible = !isCartVisible;
      if (cartDropdown) {
        cartDropdown.style.display = isCartVisible ? 'block' : 'none';
      }
    });
  }

  // Esconder o carrinho ao clicar fora dele
  document.addEventListener('click', function (event) {
    if (!cartIconWrapper.contains(event.target) && !cartDropdown.contains(event.target)) {
      isCartVisible = false;
      if (cartDropdown) cartDropdown.style.display = 'none';
    }
  });

  // Atualizar carrinho
function updateCart() {
  cartItemsContainer.innerHTML = ''; // Limpa a lista de itens do carrinho
  let subtotal = 0;
  let totalItems = 0;

  products.forEach(product => {
    if (product.quantity > 0) {
      subtotal += product.quantity * product.price; // Calcula o subtotal baseado na quantidade e no preço
      totalItems += product.quantity; // Conta o total de itens no carrinho

      const itemHTML = `
        <div class="cart-item">
          <img src="${product.image}" alt="${product.name}">
          <div class="product-details">
            <p>${product.name}</p>
            <p>R$ ${product.price.toFixed(2).replace('.', ',')}</p>
          </div>
          <div class="quantity-controls">
            <button class="quantity-btn" data-action="decrease" data-name="${product.name}">-</button>
            <input type="text" class="quantity-input" value="${product.quantity}" readonly>
            <button class="quantity-btn" data-action="increase" data-name="${product.name}">+</button>
          </div>
        </div>`;
      cartItemsContainer.insertAdjacentHTML('beforeend', itemHTML);
    }
  });

  cartCount.textContent = totalItems; // Atualiza a quantidade total de itens
  subtotalDisplay.textContent = `R$ ${subtotal.toFixed(2).replace('.', ',')}`; // Exibe o subtotal

  // Salvar carrinho no localStorage usando o e-mail do usuário
  localStorage.setItem('cart_' + usuarioLogado, JSON.stringify(products)); // Atualiza o localStorage
}

  // Ajustar quantidade
  cartItemsContainer.addEventListener('click', function (event) {
    if (event.target.classList.contains('quantity-btn')) {
      const action = event.target.dataset.action;
      const name = event.target.dataset.name;

      const product = products.find(p => p.name === name);
      if (product) {
        if (action === 'increase') {
          product.quantity++;
        } else if (action === 'decrease' && product.quantity > 0) {
          product.quantity--;
        }
      }

      updateCart();
    }
  });

// Adicionar produto ao carrinho
function addToCart(product) {
  const existingProduct = products.find(p => p.name === product.name);
  if (existingProduct) {
    existingProduct.quantity += product.quantity; // Aumenta a quantidade do produto já existente
  } else {
    products.push(product); // Se o produto não existir, adiciona ao carrinho
  }
  updateCart(); // Atualiza o carrinho
}

// Botões de compra
document.querySelectorAll('.add-to-cart').forEach(button => {
  button.addEventListener('click', function () {
    const productId = this.dataset.id; // Obtém o ID do produto
    const productPrice = parseFloat(this.dataset.price); // Obtém o preço do produto
    const productName = this.parentElement.querySelector('h5').textContent; // Obtém o nome do produto, por exemplo
    const productImage = this.parentElement.querySelector('img').src; // Obtém a imagem do produto

    // Adiciona o produto ao carrinho
    addToCart({ 
      id: productId, 
      name: productName, 
      price: productPrice, 
      quantity: 1, 
      image: productImage 
    });
  });
});


// Finalizar compra
if (finalizePurchaseButton) {
  finalizePurchaseButton.addEventListener('click', function () {
    if (products.length > 0) {
      // Envia os dados do carrinho para o servidor
      const data = {
        produtos: JSON.stringify(products) // Envia os produtos do carrinho como JSON
      };

      fetch('salvar_pedido.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams(data)
      })
      .then(response => response.text())
      .then(result => {
        alert(result);
        products = []; // Limpar o carrinho após a compra
        updateCart();
      })
      .catch(error => {
        console.error('Erro:', error);
        alert('Ocorreu um erro ao finalizar a compra.');
      });
    } else {
      alert('Carrinho vazio. Adicione produtos ao carrinho.');
    }
  });
}

  // Inicializar o carrinho
  updateCart();
});

function changeImage(imageSrc) {
  // Obtém a imagem principal e troca o src
  document.getElementById('current-image').src = imageSrc;
}