const adaptTime = (value) => value < 10 ? "0" + value : value;

const updateDateTime = () => {
    let today = new Date();
    let date = today.toLocaleString('en-CA').split(',')[0];
    
    let inputDate = document.querySelector("input[type='date']");
    inputDate.value = date;
    
    let inputTime = document.querySelector("input[type='time']");
    inputTime.value = adaptTime(today.getHours()) + ":" + adaptTime(today.getMinutes());
}

updateDateTime();
setInterval(updateDateTime, 60000);





