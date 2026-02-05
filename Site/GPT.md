###### Bootstrap CDN

<!-- Bootstrap 5 CSS (CDN) -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">



###### Button no bootstrap

<button class="btn btn-primary">Clique aqui</button>

###### 

###### Sitemas de grid do bootstrap

O grid do Bootstrap funciona com base em 12 colunas. Você usa linhas (.row) para organizar colunas (.col).



###### Estrutura básica: 

<div class="container">

&nbsp; <div class="row">

&nbsp;   <div class="col">Coluna 1</div>

&nbsp;   <div class="col">Coluna 2</div>

&nbsp;   <div class="col">Coluna 3</div>

&nbsp; </div>

</div>



###### Controlando o tamanho das colunas

<div class="container">

&nbsp; <div class="row">

&nbsp;   <div class="col-4">Ocupa 4/12</div>

&nbsp;   <div class="col-8">Ocupa 8/12</div>

&nbsp; </div>

</div>



###### Tamanho e layout responsivo:

<div class="row">

&nbsp; <div class="col-sm-6 col-md-4 col-lg-3">Coluna Responsiva</div>

</div>



col-sm-\*: a partir de 576px (celular na horizontal)



col-md-\*: a partir de 768px (tablet)



col-lg-\*: a partir de 992px (desktop)



col-xl-\*: a partir de 1200px (telas grandes)





| Item           | Descrição                                                                           |

| -------------- | ----------------------------------------------------------------------------------- |

| \*\*Container\*\*  | Envolve o conteúdo e centraliza com padding. (`.container`)                         |

| \*\*Row\*\*        | Cria uma linha horizontal para colunas. (`.row`)                                    |

| \*\*Col\*\*        | Divide o espaço dentro da linha. Pode ter até 12 por linha. (`.col`, `col-6`, etc.) |

| \*\*Responsivo\*\* | Use `col-sm-\*`, `col-md-\*`, etc. para diferentes tamanhos de tela                   |





###### Explicando os principais elementos:

| Elemento                    | Função                                                             |

| --------------------------- | ------------------------------------------------------------------ |

| `.navbar`                   | Cria o menu no topo (navbar escura com links à direita)            |

| `.container-fluid` + `.row` | Cria uma linha de 12 colunas ocupando toda a largura               |

| `.col-md-3`                 | Menu lateral ocupa 3 colunas (em telas médias e maiores)           |

| `.col-md-9`                 | Conteúdo principal ocupa o restante (9 colunas)                    |

| `d-md-block` e `collapse`   | Permite que o menu lateral se esconda em telas pequenas (opcional) |





###### ✅ Em telas grandes:



O menu lateral ocupa 3/12 (25%) da largura da tela.



O menu do topo ocupa 9/12 (75%) e fica ao lado direito da sidebar.



O conteúdo fica abaixo do menu do topo, também à direita da sidebar.



###### ✅ Em telas pequenas (mobile):



O menu lateral se transforma em um menu oculto, acessado por um botão (como um offcanvas drawer).



O menu principal (navbar) ocupa toda a largura no topo.



O conteúdo principal ocupa 100% da largura abaixo do topo.





##### Código com responsividade:

<!DOCTYPE html>

<html lang="pt-br">

<head>

&nbsp; <meta charset="UTF-8">

&nbsp; <title>Layout Responsivo com Bootstrap</title>

&nbsp; <meta name="viewport" content="width=device-width, initial-scale=1">

&nbsp; <!-- Bootstrap CSS -->

&nbsp; <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

&nbsp; <style>

&nbsp;   @media (min-width: 768px) {

&nbsp;     .sidebar-desktop {

&nbsp;       position: fixed;

&nbsp;       top: 0;

&nbsp;       left: 0;

&nbsp;       width: 25%;

&nbsp;       height: 100vh;

&nbsp;       background-color: #f8f9fa;

&nbsp;       padding: 1rem;

&nbsp;       overflow-y: auto;

&nbsp;     }



&nbsp;     .main-area {

&nbsp;       margin-left: 25%; /\* espaço para o menu lateral \*/

&nbsp;       width: 75%;

&nbsp;     }

&nbsp;   }

&nbsp; </style>

</head>

<body>



&nbsp; <!-- MENU LATERAL - MODO OFFCANVAS PARA MOBILE -->

&nbsp; <div class="offcanvas offcanvas-start" tabindex="-1" id="menuLateralMobile">

&nbsp;   <div class="offcanvas-header">

&nbsp;     <h5 class="offcanvas-title">Menu Lateral</h5>

&nbsp;     <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>

&nbsp;   </div>

&nbsp;   <div class="offcanvas-body">

&nbsp;     <ul class="nav flex-column">

&nbsp;       <li class="nav-item">

&nbsp;         <a class="nav-link active" href="#">Dashboard</a>

&nbsp;       </li>

&nbsp;       <li class="nav-item">

&nbsp;         <a class="nav-link" href="#">Usuários</a>

&nbsp;       </li>

&nbsp;       <li class="nav-item">

&nbsp;         <a class="nav-link" href="#">Configurações</a>

&nbsp;       </li>

&nbsp;     </ul>

&nbsp;   </div>

&nbsp; </div>



&nbsp; <!-- MENU LATERAL - FIXO EM TELAS MAIORES -->

&nbsp; <div class="sidebar-desktop d-none d-md-block">

&nbsp;   <h5>Menu Lateral</h5>

&nbsp;   <ul class="nav flex-column">

&nbsp;     <li class="nav-item">

&nbsp;       <a class="nav-link active" href="#">Dashboard</a>

&nbsp;     </li>

&nbsp;     <li class="nav-item">

&nbsp;       <a class="nav-link" href="#">Usuários</a>

