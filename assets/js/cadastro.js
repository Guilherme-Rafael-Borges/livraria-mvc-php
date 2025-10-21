// Função de validação do formulário
function validarFormulario() {
    const nome = document.getElementById("nome").value;
    const email = document.getElementById("email").value;
    const secret = document.getElementById("secret").value;
    const senha = document.getElementById("senha").value;
   
    // Verificação se os campos estão preenchidos corretamente
    if (!nome || !email || !secret || !senha) {
      alert("Por favor, preencha todos os campos!");
      return false;
    }
  
    // Validação do e-mail
    const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!emailRegex.test(email)) {
      alert("Por favor, insira um e-mail válido!");
      return false;
    }
  
    // Validação da senha (mínimo de 6 caracteres)
    if (senha.length < 6) {
      alert("A senha deve ter pelo menos 6 caracteres.");
      return false;
    }
  
    // Se tudo estiver ok, o formulário é enviado
    alert("Cadastro realizado com sucesso!");
    return true;  // Para enviar o formulário
  }
  