let appointmentSuccessClose = document.getElementById('appointment-success-close');
appointmentSuccessClose.addEventListener('click', (event)=>{
    event.currentTarget.style.display = 'none';
});

$(document).ready(function(){
    var down = false;

    $('#bell').click(async function(e){
        let response = await fetch('/appointment/getAllAppointmentsByUserId', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        });

        let result = await response.json();
        if (result.status === 200){
            let appointments = result.appointments;
            let box = document.getElementById('box');
            box.innerHTML = '<h2>Programări - <span>'+ appointments.length +'</span></h2>';
            for(let index in appointments){
                let notificationItem = document.createElement('div');
                notificationItem.setAttribute('class', 'notifications-item');

                let boxText = document.createElement('div');
                boxText.setAttribute('class', 'text');

                let boxTextEmployee = document.createElement('h4');
                boxTextEmployee.innerText = appointments[index].employee;

                let boxTextDate = document.createElement('div');
                boxTextDate.innerText = 'Data: ' + appointments[index].date;

                let boxTextService = document.createElement('div');
                boxTextService.innerText = 'Serviciu: '+ appointments[index].service.name;

                let boxTextServicePrice = document.createElement('div');
                boxTextServicePrice.innerText = 'Pret: '+ appointments[index].service.price + ' lei';


                boxText.appendChild(boxTextEmployee);
                boxText.appendChild(boxTextDate);
                boxText.appendChild(boxTextService);
                boxText.appendChild(boxTextServicePrice);
                notificationItem.appendChild(boxText);
                box.appendChild(notificationItem);
            }
        }

        var color = $(this).text();
        if(down){
            $('#box').css('height','0px');
            $('#box').css('opacity','0');
            down = false;
        }else{
            $('#box').css('height','auto');
            $('#box').css('opacity','1');
            down = true;
        }
    });

    window.addEventListener('click', ()=>{
        if (down){
            $('#box').css('height','0px');
            $('#box').css('opacity','0');
            down = false;
        }
    })
});
