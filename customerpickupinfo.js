//https://stackoverflow.com/questions/5741632/javascript-date-7-days
var date = new Date();
date.setDate(date.getDate() + 7);

document.getElementById("date").innerText = date;