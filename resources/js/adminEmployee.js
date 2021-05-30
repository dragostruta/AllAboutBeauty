let salon = document.getElementById('choose-salon-admin-employee');
if (salon) {
    salon.addEventListener('click', async (event) => {
        if (Number.isFinite(parseInt(event.currentTarget.value))) {
            let formData = {'salonId': event.currentTarget.value};
            let response = await fetch('/api/employee/getAllEmployeesBySalon?salon_id='+ event.currentTarget.value);

            let result = await response.json();
            if (result.status === 200) {
                let table = document.getElementById('table-body-admin-employee');
                table.innerHTML = '';
                for (let data in result.employees){
                    let tableRow = document.createElement('tr');
                    let tableDataFirstName = document.createElement('td');
                    tableDataFirstName.innerText = result.employees[data].firstname;
                    let tableDataLastName = document.createElement('td');
                    tableDataLastName.innerText = result.employees[data].lastname;
                    let tableDataAddress = document.createElement('td');
                    tableDataAddress.innerText = result.employees[data].address;
                    let tableDataPhoneNumber = document.createElement('td');
                    tableDataPhoneNumber.innerText = result.employees[data].phone_number;
                    let tableDataEarned = document.createElement('td');
                    tableDataEarned.innerText = result.employees[data].earned;

                    tableRow.appendChild(tableDataFirstName);
                    tableRow.appendChild(tableDataLastName);
                    tableRow.appendChild(tableDataAddress);
                    tableRow.appendChild(tableDataPhoneNumber);
                    tableRow.appendChild(tableDataEarned);
                    table.appendChild(tableRow);
                }
            }
        }
    });
}

let exportButton = document.getElementById('export-employee-info');
if (exportButton) {
    let salon = document.getElementById('choose-salon-admin-employee');
    exportButton.addEventListener('click', async (event) => {
        let formData = {'salonId': salon.value};
        let response = await fetch('/admin/exportEmployeeInfo', {
            method: 'POST',
            body: JSON.stringify(formData),
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        });

        let result = await response.json();
        if (result.status === 200){
            var link = document.createElement("a");
            link.download = result.name;
            link.href = result.path;
            link.click();

            link.remove();
        }
    });
}
