document.addEventListener('DOMContentLoaded', () => {
    const prev = document.querySelector("#prev");
    const next = document.querySelector("#next");

    const teamSelector = document.querySelector("#teamSelector");
    const goBack = document.querySelector("#go-back");

    let carouselVp = document.querySelector("#carousel-vp");

    let cCarouselInner = document.querySelector("#cCarousel-inner");
    let carouselInnerWidth = cCarouselInner.getBoundingClientRect().width;

    let leftValue = 0;

    // Variable used to set the carousel movement value (card's width + gap)
    const totalMovementSize =
    parseFloat(
        document.querySelector(".cCarousel-item").getBoundingClientRect().width,
        10
    ) +
    parseFloat(
        window.getComputedStyle(cCarouselInner).getPropertyValue("gap"),
        10
    );

    prev.addEventListener("click", () => {
    if (!leftValue == 0) {
        leftValue -= -totalMovementSize;
        cCarouselInner.style.left = leftValue + "px";
    }
    });

    next.addEventListener("click", () => {
    const carouselVpWidth = carouselVp.getBoundingClientRect().width;
    if (carouselInnerWidth - Math.abs(leftValue) > carouselVpWidth) {
        leftValue -= totalMovementSize;
        cCarouselInner.style.left = leftValue + "px";
    }
    });

    const mediaQuery510 = window.matchMedia("(max-width: 510px)");
    const mediaQuery770 = window.matchMedia("(max-width: 770px)");

    mediaQuery510.addEventListener("change", mediaManagement);
    mediaQuery770.addEventListener("change", mediaManagement);

    let oldViewportWidth = window.innerWidth;

    function mediaManagement() {
    const newViewportWidth = window.innerWidth;

    if (leftValue <= -totalMovementSize && oldViewportWidth < newViewportWidth) {
        leftValue += totalMovementSize;
        cCarouselInner.style.left = leftValue + "px";
        oldViewportWidth = newViewportWidth;
    } else if (
        leftValue <= -totalMovementSize &&
        oldViewportWidth > newViewportWidth
    ) {
        leftValue -= totalMovementSize;
        cCarouselInner.style.left = leftValue + "px";
        oldViewportWidth = newViewportWidth;
    }
    }
    const buttons = document.querySelectorAll('#cCarousel .infos button');
    const table = document.getElementById('buy_div');
    const tbody = document.getElementById('players-tbody');
    const selectedTeamInput = document.getElementById('selected-team-id');

    goBack.addEventListener('click', () => {
        // Show the table
        table.hidden = true;
        teamSelector.hidden = false;
        selectedTeamInput.value = 0; // Defaulted to Free Agent
    });

    buttons.forEach(button => {
        button.addEventListener('click', () => {
            const clubId = button.getAttribute('data-club-id');

            // Update the selected team ID
            selectedTeamInput.value = clubId;
        
            // Show the table
            table.hidden = false;
            teamSelector.hidden = true;
            const rows = document.querySelectorAll('#players-tbody tr');
        rows.forEach(row => {
            row.style.display = 'none';  // Hide all rows
        });

            // Show rows matching the clubId
            const matchingRows = document.querySelectorAll(`#players-tbody tr[data-club-id="${clubId}"]`);
            matchingRows.forEach(row => {
                row.style.display = ''; 
            });
        });
    });
    const ourTeamTable = document.querySelector(".sell_div > tbody");
    const buyTable = document.querySelector(".buy_div > tbody");
    
    const currSell = document.querySelector(".currSell_div > tbody");
    const currBuy = document.querySelector(".currBuy_div > tbody");

    /* 
        @buy [playerId]
        @sell [[playerId,toClub]]
    */
    let transactions = {
        buy: [],
        sell: []
    };

    // Function to handle button click and move rows
    function handleButtonClick(button, fromTable, toTable, actionType) {
        const row = button.closest('tr');
        const playerId = button.name;

        if (actionType === 'sell') {
            // Move from Our Team to Buy
            button.textContent = 'Cancel';
            button.classList.remove('sell');
            button.classList.add('cancel-sell');
            
            const playerObject = {
                action: {
                    buttonText: row.children[5].querySelector('button')?.textContent.trim() || null, // Button text
                    buttonClass: row.children[5].querySelector('button')?.className || null,        // Button class
                    buttonName: row.children[5].querySelector('button')?.name || null              // Button name (id)
                },
                position: row.children[0].textContent.trim(),
                name: row.children[1].textContent.trim(),
                jersey: parseInt(row.children[2].textContent.trim(), 10),
                value: row.children[3].textContent.trim(),
                clubImage: row.children[4].querySelector('img')?.src || null // Get the image src
            };
            if (selectedTeamInput.value > 0) {
                row.innerHTML = `
                <td><button class="${playerObject.action.buttonClass}" name="${playerObject.action.buttonName}">
                    ${playerObject.action.buttonText}
                </button></td>
                <td>${playerObject.position}</td>
                <td>${playerObject.name}</td>
                <td>${playerObject.jersey}</td>
                <td>${playerObject.value}</td>
                <td><img src="/Assets/images/Teams/${selectedTeamInput.value}.svg" height="50"></td>
            `;
            } else {
                row.innerHTML = `
                <td><button class="${playerObject.action.buttonClass}" name="${playerObject.action.buttonName}">
                    ${playerObject.action.buttonText}
                </button></td>
                <td>${playerObject.position}</td>
                <td>${playerObject.name}</td>
                <td>${playerObject.jersey}</td>
                <td>${playerObject.value}</td>
                <td><img src="/Assets/images/Teams/${selectedTeamInput.value}.png" height="50"></td>
            `;
            }

            

            toTable.appendChild(row);

            transactions.sell.push([playerId, selectedTeamInput.value]);
        } else if (actionType === 'cancel-sell') {  
            // Move back to Our Team
            button.textContent = 'Sell';
            button.classList.remove('cancel-sell');
            button.classList.add('sell');

            const playerObject = {
                action: {
                    buttonText: row.children[0].querySelector('button')?.textContent.trim() || null, // Button text
                    buttonClass: row.children[0].querySelector('button')?.className || null,        // Button class
                    buttonName: row.children[0].querySelector('button')?.name || null              // Button name (id)
                },
                position: row.children[1].textContent.trim(),
                name: row.children[2].textContent.trim(),
                jersey: parseInt(row.children[3].textContent.trim(), 10),
                value: row.children[4].textContent.trim(),
                clubImage: row.children[5].querySelector('img')?.src || null // Get the image src
            };

            row.innerHTML = `
                <td>${playerObject.position}</td>
                <td>${playerObject.name}</td>
                <td>${playerObject.jersey}</td>
                <td>${playerObject.value}</td>
                <td><img src="${playerObject.clubImage}" height="50"></td>
                <td><button class="${playerObject.action.buttonClass}" name="${playerObject.action.buttonName}">
                    ${playerObject.action.buttonText}
                </button></td>
            `;

            toTable.appendChild(row);

            // remove from sell
            transactions.sell = transactions.sell.filter(([id]) => id !== playerId);
        } else if (actionType === 'buy') {
            // Move from Buy to Our Team
            button.textContent = 'Cancel';
            button.classList.remove('buy');
            button.classList.add('cancel-buy');

            const playerObject = {
                action: {
                    buttonText: row.children[0].querySelector('button')?.textContent.trim() || null, // Button text
                    buttonClass: row.children[0].querySelector('button')?.className || null,        // Button class
                    buttonName: row.children[0].querySelector('button')?.name || null              // Button name (id)
                },
                position: row.children[1].textContent.trim(),
                name: row.children[2].textContent.trim(),
                jersey: parseInt(row.children[3].textContent.trim(), 10),
                value: row.children[4].textContent.trim(),
                clubImage: row.children[5].querySelector('img')?.src || null // Get the image src
            };

            row.innerHTML = `
                <td>${playerObject.position}</td>
                <td>${playerObject.name}</td>
                <td>${playerObject.jersey}</td>
                <td>${playerObject.value}</td>
                <td><img src="${playerObject.clubImage}" height="50"></td>
                <td><button class="${playerObject.action.buttonClass}" name="${playerObject.action.buttonName}">
                    ${playerObject.action.buttonText}
                </button></td>
            `;

            toTable.appendChild(row);

            transactions.buy.push(playerId);
        } else if (actionType === 'cancel-buy') {
            // Move back to Buy
            button.textContent = 'Buy';
            button.classList.remove('cancel-buy');
            button.classList.add('buy');
            const playerObject = {
                action: {
                    buttonText: row.children[5].querySelector('button')?.textContent.trim() || null, // Button text
                    buttonClass: row.children[5].querySelector('button')?.className || null,        // Button class
                    buttonName: row.children[5].querySelector('button')?.name || null              // Button name (id)
                },
                position: row.children[0].textContent.trim(),
                name: row.children[1].textContent.trim(),
                jersey: parseInt(row.children[2].textContent.trim(), 10),
                value: row.children[3].textContent.trim(),
                clubImage: row.children[4].querySelector('img')?.src || null // Get the image src
            };

            row.innerHTML = `
                <td><button class="${playerObject.action.buttonClass}" name="${playerObject.action.buttonName}">
                    ${playerObject.action.buttonText}
                </button></td>
                <td>${playerObject.position}</td>
                <td>${playerObject.name}</td>
                <td>${playerObject.jersey}</td>
                <td>${playerObject.value}</td>
                <td><img src="${playerObject.clubImage}" height="50"></td>
            `;

            toTable.appendChild(row);

            transactions.buy = transactions.buy.filter(id => id !== playerId);
        }
    }

    function commitTransaction(transactions) {
        fetch('/transfer', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(transactions),
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log('Transaction committed successfully:', data);
            console.log(JSON.stringify(transactions));
            window.location.reload();
        })
        .catch(error => {
            console.error('Error committing transaction:', error);
        });
    }
    

    // Event delegation for dynamic handling
    document.addEventListener('click', (e) => {
        if (e.target.classList.contains('sell')) {
            handleButtonClick(e.target, ourTeamTable, currSell, 'sell');
            console.log(transactions.sell);
            console.log(selectedTeamInput.value);
        } else if (e.target.classList.contains('cancel-sell')) {
            handleButtonClick(e.target, currSell, ourTeamTable, 'cancel-sell');
            console.log(transactions.sell);
            console.log(selectedTeamInput.value);
        } else if (e.target.classList.contains('buy')) {
            handleButtonClick(e.target, buyTable, currBuy, 'buy');
            console.log(transactions.buy);
            console.log(selectedTeamInput.value);
        } else if (e.target.classList.contains('cancel-buy')) {
            handleButtonClick(e.target, currBuy, buyTable, 'cancel-buy');
            console.log(transactions.buy);
            console.log(selectedTeamInput.value);
        } else if (e.target.classList.contains('tr-commit')) {
            commitTransaction(transactions);
            transactions = { buy: [], sell: [] }; // Reset after commit
        }        
    });
});
