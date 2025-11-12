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

document.addEventListener("DOMContentLoaded", () => {
  const diasSemana = [
    "Domingo", "Segunda-feira", "Terça-feira", "Quarta-feira",
    "Quinta-feira", "Sexta-feira", "Sábado"
  ];

  const statusDiv = document.getElementById("status-academia");

  function atualizarStatus() {
    const agora = new Date();
    const dia = agora.getDay(); // 0 = Domingo, 6 = Sábado
    const hora = agora.getHours();
    const minuto = agora.getMinutes();

    let aberto = false;
    let horarioTexto = "";

    // Regras de funcionamento
    if (dia >= 1 && dia <= 6) { // Segunda a Sábado
      horarioTexto = "06:00 às 22:00";
      if (hora >= 6 && hora < 22) aberto = true;
    } else if (dia === 0) { // Domingo
      horarioTexto = "08:00 às 12:00";
      if (hora >= 8 && hora < 12) aberto = true;
    }

    // Monta lista da semana com abreviações
    let semanaHTML = "<ul class='semana'>";
    diasSemana.forEach((d, i) => {
      const abreviado = d.slice(0, 3).toLowerCase(); // pega as 3 primeiras letras
      semanaHTML += `<li class='${i === dia ? "ativo" : ""}'>${abreviado}</li>`;
    });
    semanaHTML += "</ul>";

    const horaFormatada = agora.toLocaleTimeString("pt-BR", {
      hour: "2-digit",
      minute: "2-digit",
      second: "2-digit"
    });

    const statusTexto = aberto
      ? "<span class='aberto'>Aberto agora 🟢</span>"
      : "<span class='fechado'>Fechado 🔴</span>";

    statusDiv.innerHTML = `
      <h4>Horário de Funcionamento</h4>
      ${semanaHTML}
      <p><strong>Hoje é:</strong> ${diasSemana[dia]}</p>
      <p><strong>Horário:</strong> ${horarioTexto}</p>
      <p><strong>Status:</strong> ${statusTexto}</p>
      <p class="hora">Hora atual: ${horaFormatada}</p>
    `;
  }

  atualizarStatus();
  setInterval(atualizarStatus, 1000); // atualiza a cada segundo
});


