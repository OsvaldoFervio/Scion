const btnAddAward = document.getElementById('btn-add-award');
btnAddAward.onclick = createAwardItem

const btnAddStage = document.getElementById('btn-add-stage');
btnAddStage.onclick = createStageItem

function createAwardItem(event) {

    const awardContainer = document.getElementById('award-container');
    const containerElement = document.createElement('div');

    const index = awardContainer.children.length + 1;

    const inputName = createElement(
        'award-name', 'Nombre', 'input',
        'text', 'award_name[]', 'award-name-' + index)

    const inputAmount = createElement(
        'award-quantity', 'Cantidad', 'input',
        'text', 'award_quantity[]', 'award-quantity-' + index)


    containerElement.classList.add('col-6');

    containerElement.appendChild(inputName);
    containerElement.appendChild(inputAmount);

    awardContainer.appendChild(containerElement);
}

function createStageItem(event) {
    const stageContainer = document.getElementById('stage-container');
    const containerElement = document.createElement('div');

    containerElement.classList.add('col-md-12');

    const index = stageContainer.children.length + 1;

    const inputName = createElement(
        'stage-name', 'Nombre', 'input',
        'text', 'stage_name[]', 'stage-name-' + index)

    const inputDescription = createElement(
        'stage-description', 'Description', 'textarea',
        '', 'stage_description[]', 'stage_description-' + index)

    containerElement.appendChild(inputName);
    containerElement.appendChild(inputDescription);

    stageContainer.appendChild(containerElement);
}

function createElement(htmlFor, labelText, inputName, type, name, id) {

    const divContainer = document.createElement('div');
    const labelElement = document.createElement('label');
    const inputElement = document.createElement(inputName);

    divContainer.classList.add('form-group');
    labelElement.htmlFor = htmlFor;
    inputElement.classList.add('form-control');

    if(type === 'input')
        inputElement.type = type;
    inputElement.name = name;
    inputElement.id = id;

    labelElement.innerText = labelText;

    divContainer.appendChild(labelElement);
    divContainer.appendChild(inputElement);

    return divContainer;
}