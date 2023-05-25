const images = ['photos/Background-image.jpg', 'photos/Background-image2.jpg', 'photos/Background-image3.jpg'];

const images_colors = [
  "photos/Background-image.jpg",
  "photos/Background-image2.jpg",
  "photos/Background-image3.jpg"
];
const colors = [
  "#47b11d", // culoarea corespunzatoare primei imagini
  "#B87333", // culoarea corespunzatoare celei de-a doua imagini
  "#C0C0C0"  // culoarea corespunzatoare celei de-a treia imagini
];

let index = 0;

function changeBackgroundImage() {
  index = (index + 1) % images.length;
  document.body.style.backgroundImage = `url(${images[index]})`;
  const container = document.querySelector(".container");
  container.style.backgroundColor = colors[index];
}

setInterval(changeBackgroundImage, 5000);



// SALVARE DATE //

const nameInput = document.querySelector('input[name="Name"]');
const emailInput = document.querySelector('input[name="email"]');
const passwordInput = document.querySelector('input[name="psw"]');
const repeatPasswordInput = document.querySelector('input[name="psw-repeat"]');

// Adaugă un eveniment de ascultare la submiterea formularului
document.querySelector('form').addEventListener('submit', (event) => {
  // Previne trimiterea formularului
  event.preventDefault();

  // Preia valorile introduse în input-uri
  const name = nameInput.value;
  const email = emailInput.value;
  const password = passwordInput.value;
  const repeatPassword = repeatPasswordInput.value;

  // Verifică dacă parolele sunt identice
  if (password !== repeatPassword) {
    swal("Passowrd", "Passowrd and Repeat Password need to match", "warning");
    return;
  }

  if (name.length < 6) {
    swal("Name", "Name need to be atleast 6 letters", "warning");
    return;
  }

  // Salvează valorile în localStorage
  localStorage.setItem('name', name);
  localStorage.setItem('email', email);
  localStorage.setItem('password', password);

  // Redirecționează utilizatorul către o altă pagină, dacă este cazul
  window.location.href = '/success.html';
});
