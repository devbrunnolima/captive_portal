<?php
// Define o fuso horário para o Brasil
date_default_timezone_set('America/Sao_Paulo');

// Crie um objeto DateTime representando o momento atual no Brasil
$dataHoraAtual = new DateTime();

// Obtenha o dia atual (como número)
$dia = $dataHoraAtual->format('d,m,Y');

// Obtenha a hora atual (formato de 24 horas)
$hora = $dataHoraAtual->format('H:i:s');

echo "Dia: $dia<br>";
echo "Hora: $hora";
?>
