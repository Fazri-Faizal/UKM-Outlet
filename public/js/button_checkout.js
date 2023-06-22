const btn = document.querySelector('.button-checkout');

btn.addEventListener('click', () => {
  document.documentElement.classList.toggle('checked-out');
});