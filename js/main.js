function menuShow() {
  const menuMobile = document.querySelector('.menu-mobile');
  const icon = document.querySelector('.icon');
  menuMobile.classList.toggle('open');
  icon.src = menuMobile.classList.contains('open') 
    ? 'img/off-menu.png' 
    : 'img/on-menu.png';
}

// ================================
// 🎞️ CARROSSEL DO HERO
// ================================
let slideIndex = 0;
const slides = document.querySelectorAll('.slide');

function showSlides() {
  slides.forEach((slide, i) => {
    slide.classList.remove('active');
  });
  slideIndex = (slideIndex + 1) % slides.length;
  slides[slideIndex].classList.add('active');
}

// Troca de imagem a cada 5 segundos
setInterval(showSlides, 5000);

// ================================
// 📩 FORMULÁRIO DE CONTATO → N8N
// ================================
document.getElementById('contatoForm').addEventListener('submit', async (e) => {
  e.preventDefault();

  const data = Object.fromEntries(new FormData(e.target).entries());
  const resposta = document.getElementById('resposta');

  resposta.textContent = "Enviando mensagem...";

  try {
    const res = await fetch("https://garnett-uninfringed-originally.ngrok-free.dev", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(data)
    });

    if (res.ok) {
      resposta.textContent = "✅ Mensagem enviada com sucesso!";
      resposta.style.color = "green";
      e.target.reset();
    } else {
      resposta.textContent = "⚠️ Erro ao enviar a mensagem.";
      resposta.style.color = "red";
    }
  } catch (err) {
    resposta.textContent = "❌ Erro de conexão com o servidor.";
    resposta.style.color = "red";
  }
});
