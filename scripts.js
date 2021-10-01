/**
 * h1 animation
 * @type {null}
 */
$('h2, h3').css("opacity", "0")

$("h1").animate({
    fontSize: '+=10px'
}, 1000).queue(function () {

    /**
     * h2 h3 animation
     */
    $('h2, h3').css("color", "orange").animate({
        opacity: 1,
    }, 3000 );
});

/**
 * Sections
 * @type {HTMLElement}
 */

$('.section').css("visibility", "hidden").css("height", "0");

$('.sectionButton').click(function () {
    $(this).click(function () {
        $(this).css("color", "purple");
        // $('.section').toggle(function () {
        //     $(this).css("visibility", 'visible').css("height", "auto");
        // });
    })
})









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


figureImg.addEventListener('mouseenter', function () {
    figcaption.animate([{transform: 'rotateY(0deg)' }], {delay : 1000, duration : 1000, fill : "forwards" })
    figureImg.animate([{transform: 'rotateY(90deg)' }], {duration : 1000, fill : "forwards" })
})

figcaption.addEventListener('mouseleave', function () {
    figcaption.animate([{transform: 'rotateY(90deg)'}], {duration : 1000, fill : "forwards"})
    figureImg.animate([{transform: 'rotateY(0deg)' }], {delay : 1000, duration : 1000, fill : "forwards" })
})

/**
 * ul / dd
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

// select all words and her definition in json file
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

// ul
let nav = document.querySelector('nav');
let requestJson2 = 'ul.json';

request.open('GET', requestJson2);
request.responseType = 'json';

request.onload = function() {
    let content = request.response;
    links(content);
}

// select all words and her definition in json file
function links(content) {
    let ul = document.createElement('ul');
    ul.id = 'links'
    nav.appendChild(ul);
    let linkContent = document.querySelector('#links');

    for (let i = 0; i<=content.length; i++) {
        let li = document.createElement('li');
        li.innerHTML = "<a href='"+ content[i]['link'] +"'>" + content[i]['linkName'] + "</a>";
        linkContent.appendChild(li);


    }
}

request.send();