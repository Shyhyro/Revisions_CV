/**
 * h1 animation
 * @type {null}
 */
let time = null;

let h1 = document.querySelector('h1');
function h1Anim () {
    let size = 0;

    clearInterval(time);

    time = setInterval(sizeChange, 10);

    function sizeChange() {
        if (size === 30) {

            clearInterval(time);
        } else {
            size++;
            h1.style.fontSize = size + 'px';
        }
    }
}

h1Anim();

/**
 * h2 h3 animation
  */
let titles = document.querySelectorAll('.titles');

for (let i=0, l=titles.length; i<l; i++) {
    titles[i].animate([{ opacity: '0' }, { opacity: '1' }, { color: 'orange'}], {delay:300, duration: 4000, fill: "forwards"});
}

/**
 * Sections
 * @type {HTMLElement}
 */
let sections = document.querySelectorAll('.section');

for (let i=0, l=sections.length; i<l; i++) {
    sections[i].style.visibility = 'hidden';
    sections[i].style.height = '0';
}

let sectionsButtons = document.querySelectorAll('.sectionButton');

for (let i=0, l=sectionsButtons.length; i<l; i++) {
    sectionsButtons[i].addEventListener('click', function () {
        if (sections[i].style.visibility === 'hidden'){
            sections[i].style.visibility = 'visible';
            sections[i].style.height = 'auto';
        }
        else {
            sections[i].style.visibility = 'hidden';
            sections[i].style.height = '0';
        }
    })
}

/**
 * Dancing letters
 * @type {NodeListOf<HTMLElementTagNameMap[string]>}
 */
let label = document.querySelectorAll('label');

// Generate and return a random colors
function getRandomColor() {
    let letters = '0123456789ABCDEF';
    let color = '#';
    for (let i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

for(let i=0, l=label.length; i<l; ++i) {
    label[i].addEventListener('mouseenter', function (){

        let str = label[i].textContent;
        label[i].innerHTML = '';

        for(let j=0,ll=str.length; j<ll; ++j) {
            let n = document.createElement('span');
            label[i].appendChild(n);
            n.textContent = str[j];
            n.style.color = getRandomColor() ;

            if(j%2 === 0)
            {
                n.style.fontFamily = 'Calibri, sans-serif';
            }
            else
            {
                n.style.fontFamily = '"Arial Black", sans-serif';
            }

        }

    })

}

/**
 * Figcaption
 * @type {HTMLElement}
 */
let figcaption = document.querySelector('figcaption');
let figureImg = document.querySelector('figure img');

figcaption.style.position = 'relative';
figcaption.style.top = '-154px';
figcaption.style.backgroundColor = 'black';
figcaption.style.color = 'white';
figcaption.style.transform = 'rotateY(90deg)';

figureImg.addEventListener('mouseover', function () {
    figcaption.animate([{transform: 'rotateY(0deg)' }], {delay : 1000, duration : 1000, fill : "forwards" })
    figureImg.animate([{transform: 'rotateY(90deg)' }], {duration : 1000, fill : "forwards" })
})

figureImg.addEventListener('mouseleave', function () {
    figcaption.animate([{transform: 'rotateY(90deg)'}], {duration : 1000, fill : "forwards"})
    figureImg.animate([{transform: 'rotateY(0deg)' }], {delay : 1000, duration : 1000, fill : "forwards" })
})

/**
 * Ul / dd
 */
let wordDefinitionDl = document.querySelector('dl');
let requestJson = 'dd.json';

let request = new XMLHttpRequest();
request.open('GET', requestJson);

request.responseType = 'json';

request.onload = function() {
    let definition = request.response;
    console.log(definition)
    worldDefinition(definition);
}

function worldDefinition(definition) {
    for (let i = 0; i<=definition.length; i++) {
        let dt = document.createElement('dt');
        dt.textContent = definition[i]['word'];
        wordDefinitionDl.appendChild(dt);

        let dd = document.createElement('dd');
        dd.textContent = definition[i]['definition']
        wordDefinitionDl.appendChild(dd);
    }
}

request.send();