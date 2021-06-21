let salon = document.getElementById('choose-salon-customer-appointements');
if (salon) {
    salon.addEventListener('click', async (event) => {
        if (Number.isFinite(parseInt(event.currentTarget.value))) {
            let formData = {'salonId': event.currentTarget.value};
            let response = await fetch('/appointment/getAllAppointmentsBySalonIdAndUserId?salon_id='+ event.currentTarget.value);

            let result = await response.json();
            if (result.status === 200) {
                let table = document.getElementById('table-admin-appointments-body');
                table.innerHTML = '';
                for (let data in result.appointments){
                    let tableRow = document.createElement('tr');
                    let tableDataDate = document.createElement('td');
                    tableDataDate.innerText = result.appointments[data].date;
                    let tableDataEmployee = document.createElement('td');
                    tableDataEmployee.innerText = result.appointments[data].employee;
                    let tableDataCustomer = document.createElement('td');
                    tableDataCustomer.innerText = result.appointments[data].customer;
                    let tableDataService = document.createElement('td');
                    tableDataService.innerText = result.appointments[data].service;
                    let tableDataPrice = document.createElement('td');
                    tableDataPrice.innerText = result.appointments[data].servicePrice + ' RON';
                    let tableButtonDisable = document.createElement('button');
                    tableButtonDisable.classList.add('btn');
                    tableButtonDisable.id = result.appointments[data].id;
                    tableButtonDisable.onclick =  (tableButtonDisable) => {deleteAppointment(tableButtonDisable)};
                    tableButtonDisable.classList.add('btn-danger');
                    tableButtonDisable.innerText = 'Șterge';


                    tableRow.appendChild(tableDataDate);
                    tableRow.appendChild(tableDataEmployee);
                    tableRow.appendChild(tableDataCustomer);
                    tableRow.appendChild(tableDataService);
                    tableRow.appendChild(tableDataPrice);
                    tableRow.appendChild(tableButtonDisable);
                    table.appendChild(tableRow);
                }
            }
        }
    });
}

async function deleteAppointment(el){
    let formData = {
        'id': el.target.getAttribute('id'),
    };
    let response = await fetch('/appointment/deleteAppointment', {
        method: 'POST',
        body: JSON.stringify(formData),
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    });
    let result = await response.json();
    if (result) {
        window.location.reload();
    }
}
