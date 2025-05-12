const button = document.getElementById('dropdownButton');
const menu = document.getElementById('dropdownMenu');
const selected = document.getElementById('selectedOption');

const options = [
    { label: "Nova Tarefa", url: "../src/nova_tarefa.php" },
    { label: "Pendentes", url: "../src/index.php" },
    { label: "Todas Tarefas", url: "../src/todas_tarefas.php" }
];


if (window.location.pathname.includes('login.php')) {
    localStorage.removeItem('selectedLabel'); 
}


let currentLabel = localStorage.getItem('selectedLabel') || "Nova Tarefa";


selected.textContent = currentLabel;

function renderMenu(excludeLabel) {
    menu.innerHTML = '';
    options.forEach(option => {
        if (option.label !== excludeLabel) {
            const a = document.createElement('a');
            a.className = "block px-4 py-2 hover:bg-gray-100 cursor-pointer";
            a.href = option.url;
            a.textContent = option.label;

            a.addEventListener('click', (e) => {
                e.preventDefault();
                // Salvar a seleção do filtro no localStorage
                localStorage.setItem('selectedLabel', option.label);
                selected.textContent = option.label;
                renderMenu(option.label);
                menu.classList.add('hidden');
                window.location.href = option.url;
            });

            menu.appendChild(a);
        }
    });
}

renderMenu(currentLabel);

button.addEventListener('click', () => {
    menu.classList.toggle('hidden');
});

document.addEventListener('click', (e) => {
    if (!button.contains(e.target) && !menu.contains(e.target)) {
        menu.classList.add('hidden');
    }
});

document.addEventListener('DOMContentLoaded', () => {
	const dropdown = document.getElementById('dropdown');
	const container = document.getElementById('user-dropdown');
	let hideTimeout;

	container.addEventListener('mouseenter', () => {
		clearTimeout(hideTimeout);
		dropdown.classList.remove('hidden');
	});

	container.addEventListener('mouseleave', () => {
		hideTimeout = setTimeout(() => {
			dropdown.classList.add('hidden');
		}, 100);
	});
});



document.querySelectorAll('.editar-btn').forEach(btn => {
    btn.addEventListener('click', function () {
        const tarefaId = btn.getAttribute('data-id');
        const tarefaDiv = document.getElementById(`tarefa_${tarefaId}`);
        const tituloTarefa = tarefaDiv.querySelector('.titulo_tarefa').innerText;
        const descricaoTarefa = tarefaDiv.querySelector('.descricao_tarefa').innerText;
        edit(tarefaId, tituloTarefa, descricaoTarefa);
    });
});


function edit(id, txt_titulo, txt_tarefa) {

    let form = document.createElement('form');
    form.action = 'tarefa_controller.php?acao=atualizar';
    form.method = 'post';
    form.className = 'flex p-5';

    let inputTitulo = document.createElement('input');
    inputTitulo.type = 'text';
    inputTitulo.name = 'titulo_tarefa';
    inputTitulo.className = 'w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500';
    inputTitulo.value = txt_titulo;

    let inputTarefa = document.createElement('input');
    inputTarefa.type = 'text';
    inputTarefa.name = 'tarefa';
    inputTarefa.className = 'w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500';
    inputTarefa.value = txt_tarefa;

    let inputId = document.createElement('input');
    inputId.type = 'hidden';
    inputId.name = 'id';
    inputId.value = id;

    let button = document.createElement('button');
    button.type = 'submit';
    button.className = 'bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded';
    button.innerHTML = 'Atualizar';

    form.appendChild(inputTitulo);
    form.appendChild(inputTarefa);
    form.appendChild(inputId);
    form.appendChild(button);

    let tarefa = document.getElementById('tarefa_' + id);
    tarefa.innerHTML = '';

    tarefa.appendChild(form);
}

document.querySelectorAll('.cancelar-edicao').forEach(btn => {
    btn.addEventListener('click', function () {
        const tarefaDiv = btn.closest('.tarefa');
        tarefaDiv.querySelector('.form-editar').classList.add('hidden');
        tarefaDiv.querySelector('.titulo_tarefa').classList.remove('hidden');
        tarefaDiv.querySelector('.descricao_tarefa').classList.remove('hidden');
    });
});

function remove(id) {
    window.location.href = 'tarefa_controller.php?acao=remove&id=' + id;
}

function marked(id) {
    window.location.href = 'tarefa_controller.php?acao=marked&id=' + id;
}



