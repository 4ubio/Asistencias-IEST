document.addEventListener('DOMContentLoaded', function() {
    deshabilitarFechaAnterior('#date_ini');
    deshabilitarFechaAnterior('#date_fin');
});

function deshabilitarFechaAnterior(id){
    const inputFecha = document.querySelector(id);
    console.log(inputFecha);
    const fechaAhora = new Date();
    const year = fechaAhora.getFullYear();
    const mes = (()=>{
        const currentMonth = fechaAhora.getMonth() + 1;
        if(currentMonth<=9){
            return `0${currentMonth}`
        }
        return currentMonth;
    })();
    const dia = (()=>{
        const currentDate = fechaAhora.getDate();
        if(currentDate<=9){
            return `0${currentDate}`
        }
        return currentDate;
    })();
    const fechaDeshabilitar = `${year}-${mes}-${dia}`;
    console.log(fechaDeshabilitar);
    inputFecha.min = fechaDeshabilitar;
}