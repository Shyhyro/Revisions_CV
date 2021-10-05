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
$('.sectionButton').click(function () {
    $(this).next().toggle();
})

/**
 * Dancing letters
 * @type {NodeListOf<HTMLElementTagNameMap[string]>}
 */
// Generate and return a random colors
function getRandomColor() {
    let letters = '0123456789ABCDEF';
    let color = '#';
    for (let i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

let label = $('label');

$('label').on('mouseenter', function () {
    $(this).each(function (index, value) {
        let str = this.textContent;
        this.innerHTML = '';

        for (let j=0, ll= str.length; j<ll; ++j) {
            let n = document.createElement('span')
            this.appendChild(n)
            n.textContent = str[j]
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
})

/**
 * Figcaption
 * @type {HTMLElement}
 */
$('.back').css({
    "position": 'relative',
    "top": '-154px',
    "backgroundColor": 'black',
    "color": 'white',
    "transform": 'rotateY(90deg)'
})

$('.front').css("transform", "rotateY(0)");
let cardStatut = false;

function Mouse () {
    $(".card").off('mouseenter')
    if (cardStatut === false) {
        $('.front').css({
            "transform": 'rotateY(90deg)',
            transition: 'all 1s linear'
        }).delay(1000).queue( function (next) {
            $('.back').css({
                "transform": 'rotateY(0)',
                transition: 'all 1s linear'
            })
            next();
        }).delay(1000).queue(function (next){
            cardStatut = true;
            $(".card").on('mouseenter', Mouse)
            next();
        });

    }
    else if (cardStatut === true) {
        $('.back').css({
            "transform": 'rotateY(90deg)',
            transition: 'all 1s linear'
        }).delay(1000).queue( function (next) {
            $('.front').css({
                "transform": 'rotateY(0)',
                transition: 'all 1s linear'
            })
            next();
        }).delay(1000).queue(function (next){
            cardStatut = false;
            $(".card").on('mouseenter', Mouse)
            next();
        });
    }
}

$(".card").on('mouseenter', Mouse)

/**
 * ul / dd
 */
let requestJson = 'dd.json';
let request = new XMLHttpRequest();
request.open('GET', requestJson);
request.responseType = 'json';

request.onload = function() {
    let definition = request.response;
    worldDefinition(definition);
}

// select all words and her definition in json file
function worldDefinition(definition) {

    for (let i = 0; i<=definition.length; i++) {
        $('dl').append($("<dt>" + definition[i]['word'] + "</dt>" + "<dd>" + definition[i]['definition'] + "</dd>"))
    }
}

request.send();

// ul
let nav = document.querySelector('nav');
let requestJson2 = 'ul.json';
let request2 = new XMLHttpRequest();
request2.open('GET', requestJson2);
request2.responseType = 'json';

request2.onload = function() {
    let content = request2.response;
    links(content);
}

// select all words and her definition in json file
function links(content) {
    $('nav').append($("<ul></ul>"))

    for (let i = 0; i<=content.length; i++) {
        $('nav ul').append($("<li>" + "<a href='" + content[i]['link'] + "'>" + content[i]['linkName'] + "</a></li>"))
    }
}

request2.send();