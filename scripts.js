let time = null;

function h1Anim () {
    let h1 = document.querySelector('h1');
    let size = 0;

    clearInterval(time);

    time = setInterval(sizeChange, 10);

    function sizeChange() {
        if (size == 30) {
            clearInterval(id);
        } else {
            size++;
            h1.style.fontSize = size + 'px';
        }
    }
}

h1Anim();

function h2h3Anim () {
    let h2 = document.querySelector('h2');



}