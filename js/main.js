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

// ===========================================
// Lógica do Chatbot
// ===========================================

// ⚠️ SUBSTITUA PELA SUA URL DE PRODUÇÃO DO WEBHOOK DO N8N ⚠️
const N8N_WEBHOOK_URL = 'https://n8n-n8n-start.yb04oj.easypanel.host/webhook/000d13c3-abef-49c5-a6f0-244e9185aa6d';

const chatToggleBtn = document.getElementById('chat-toggle-btn');
const chatbotWindow = document.getElementById('chatbot-window');
const chatMessages = document.getElementById('chat-messages');
const userInput = document.getElementById('user-input');
const sendBtn = document.getElementById('send-btn');

// --- Funções de Interface ---

function toggleChat(show) {
    if (show === undefined) {
        chatbotWindow.classList.toggle('open');
        chatToggleBtn.classList.toggle('open');
    } else if (show) {
        chatbotWindow.classList.add('open');
        chatToggleBtn.classList.add('open');
    } else {
        chatbotWindow.classList.remove('open');
        chatToggleBtn.classList.remove('open');
    }
}

// Abre/Fecha a Janela do Chat
chatToggleBtn.addEventListener('click', () => toggleChat());

// Adiciona uma mensagem ao chat
function appendMessage(sender, text) {
    const messageDiv = document.createElement('div');
    messageDiv.classList.add('message');
    messageDiv.classList.add(sender === 'user' ? 'user-message' : 'bot-message');
    messageDiv.textContent = text;
    chatMessages.appendChild(messageDiv);
    // Rola para a mensagem mais recente
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

// --- Funções de Comunicação com N8N ---

async function sendMessageToN8n(message) {
    // Adiciona uma mensagem de "digitando" enquanto espera
    appendMessage('bot', 'Digitando...');
    const typingMessage = chatMessages.lastElementChild;

    try {
        const response = await fetch(N8N_WEBHOOK_URL, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            // Envia a mensagem do usuário no corpo JSON
            body: JSON.stringify({ message: message }),
        });

        if (!response.ok) {
            throw new Error(`Erro HTTP! Status: ${response.status}`);
        }

        const data = await response.json();
        
        // Remove a mensagem de "digitando"
        chatMessages.removeChild(typingMessage);
        
        // Assume que a resposta do n8n terá o texto de resposta na propriedade 'response'
        const botResponse = data.response || "Desculpe, não consegui obter uma resposta.";
        appendMessage('bot', botResponse);

    } catch (error) {
        console.error('Erro ao comunicar com o n8n:', error);
        
        // Remove a mensagem de "digitando" e exibe o erro
        if (typingMessage && typingMessage.parentNode) {
            chatMessages.removeChild(typingMessage);
        }
        appendMessage('bot', '🚨 Erro de conexão. Tente novamente mais tarde.');
    } finally {
        // Habilita o input e o botão novamente
        userInput.disabled = false;
        sendBtn.disabled = false;
        userInput.focus();
    }
}

// --- Event Listeners para Envio de Mensagem ---

async function handleMessageSend() {
    const message = userInput.value.trim();
    if (message === '') return;

    appendMessage('user', message);
    userInput.value = ''; // Limpa o input

    // Desabilita o input e o botão para evitar envio duplicado
    userInput.disabled = true;
    sendBtn.disabled = true;

    await sendMessageToN8n(message);
}

sendBtn.addEventListener('click', handleMessageSend);

userInput.addEventListener('keypress', (e) => {
    if (e.key === 'Enter') {
        handleMessageSend();
    }
});

// ===========================================
// Fim da Lógica do Chatbot
// ===========================================


