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
    let tdData_lancamento = document.createElement('td');
    tdData_lancamento.innerHTML = filme.data_lancamento;
    let tdDescricao = document.createElement('td');
    tdDescricao.innerHTML = filme.descricao;
    let tdCategoria = document.createElement('td');
    tdCategoria.innerHTML = filme.categoria;
    let tdAlterar = document.createElement('td');
    let btnAlterar = document.createElement('button');

    btnAlterar.classList.add('btn', 'waves-effect', 'waves-light', 'black');
    let iconAlterar = document.createElement('i');
    iconAlterar.classList.add('material-icons');
    iconAlterar.innerHTML = 'edit';
    btnAlterar.appendChild(iconAlterar);
    btnAlterar.addEventListener("click", buscaUsuario, false);
    btnAlterar.id_filme = filme.id_filme;
    tdAlterar.appendChild(btnAlterar);

    let tdExcluir = document.createElement('td');
    let btnExcluir = document.createElement('button');

    btnExcluir.classList.add('btn', 'waves-effect', 'waves-light', 'black');
    let iconExcluir = document.createElement('i');
    iconExcluir.classList.add('material-icons');
    iconExcluir.innerHTML = 'delete';
    btnExcluir.appendChild(iconExcluir);
    btnExcluir.addEventListener("click", excluir, false);
    btnExcluir.id_filme = filme.id_filme;
    tdExcluir.appendChild(btnExcluir);
    tr.appendChild(tdId);
    tr.appendChild(tdNome);
    tr.appendChild(tdDuracao);
    tr.appendChild(tdData_lancamento);
    tr.appendChild(tdDescricao);
    tr.appendChild(tdCategoria);
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
            tr.children[2].innerHTML = filme.duracao;
            tr.children[3].innerHTML = filme.data_lancamento;
            tr.children[4].innerHTML = filme.descricao;
            tr.children[5].innerHTML = filme.categoria;
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
        .then(usuario => preencheForm(usuario))
        .catch(error => console.log(error));
}

function preencheForm(filme) {
    let inputIDUsuario = document.getElementsByName("id_filme")[0];
    inputIDUsuario.value = filme.id_filme;
    let inputNome = document.getElementsByName("nome")[0];
    inputNome.value = filme.nome
    let inputDuracao = document.getElementsByName("duracao")[0];
    inputDuracao.value = filme.duracao;
    let inputData = document.getElementsByName("data_lancamento")[0];
    inputData.value = filme.data;
    let inputDescricao = document.getElementsByName("descricao")[0];
    inputDescricao.value = filme.descricao;
    let inputCategoria = document.getElementsByName("categoria")[0];
    inputCategoria.value = filme.categoria

}

function salvarUsuario(event) {
    event.preventDefault();

    // Obtém os valores dos inputs
    let inputIDFilme = document.getElementsByName("id_filme")[0];
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

    // Verifica se o ID do filme está vazio
    if (id_filme === "") {
        cadastrar(nome, duracao, data_lancamento, descricao, categoria);
    } else {
        alterar(id_filme, nome,duracao, data_lancamento, descricao, categoria);
    }

    // Limpa o formulário
    document.getElementsByTagName('form')[0].reset();
}

function cadastrar(nome, duracao, data_lancamento, descricao, categoria) {
    // Envia os dados JSON para o PHP
    fetch('insere.php', {
        method: 'POST',
        body: JSON.stringify({
            nome: nome,
            duracao: duracao,
            data_lancamento: data_lancamento,
            descricao: descricao,
            categoria: categoria
        }),
        headers: {
            'Content-Type': "application/json; charset=UTF-8"
        }
    })
    .then(response => response.json())
    .then(filme => {
        console.log(filme);  // Apenas para depurar, verifique se a resposta é correta
        inserirUsuario(filme);
    })
    .catch(error => console.log(error));
}

function alterar(id_filme,nome,data_lancamento,duracao,descricao,categoria) {
    fetch('alterar.php',
        {
            method: 'POST',
            body: JSON.stringify({
                id_filme: id_filme,
                nome: nome,
               data_lancamento: data_lancamento,
                duracao: duracao,
                descricao: descricao,
                categoria: categoria
            }),
            headers: { 'Content-Type': "application/json; charset=UTF-8" }
        }
    )
        .then(response => response.json())
        .then(usuario => alterarUsuario(usuario))
        .catch(error => console.log(error));
}