function clockTick() {
    var currentTime = new Date(),
        month = String(currentTime.getMonth() + 1).padStart(2, '0');
        day = String(currentTime.getDate()).padStart(2, '0');
        year = currentTime.getFullYear(),
        text = (day + "/" + month + "/" + year);
    // here we get the element with the id of "date" and change the content to the text variable we made above
    document.getElementById('fait_le_p').innerHTML += text;
  }

clockTick()


