export default {

    toHoursAndMinutes(totalMinutes) {
        var minutes = totalMinutes % 60;
        var hours = Math.floor(totalMinutes / 60);
        if(hours < 10) {
            hours = "0" + hours;
        }
        if(minutes < 10) {
            minutes = "0" + minutes;
        }  
        return `${hours}:${minutes}`;
    },

    data : {
        beginMin : 480, //8hx60min
        stopMin : 1080, //18hx60min
        durationSlotKart : 15 //min
    }

}