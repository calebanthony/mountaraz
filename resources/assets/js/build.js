const battlerites = document.querySelectorAll('.build-battlerite')

for (let i = 0; i < battlerites.length; i++) {
    battlerites[i].addEventListener('click', toggleBattlerite, false)
}

/**
 * Toggles the selected battlerite
 */
function toggleBattlerite(e) {
    e.preventDefault()
    
    
    // console.log(e.currentTarget.dataset.hotkey)
    // console.log(e.currentTarget.dataset.name)
    
    // Update the style of the selected battlerite
    e.currentTarget.classList.toggle('is-active')
    
    // Make sure the build is valid
    if (checkValidity(e)) {
        // Then push all these changes into the hidden field
        generateBuild()
    }
    
}

/**
 * Make sure the build is valid.
 */
function checkValidity(e) {
    const selectedBattlerites = document.querySelectorAll('.build-battlerite.is-active')
    
    // Test that a maximum of 2 battlerites be selected for each hotkey
    let hotkeys = []
    for (let i = 0; i < selectedBattlerites.length; i++) {
        hotkeys.push(selectedBattlerites[i].dataset.hotkey)
    }

    // Reduce the array to count the occurrences
    const hotkeyCount = hotkeys.reduce((acc, curr) => {
        if (typeof acc[curr] == 'undefined') {
            acc[curr] = 1
        } else {
            acc[curr] += 1
        }

        return acc
    }, {})

    // Check that none of the counts are over 2
    // Otherwise the test fails
    for (let i in hotkeyCount) {
        if (hotkeyCount[i] > 2) {
            e.currentTarget.classList.toggle('is-active')
            return false
        }
    }

    // Test that a maximum of 5 battlerites are selected total
    if (selectedBattlerites.length > 5) {
        e.currentTarget.classList.toggle('is-active')
        return false
    }

    return true
}

/**
 * Finds the selected battlerites and pushes them into the hidden field
 */
function generateBuild() {
    const selected = document.querySelectorAll('.build-battlerite.is-active')
    let buildOrder = []
    for (let i = 0; i < selected.length; i++) {
        console.log(selected[i].dataset.name)
        buildOrder.push(selected[i].dataset.name)
    }

    buildOrder.sort()

    document.getElementById('battleriteBuild').value = buildOrder
}
