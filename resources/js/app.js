/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./home');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

// Home //
let salon = document.getElementById('create-appointment-salon-field');
salon.addEventListener('click',  async (event)=>{
    if (Number.isFinite(parseInt(event.currentTarget.value))) {
        let formData = {'salonId' : event.currentTarget.value};
        let response = await fetch('/service/getAllServicesBySalon', {
            method: 'POST',
            body: JSON.stringify(formData),
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        });

        let result = await response.json();
        if (result.status === 200){
            let services = result.services;
            let servicesSelect = document.getElementById('create-appointment-service-field');
            servicesSelect.innerHTML = '<option selected>Selectează serviciul</option>';
            for(let index in services){
                servicesSelect.innerHTML = servicesSelect.innerHTML +
                    '<option value="'+services[index].id+'">'+services[index].name + '</option>';
            }
            document.getElementById('create-appointment-service').style.display = "block";
        }
    }
});

let service = document.getElementById('create-appointment-service-field');
service.addEventListener('click', async (event)=>{
    if (Number.isFinite(parseInt(event.currentTarget.value))) {
        let formData = {'serviceId' : event.currentTarget.value};
        let response = await fetch('/employeeInformation/getAllEmployeesByService', {
            method: 'POST',
            body: JSON.stringify(formData),
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        });

        let result = await response.json();
        if (result.status === 200){
            let employees = result.employees;
            let employeeSelect = document.getElementById('create-appointment-employee-field');
            employeeSelect.innerHTML = ' <option selected>Selectează angajatul</option>';
            for(let index in employees){
                employeeSelect.innerHTML = employeeSelect.innerHTML +
                    '<option value="'+employees[index].id+'">'+employees[index].firstname +' '+ employees[index].lastname + '</option>';
            }
            document.getElementById('create-appointment-employee').style.display = "block";
        }
    }
});

let employee = document.getElementById('create-appointment-employee-field');
employee.addEventListener('click', async (event)=>{
    if (Number.isFinite(parseInt(event.currentTarget.value))) {
        document.getElementById('create-appointment-date').style.display = "block";
        document.getElementById('create-appointment-hour').style.display = "block";
    }
});
employee.addEventListener('change', ()=>{
    let date = document.getElementById('create-appointment-date-field');
    date.value = "";
})

let hour = document.getElementById('create-appointment-date-field');
hour.addEventListener('change', async ()=>{
    let date = document.getElementById('create-appointment-date-field');
    let employeeId = document.getElementById('create-appointment-employee-field');
    if (date.value != '') {
        let formData = {
            'date': date.value,
            'employeeId': employeeId.value
        };
        let response = await fetch('/appointment/getAllAvailableHoursByDate', {
            method: 'POST',
            body: JSON.stringify(formData),
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        });

        let result = await response.json();
        if (result.status === 200) {
            let hours = result.hours;
            let hoursSelect = document.getElementById('create-appointment-hour-field');
            hoursSelect.innerHTML = '<option selected>Selectează ora dorită</option>';
            for (let index in hours) {
                hoursSelect.innerHTML = hoursSelect.innerHTML +
                    '<option value="' + hours[index] + '">' + hours[index] + '</option>';
            }
            document.getElementById('create-appointment-submit').style.display = "block";
        }
    }
});

let form = document.getElementById('create-appointment-form-field');
form.onsubmit = async (e)=> {
    e.preventDefault();
    let salon = document.getElementById('create-appointment-salon-field');
    let service = document.getElementById('create-appointment-service-field');
    let employee = document.getElementById('create-appointment-employee-field');
    let date = document.getElementById('create-appointment-date-field');
    let hour = document.getElementById('create-appointment-hour-field');

    let formData = {
        'salonId': salon.value,
        'serviceId': service.value,
        'employeeId': employee.value,
        'date': date.value+' '+hour.value+':00'
    };
    let response = await fetch('/appointment/createAppointment', {
        method: 'POST',
        body: JSON.stringify(formData),
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    });

    let result = await response.json();
    if (result.status === 200) {
        document.getElementById('appointment-success').style.display = 'block';
        document.getElementById('create-appointment-submit').style.display = 'none';
        service.innerHTML = '<option selected>Selectează serviciul</option>';
        document.getElementById('create-appointment-service').style.display = 'none';
        employee.innerHTML = '<option selected>Selectează angajatul</option>';
        document.getElementById('create-appointment-employee').style.display = 'none';
        document.getElementById('create-appointment-date').style.display = 'none';
        document.getElementById('create-appointment-hour').style.display = 'none';
        salon.innerHTML = salon.innerHTML.slice(0, 7) + ' selected ' + salon.innerHTML.slice(7);
        date.value = "";
        hour.innerHTML = '<option selected>Selectează ora dorită</option>';
    }
};

let appointmentSuccessClose = document.getElementById('appointment-success-close');
appointmentSuccessClose.addEventListener('click', (event)=>{
    event.currentTarget.style.display = 'none';
});

