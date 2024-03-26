const cellElements = document.querySelectorAll("[data-cell]");
const board = document.querySelector("[data-board]");
const winningMessageTextElement = document.querySelector("[data-winning-message-text]"
);

const winningMessage = document.querySelector("[data-winning-message]");
const restartButton = document.querySelector("[data-restart-button]");

//*above referencing index.html page*//

let isCircleTurn;

const winningCombinations = [
    [0, 1, 2],
    [3, 4, 5],
    [6, 7, 8],
    [0, 3, 6],
    [1, 4, 7],
    [2, 5, 8],
    [0, 4, 8],
    [2, 4, 6],
];

const startGame = () => {
    isCircleTurn = false; //* ask playerto select name 

    for (const cell of cellElements) {
        cell.classList.remove("circle");
        cell.classList.remove("x"); //*Created afterwards to restart button can re-set the game *//
        cell.removeEventListener("click", handleClick);
        cell.addEventListener('click', handleClick, { once: true });
    }

    setBoardHoverClass();
    winningMessage.classList.remove("show-winning-message"); //*remove class created below*//
};

const endGame = (isDraw) => {
    if (isDraw) {
        winningMessageTextElement.innerText = "Draw!" //*to update the database to count draw
    } else {
        winningMessageTextElement.innerText = isCircleTurn //* we created this to check if is circle turn, if so it won if not it lost as this class alters every turn*//
        ? "O Won!" 
        : "X Won!";
    }

    winningMessage.classList.add("show-winning-message");
};

//* we need to know whu is the last player as technicaly is the last one to play/ check if any combination mentione above is placed*//
const checkForWin = (currentPlayer) => {
    return winningCombinations.some(combination => {
        return combination.every((index) => {
            return cellElements[index].classList.contains(currentPlayer); //*Check if cells contain currentplayer on locations mentioned above*//
        });
    });
};

const checkForDraw = () => {
    return [... cellElements].every(cell => {
        return cell.classList.contains("x") || cell.classList.contains("circle") //* || means or*// In this case we want to say if every cell has eighter in totallity this owuld mean a draw*//
    })
}

const placeMark = (cell, classToAdd) => {
    cell.classList.add(classToAdd);
};

const setBoardHoverClass = () => {
board.classList.remove("circle");
board.classList.remove("x");

if (isCircleTurn) {
    board.classList.add("circle")
} else {
    board.classList.add("x");
}
}

const swapTurns = () => {
    isCircleTurn = !isCircleTurn;

    setBoardHoverClass();
};

const handleClick = (e) => {
    // to place X or circule
    const cell = e.target;
    const classToAdd = isCircleTurn ? 'circle' : 'x';

    placeMark(cell, classToAdd);

    //verify victory
    const isWIn = checkForWin(classToAdd);

     // verify draw
    const isDraw = checkForDraw();

    if (isWIn) {
        endGame(false);
    } else if (isDraw) {
        endGame(true)
    } else {
        //change symbol
    
        swapTurns();
    }
    };


startGame();

restartButton.addEventListener('click', startGame);

const [scores, setScores] = useState({xScore:0, oScore:0})

if(winner) {
    if(winner === "0"){
        let {oScore} = scores;
        oScore += 1
        setScores({...scores, oScore})
    } else {
        let {xScore} = scores;
        xScore += 1
        setScores({...scores, xScore})  
    }
}

console.log(scores)