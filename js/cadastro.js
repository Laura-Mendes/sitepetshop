document.addEventListener('DOMContentLoaded', function () {
    const loginTab = document.getElementById('login-tab');
    const registerTab = document.getElementById('register-tab');
    const loginForm = document.getElementById('login-form');
    const registerForm = document.getElementById('register-form');
    const registerButton = registerForm.querySelector('.submit-button');
    const passwordInput = document.getElementById('register-password');
    const confirmPasswordInput = document.getElementById('confirm-password');
    const errorMessage = document.createElement('p');  // Mensagem de erro
    errorMessage.style.color = 'red';
    errorMessage.style.display = 'none';  // Começa oculta
    registerForm.appendChild(errorMessage);  // Adiciona ao final do formulário

    // Exibir o formulário de login por padrão
    loginForm.classList.add('active');
    loginTab.classList.add('active');

    // Alterna para a aba de login
    loginTab.addEventListener('click', function () {
        loginForm.classList.add('active');
        registerForm.classList.remove('active');
        loginTab.classList.add('active');
        registerTab.classList.remove('active');
        errorMessage.style.display = 'none'; // Esconde a mensagem ao mudar de aba
    });

    // Alterna para a aba de cadastro
    registerTab.addEventListener('click', function () {
        registerForm.classList.add('active');
        loginForm.classList.remove('active');
        registerTab.classList.add('active');
        loginTab.classList.remove('active');
        errorMessage.style.display = 'none'; // Esconde a mensagem ao mudar de aba
    });

    // Verificar se as senhas são iguais antes de enviar o formulário de cadastro
    registerButton.addEventListener('click', function (event) {
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;

        // Se as senhas forem diferentes, exibe a mensagem de erro
        if (password !== confirmPassword) {
            event.preventDefault();  // Impede o envio do formulário
            errorMessage.textContent = 'As senhas não são iguais. Por favor, tente novamente.';
            errorMessage.style.display = 'block';
        } else {
            errorMessage.style.display = 'none';  // Se estiverem corretas, esconde a mensagem
        }
    });
});