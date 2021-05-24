let salon = document.getElementById('choose-salon-admin-appointements');
if (salon) {
    salon.addEventListener('click', async (event) => {
        if (Number.isFinite(parseInt(event.currentTarget.value))) {
            let formData = {'salonId': event.currentTarget.value};
            let response = await fetch('/api/appointment/getAllAppointmentsBySalonId?salon_id='+ event.currentTarget.value);

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

                    tableRow.appendChild(tableDataDate);
                    tableRow.appendChild(tableDataEmployee);
                    tableRow.appendChild(tableDataCustomer);
                    tableRow.appendChild(tableDataService);
                    table.appendChild(tableRow);
                }
            }
        }
    });
}
