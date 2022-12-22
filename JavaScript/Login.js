const login = document.querySelector('.js-login')
const modal = document.querySelector('.js-modal')
const modalClose = document.querySelector('.js-modal-close')
const modalContainer = document.querySelector('.js-modal-container')

function openFormLogin() {
    modal.classList.add('open')
}

function closeFormLogin() {
    modal.classList.remove('open')
}

login.addEventListener('click', openFormLogin)

modalClose.addEventListener('click', closeFormLogin)

modal.addEventListener('click', closeFormLogin)

modalContainer.addEventListener('click', function (event) {
    event.stopPropagation()
})