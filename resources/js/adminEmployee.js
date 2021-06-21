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
                    let tableEnable = document.createElement('td');

                    if (result.employees[data].employee_status === 'disabled') {
                        let tableButtonEnable = document.createElement('button');
                        tableButtonEnable.classList.add('btn');
                        tableButtonEnable.id = result.employees[data].employee_information_id;
                        tableButtonEnable.classList.add('btn-primary');
                        tableButtonEnable.onclick = (tableButtonEnable) => {enableEmployee(tableButtonEnable)};
                        tableButtonEnable.innerText = 'Enable';

                        tableEnable.appendChild(tableButtonEnable);
                    }
                    if (result.employees[data].employee_status === 'enabled') {
                        let tableButtonDisable = document.createElement('button');
                        tableButtonDisable.classList.add('btn');
                        tableButtonDisable.id = result.employees[data].employee_information_id;
                        tableButtonDisable.onclick =  (tableButtonDisable) => {disableEmployee(tableButtonDisable)};
                        tableButtonDisable.classList.add('btn-danger');
                        tableButtonDisable.innerText = 'Disable';

                        tableEnable.appendChild(tableButtonDisable);
                    }

                    tableRow.appendChild(tableDataFirstName);
                    tableRow.appendChild(tableDataLastName);
                    tableRow.appendChild(tableDataAddress);
                    tableRow.appendChild(tableDataPhoneNumber);
                    tableRow.appendChild(tableDataEarned);
                    tableRow.appendChild(tableEnable);
                    table.appendChild(tableRow);
                }
            }
        }
    });
}

async function enableEmployee(el){
    let formData = {
        'id': el.target.getAttribute('id'),
    };
    let response = await fetch('/employee/enableEmployee', {
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

async function disableEmployee(el){
    let formData = {
        'id': el.target.getAttribute('id'),
    };
    let response = await fetch('/employee/disableEmployee', {
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

let form = document.getElementById('add-employee-form');
if (form) {
    form.onsubmit = async (e) => {
        e.preventDefault();

        let formData = {
            'firstname': document.getElementById('employee-firstname').value,
            'lastname': document.getElementById('employee-lastname').value,
            'email': document.getElementById('employee-email').value,
            'password': document.getElementById('employee-password').value,
            'address': document.getElementById('employee-address').value,
            'city': document.getElementById('employee-city').value,
            'salon': document.getElementById('employee-salon').value,
            'phoneNumber': document.getElementById('employee-phone').value,
        };
        let response = await fetch('/admin/addEmployee', {
            method: 'POST',
            body: JSON.stringify(formData),
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        });

        let result = await response.json();
        if (result.status === 200){
            window.location.reload();
        }
    }
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