&nbsp;     </li>

&nbsp;     <li class="nav-item">

&nbsp;       <a class="nav-link" href="#">Configurações</a>

&nbsp;     </li>

&nbsp;   </ul>

&nbsp; </div>



&nbsp; <!-- ÁREA PRINCIPAL (TOPO + CONTEÚDO) -->

&nbsp; <div class="main-area">



&nbsp;   <!-- MENU PRINCIPAL (TOPO) -->

&nbsp;   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

&nbsp;     <div class="container-fluid">

&nbsp;       <!-- BOTÃO DO MENU LATERAL (aparece só no mobile) -->

&nbsp;       <button class="btn btn-outline-light d-md-none me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#menuLateralMobile">

&nbsp;         ☰

&nbsp;       </button>



&nbsp;       <a class="navbar-brand" href="#">Minha Aplicação</a>



&nbsp;       <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarConteudo">

&nbsp;         <span class="navbar-toggler-icon"></span>

&nbsp;       </button>



&nbsp;       <div class="collapse navbar-collapse" id="navbarConteudo">

&nbsp;         <ul class="navbar-nav ms-auto">

&nbsp;           <li class="nav-item">

&nbsp;             <a class="nav-link" href="#">Perfil</a>

&nbsp;           </li>

&nbsp;           <li class="nav-item">

&nbsp;             <a class="nav-link" href="#">Sair</a>

&nbsp;           </li>

&nbsp;         </ul>

&nbsp;       </div>

&nbsp;     </div>

&nbsp;   </nav>



&nbsp;   <!-- CONTEÚDO PRINCIPAL -->

&nbsp;   <main class="container-fluid py-4">

&nbsp;     <h2>Bem-vindo!</h2>

&nbsp;     <p>Este é o conteúdo principal. Em dispositivos móveis, o menu lateral vira um menu deslizante (offcanvas).</p>

&nbsp;   </main>



&nbsp; </div>



&nbsp; <!-- Bootstrap JS -->

&nbsp; <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>



###### O que foi adicionado para a responsividade:

| Recurso                     | Descrição                                                           |

| --------------------------- | ------------------------------------------------------------------- |

| `offcanvas`                 | Um menu lateral deslizante para dispositivos móveis                 |

| `d-none d-md-block`         | Esconde a sidebar em telas menores que 768px                        |

| `btn d-md-none`             | Exibe o botão de abrir menu só no mobile                            |

| `@media (min-width: 768px)` | CSS para tornar o menu fixo e lateral só em telas médias ou maiores |



##### ✅ O que é um colapso no Bootstrap?



O collapse é um recurso que permite mostrar/esconder conteúdos com uma animação suave.



###### 🚀 Como funciona tecnicamente?



O Bootstrap usa JavaScript + CSS classes para controlar a visibilidade de um elemento:



O conteúdo que será colapsado precisa da classe collapse.



Um botão/link precisa ter atributos data-bs-toggle="collapse" e data-bs-target="#id-do-elemento" para controlar o colapso.

###### 

###### ✅ Exemplo básico de colapso com botão



<!-- Botão que ativa o colapso -->

<button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#conteudoCollapse">

&nbsp; Mostrar/Esconder Conteúdo

</button>



<!-- Conteúdo que será mostrado/ocultado -->

<div class="collapse mt-2" id="conteudoCollapse">

&nbsp; <div class="card card-body">

&nbsp;   Este conteúdo aparece e desaparece com animação!

&nbsp; </div>

</div>



###### Resultado:



Ao clicar no botão, o conteúdo aparece/desaparece com animação vertical suave.



O Bootstrap adiciona e remove classes como .show, controlando altura e visibilidade com transições CSS.



###### ✅ Exemplo com vários colapsos (acordeão)

###### 

###### Você pode ter vários itens que se expandem individualmente:



<div class="accordion" id="accordionExemplo">



&nbsp; <!-- Item 1 -->

&nbsp; <div class="accordion-item">

&nbsp;   <h2 class="accordion-header" id="heading1">

&nbsp;     <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true">

&nbsp;       Item 1

&nbsp;     </button>

&nbsp;   </h2>

&nbsp;   <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#accordionExemplo">

&nbsp;     <div class="accordion-body">

&nbsp;       Conteúdo do item 1.

&nbsp;     </div>

&nbsp;   </div>

&nbsp; </div>



&nbsp; <!-- Item 2 -->

&nbsp; <div class="accordion-item">

&nbsp;   <h2 class="accordion-header" id="heading2">

&nbsp;     <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false">

&nbsp;       Item 2

&nbsp;     </button>

&nbsp;   </h2>

&nbsp;   <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#accordionExemplo">

&nbsp;     <div class="accordion-body">

&nbsp;       Conteúdo do item 2.

&nbsp;     </div>

&nbsp;   </div>

&nbsp; </div>



</div>





###### O que faz funcionar:



data-bs-toggle="collapse" ativa o efeito.



data-bs-target="#ID" define o que será mostrado.



collapse é a classe base do conteúdo.



show indica que o conteúdo está visível.



data-bs-parent em um acordeão fecha os outros quando um é aberto.



###### Dicas adicionais:

| Atributo                    | Descrição                                                      |

| --------------------------- | -------------------------------------------------------------- |

| `data-bs-toggle="collapse"` | Define que o botão ou link controla um colapso                 |

| `data-bs-target="#id"`      | Define o ID do elemento a ser colapsado                        |

| `.collapse`                 | Classe que aplica o comportamento de colapso                   |

| `.show`                     | Classe adicionada automaticamente quando o colapso está aberto |

| `.accordion`                | Componente completo com colapsos interdependentes              |







