// ===== BUSCA EM TEMPO REAL =====
const inputBusca = document.getElementById("busca");
const tabela = document.getElementById("tabela").getElementsByTagName("tbody")[0];
const filtroSelect = document.getElementById("filtro");
const ordenarBtn = document.getElementById("ordenar");
let crescente = true;

inputBusca.addEventListener("keyup", filtrarTabela);
filtroSelect.addEventListener("change", filtrarTabela);
ordenarBtn.addEventListener("click", ordenarPorPreco);

function filtrarTabela() {
  const busca = inputBusca.value.toLowerCase();
  const filtro = filtroSelect.value.toLowerCase();

  for (let row of tabela.rows) {
    const nome = row.cells[0].textContent.toLowerCase();
    const desc = row.cells[1].textContent.toLowerCase();
    const publico = row.cells[2].textContent.toLowerCase();

    const matchBusca = nome.includes(busca) || desc.includes(busca);
    const matchFiltro = filtro === "todos" || publico.includes(filtro);

    row.style.display = matchBusca && matchFiltro ? "" : "none";
  }
}

// ===== ORDENAÇÃO POR PREÇO =====
function ordenarPorPreco() {
  const linhas = Array.from(tabela.rows);
  linhas.sort((a, b) => {
    const precoA = parseFloat(a.cells[3].textContent.replace(",", "."));
    const precoB = parseFloat(b.cells[3].textContent.replace(",", "."));
    return crescente ? precoA - precoB : precoB - precoA;
  });
  crescente = !crescente;
  linhas.forEach(l => tabela.appendChild(l));
}
