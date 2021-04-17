// DASHBOARD //

let calendar = document.getElementById('calendar');
if (calendar) {
    let myEvents = [];

    document.addEventListener('DOMContentLoaded', async function () {
        var calendarEl = document.getElementById('calendar');

        let response = await fetch('/appointment/getAllAppointmentsByEmployeeId', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        });

        let result = await response.json();
        if (result.status === 200) {
            let appointments = result.appointments;
            for(let index in appointments){
                myEvents.push({
                    title: appointments[index].service.name + ' ' + appointments[index].customer,
                    start:  appointments[index].date,
                    allDay: false
                });
            }
        }
        var calendar = new FullCalendar.Calendar(calendarEl, {
            locale: 'ro',
            initialView: 'dayGridMonth',
            titleFormat: {year: 'numeric', month: '2-digit', day: '2-digit'},
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,listWeek',
            },
            events: myEvents,
            eventTimeFormat: { // like '14:30:00'
                hour: '2-digit',
                minute: '2-digit',
                meridiem: false,
                hour12: false,
            },
        });
        calendar.render();
    });
}
