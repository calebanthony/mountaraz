const tipModal    = document.getElementById('tipModal')
const tipModalBtn = document.getElementById('tipModalBtn')
const tipModalClose = document.getElementById('tipModalClose')
const tipModalCloseBtn = document.getElementById('tipModalCloseBtn')

const counterModal = document.getElementById('counterModal')
const counterModalBtn = document.getElementById('counterModalBtn')
const counterModalClose = document.getElementById('counterModalClose')
const counterModalCloseBtn = document.getElementById('counterModalCloseBtn')

const buildModal = document.getElementById('buildModal')
const buildModalBtn = document.getElementById('buildModalBtn')
const buildModalClose = document.getElementById('buildModalClose')
const buildModalCloseBtn = document.getElementById('buildModalCloseBtn')

tipModalBtn.onclick = () => tipModal.classList.add('is-active')
tipModalClose.onclick = () => tipModal.classList.remove('is-active')
tipModalCloseBtn.onclick = () => tipModal.classList.remove('is-active')

counterModalBtn.onclick = () => counterModal.classList.add('is-active')
counterModalClose.onclick = () => counterModal.classList.remove('is-active')
counterModalCloseBtn.onclick = () => counterModal.classList.remove('is-active')

buildModalBtn.onclick = () => buildModal.classList.add('is-active')
buildModalClose.onclick = () => buildModal.classList.remove('is-active')
buildModalCloseBtn.onclick = () => buildModal.classList.remove('is-active')
