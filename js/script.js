document.addEventListener("DOMContentLoaded", () => {
    listarTodos();
});

function listarTodos() {
    fetch("listar.php",
        {
            method: "GET",
            headers: { 'Content-Type': "application/json; charset=UTF-8" }
        }
    )
        .then(response => response.json())
        .then(filmes => inserirUsuarios(filmes))
        .catch(error => console.log(error));
}

function inserirUsuarios(filmes) {
    for (const filme of filmes) {
        inserirUsuario(filme);
    }
}

function inserirUsuario(filme) {
    let tbody = document.getElementById('filmes');
    let tr = document.createElement('tr');
    let tdId = document.createElement('td');
    tdId.innerHTML = filme.id_filme;
    let tdNome = document.createElement('td');
    tdNome.innerHTML = filme.nome;
    let tdDuracao = document.createElement('td');
    tdDuracao.innerHTML = filme.duracao;
    let tdAlterar = document.createElement('td');
    let btnAlterar = document.createElement('button');
    btnAlterar.innerHTML = "Alterar";
    btnAlterar.addEventListener("click", buscaUsuario, false);
    btnAlterar.id_filme = filme.id_filme;
    tdAlterar.appendChild(btnAlterar);
    let tdExcluir = document.createElement('td');
    let btnExcluir = document.createElement('button');
    btnExcluir.addEventListener("click", excluir, false);
    btnExcluir.id_filme = filme.id_filme;
    btnExcluir.innerHTML = "Excluir";
    tdExcluir.appendChild(btnExcluir);
    tr.appendChild(tdId);
    tr.appendChild(tdNome);
    tr.appendChild(tdEmail);
    tr.appendChild(tdAlterar);
    tr.appendChild(tdExcluir);
    tbody.appendChild(tr);
}

function excluir(evt) {
    let id_filme = evt.currentTarget.id_filme;
    let excluir = confirm("Você tem certeza que deseja excluir este usuário?");
    if (excluir == true) {
        fetch('excluir.php?id_filme=' + id_filme,
            {
                method: "GET",
                headers: { 'Content-Type': "application/json; charset=UTF-8" }
            }
        )
            .then(response => response.json())
            .then(retorno => excluirUsuario(retorno, id_filme))
            .catch(error => console.log(error));
    }
}

function excluirUsuario(retorno, id_filme) {
    if (retorno == true) {
        let tbody = document.getElementById('filmes');
        for (const tr of tbody.children) {
            if (tr.children[0].innerHTML == id_filme) {
                tbody.removeChild(tr);
            }
        }
    }
}

function alterarUsuario(filme) {
    let tbody = document.getElementById('filmes');
    for (const tr of tbody.children) {
        if (tr.children[0].innerHTML == filme.id_filme) {
            tr.children[1].innerHTML = filme.nome;
            tr.children[2].innerHTML = filme.email;
        }
    }
}

function buscaUsuario(evt) {
    let id_filme = evt.currentTarget.id_filme;
    fetch('buscaUsuario.php?id_filme=' + id_filme,
        {
            method: "GET",
            headers: { 'Content-Type': "application/json; charset=UTF-8" }
        }
    )
        .then(response => response.json())
        .then(filme => preencheForm(filme))
        .catch(error => console.log(error));
}

function preencheForm(filme) {
    let inputIDUsuario = document.getElementsByName("id_filme")[0];
    inputIDUsuario.value = filme.id_filme;
    let inputNome = document.getElementsByName("nome")[0];
    inputNome.value = filme.nome
    let inputEmail = document.getElementsByName("email")[0];
    inputEmail.value = filme.email;
}

function salvarUsuario(event) {
    // parar o comportamento padrão do form
    event.preventDefault();
    // obtém o input id_filme
    let inputIDFilme = document.getElementsByName("id_filme")[0];
    // pega o valor do input id_filme
    let id_filme = inputIDFilme.value;

    let inputNome = document.getElementsByName("nome")[0];
    let nome = inputNome.value;
    let inputDuracao = document.getElementsByName("duracao")[0];
    let duracao = inputDuracao.value;
    let inputData = document.getElementsByName("data_lancamento")[0];
    let data_lancamento = inputData.value;
    let inputDescricao = document.getElementsByName("descricao")[0];
    let descricao = inputDescricao.value;
    let inputCategoria = document.getElementsByName("categoria")[0];
    let categoria = inputCategoria.value;

    if (id_filme == "") {
        cadastrar(id_filme, nome, duracao, data_lancamento, descricao, categoria);
    } else {
        alterar(id_filme, nome, email, senha);
    }
    document.getElementsByTagName('form')[0].reset();
}

function cadastrar(id_filme, nome, duracao, data_lancamento, descricao, categoria) {
    fetch('insere.php',
        {
            method: 'POST',
            body: JSON.stringify({
                id_filme: id_filme,
                nome: nome,
                duracao: duracao,
                data_lancamento: data_lancamento,
                descricao: descricao,
                categoria: categoria
            }),
            headers: { 'Content-Type': "application/json; charset=UTF-8" }
        }
    )
        .then(response => response.json())
        .then(filme => inserirUsuario(filme))
        .catch(error => console.log(error));
}

function alterar(id_filme, nome, email, senha) {
    fetch('alterar.php',
        {
            method: 'POST',
            body: JSON.stringify({
                id_filme: id_filme,
                nome: nome,
                email: email,
                senha: senha
            }),
            headers: { 'Content-Type': "application/json; charset=UTF-8" }
        }
    )
        .then(response => response.json())
        .then(filme => alterarUsuario(filme))
        .catch(error => console.log(error));
}