/*Verificando click no button */
function btnClick() {
    document.getElementById("btnClick").disabled = true;
    document.getElementById("btnClick").textContent = "Enviando...";
}
<button id="btnClick" onclick="btnClick()"></button>