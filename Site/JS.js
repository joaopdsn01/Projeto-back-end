

        //Modal do usuario
const button = document.getElementById('usuario');
const modal = document.getElementById('modal-usuario');

button.onclick = function() {
    modal.showModal();
};



      //Modal do altsenha
const altbutton = document.getElementById('altsenha');
const altmodal = document.getElementById('modal-altsenha');

altbutton.onclick = function(){
  altmodal.showModal();
};

//logoff
function sair(){
  window.location.href ='index.html';
};

//button voltar (master)
function voltarmaster(){
  window.location.href='painelmaster.html';
}




//Muda de Login para Cadastro
function mostrarCadastro() {
  document.getElementById("login-form").classList.remove("active");
  document.getElementById("cadastro-form").classList.add("active");
}
function mostrarLogin() {
  document.getElementById("cadastro-form").classList.remove("active");
  document.getElementById("login-form").classList.add("active");
}

//Confirmar a senha no cadastro
function validarSenha() {
    const senha = document.getElementById("senha").value;
    const confirma = document.getElementById("confirma_senha").value;

    if (senha !== confirma) {
      alert("As senhas não coincidem!");
      return false; // bloqueia o envio do formulário
    }
    return true; // libera o envio
  }

//Cadastro confirmado
  const params = new URLSearchParams(window.location.search);
  if(params.get("msg") === "sucesso"){
      alert("Usuário cadastrado com sucesso!");
  } else if(params.get("msg") === "erro"){
      alert("Erro ao cadastrar!");
  }



  
// Area do Modal de produtos


 // Espera o modal ser aberto
const modalProduto = document.getElementById('modalProduto');
modalProduto.addEventListener('show.bs.modal', event => {
  // Botão que acionou o modal
  const button = event.relatedTarget;

  // Pega os dados do botão
  const nome = button.getAttribute('data-nome');
  const preco = button.getAttribute('data-preco');
  const desc = button.getAttribute('data-desc');

  // Atualiza o conteúdo do modal
  const modalTitle = modalProduto.querySelector('.modal-title');
  const modalPreco = modalProduto.querySelector('#modalPreco');
  const modalDesc = modalProduto.querySelector('#modalDesc');

  modalTitle.textContent = nome;
  modalPreco.textContent = preco;
  modalDesc.textContent = desc;
});
