let turnoJugador = 1;
let seleccionJugador1 = 0;
let seleccionJugador2 = 0;

function darVuelta(numeroCarta) {
    const carta = document.getElementById(`carta${numeroCarta}`);
    const face = carta.querySelector('.face');
    const img = carta.querySelector('.face img');

    switch (numeroCarta) {
        case 1:
            img.src = "piedra.jpg";
            break;
        case 2:
            img.src = "papel.jpg";
            break;
        case 3:
            img.src = "tijera.jpg";
            break;
        default:
            break;
    }

    face.style.transform = 'rotateY(180deg)';
}

function revertirVuelta(numeroCarta) {
    const carta = document.getElementById(`carta${numeroCarta}`);
    const face = carta.querySelector('.face');
    const img = carta.querySelector('.face img');

    switch (numeroCarta) {
        case 1:
            img.src = "otrolado.jpg";
            break;
        case 2:
            img.src = "otrolado.jpg";
            break;
        case 3:
            img.src = "otrolado.jpg";
            break;
        default:
            break;
    }

    face.style.transform = 'rotateY(0deg)';
}

function shuffleCartas() {
    const cartasContainer = document.getElementById('cartasContainer');
    for (let i = cartasContainer.children.length; i >= 0; i--) {
        cartasContainer.appendChild(cartasContainer.children[Math.random() * i | 0]);
    }
}

function jugar(numeroCarta) {
    const carta = document.getElementById(`carta${numeroCarta}`);
    const mensajesDiv = document.getElementById('mensajes');
    let mensaje = '';


function shuffleCartas() {
    const cartasContainer = document.getElementById('cartasContainer');
    const cartas = Array.from(cartasContainer.children);

    for (let i = cartas.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [cartas[i], cartas[j]] = [cartas[j], cartas[i]];
    }

    const mensajesDiv = document.getElementById('mensajes');
    mensajesDiv.innerHTML = '<p>MEZCLANDO</p>';
    setTimeout(() => {
        mensajesDiv.innerHTML = ''; 
    }, 1000);

    cartas.forEach((carta, index) => {
        carta.style.order = index + 1;
        carta.classList.add('shuffle');
        setTimeout(() => {
            carta.classList.remove('shuffle');
        }, 1000); 
    });
}


    if (turnoJugador === 1) {
        seleccionJugador1 = numeroCarta;
        darVuelta(numeroCarta);
        mensaje = 'Jugador 1 ha seleccionado la carta ' + numeroCarta + '. Ahora es el turno del Jugador 2.';
        turnoJugador = 2;
    } else {
        seleccionJugador2 = numeroCarta;
        darVuelta(numeroCarta);

        if (seleccionJugador1 === seleccionJugador2) {
            mensaje = 'Empate. Jugador 1 y Jugador 2 han seleccionado la misma carta.';
        } else if (
            (seleccionJugador1 === 1 && seleccionJugador2 === 3) ||
            (seleccionJugador1 === 2 && seleccionJugador2 === 1) ||
            (seleccionJugador1 === 3 && seleccionJugador2 === 2)
        ) {
            mensaje = '¡Gana Jugador 1! Jugador 1 ha seleccionado la carta ' + seleccionJugador1 +
                ' y Jugador 2 ha seleccionado la carta ' + seleccionJugador2 + '.';
        } else {
            mensaje = '¡Gana Jugador 2! Jugador 1 ha seleccionado la carta ' + seleccionJugador1 +
                ' y Jugador 2 ha seleccionado la carta ' + seleccionJugador2 + '.';
        }

        seleccionJugador1 = 0;
        seleccionJugador2 = 0;
        turnoJugador = 1;

        setTimeout(() => {
            revertirVuelta(1);
            revertirVuelta(2);
            revertirVuelta(3);
            mensajesDiv.innerHTML = '';
            shuffleCartas(); 
        }, 3000);
    }

    mensajesDiv.innerHTML += '<p>' + mensaje + '</p>';
}
