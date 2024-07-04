$(document).ready(function() {
    
    var date = new Date();
    var tanggal = date.getDate() + '-' + (date.getMonth()+1) + '-' + date.getFullYear();
    var waktu = date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds();
    $("#tanggal").text("Tanggal: " + tanggal);
    $("#waktu").text("Waktu: " + waktu);
});