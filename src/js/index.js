const button = document.getElementById('dropdownButton');
const menu = document.getElementById('dropdownMenu');
const selected = document.getElementById('selectedOption');


const options = [
    { label: "Nova Tarefa", url: "../src/nova_tarefa.php" },
    { label: "Pendentes", url: "../src/index.php" },
    { label: "Todas Tarefas", url: "../src/todas_tarefas.php" }
];


let currentLabel = localStorage.getItem('selectedLabel') || "Todas Tarefas";
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



function edit(id, txt_tarefa) {
    let form = document.createElement('form')
    form.action = 'tarefa_controller.php?acao=atualizar'
    form.method = 'post'
    form.className = 'flex p-5'

    let inputTarefa = document.createElement('input')
    inputTarefa.type = 'text'
    inputTarefa.name = 'tarefa'
    inputTarefa.className = 'w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500'
    inputTarefa.value = txt_tarefa

    let inputId = document.createElement('input')
    inputId.type = 'hidden'
    inputId.name = 'id'
    inputId.value = id

    let button = document.createElement('button')
    button.type = 'submit'
    button.className = 'bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded'
    button.innerHTML = 'Atualizar'

    form.appendChild(inputTarefa)

    form.appendChild(inputId)

    form.appendChild(button)

    let tarefa = document.getElementById('tarefa_' + id)

    tarefa.innerHTML = "";

    tarefa.insertBefore(form, tarefa[0])

}

function remove(id) {
    location.href = 'todas_tarefas.php?acao=remove&id=' + id;
}

function marked(id) {
    location.href = 'todas_tarefas.php?acao=marked&id=' + id;
}