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

let salon = document.getElementById('salon');
salon.addEventListener('click',  async (event)=>{
    if (Number.isFinite(parseInt(event.currentTarget.value))) {

        let response = await fetch('/employeeInformation/'+ parseInt(event.currentTarget.value, 10), {
            method: 'GET',
        });

        let result = await response.json();
        if (result.status === 200){
            let employees = result.employees;
            let employeeSelect = document.getElementById('employee');
            employeeSelect.innerHTML = '<option selected>Selectează angajatul</option>';
            for(let index in employees){
                employeeSelect.innerHTML = employeeSelect.innerHTML +
                    '<option value="'+employees[index].id+'">'+employees[index].firstname +' '+ employees[index].lastname + '</option>';
            }
            document.getElementById('create-appointment-employee').style.display = "block";
        }
    }
})

let employee = document.getElementById('employee');
employee.addEventListener('click', async ()=>{
    if (Number.isFinite(parseInt(event.currentTarget.value))) {
        let response = await fetch('/service/'+ parseInt(event.currentTarget.value, 10), {
            method: 'GET',
        });

        let result = await response.json();
        if (result.status === 200){
            let services = result.services;
            let serviceSelect = document.getElementById('service');
            serviceSelect.innerHTML = ' <option selected>Selectează serviciul</option>';
            for(let index in services){
                serviceSelect.innerHTML = serviceSelect.innerHTML +
                    '<option value="'+services[index].id+'">'+services[index].name + '</option>';
            }
            document.getElementById('create-appointment-service').style.display = "block";
        }
    }
})

let service = document.getElementById('service');
service.addEventListener('click', async ()=>{
    if (Number.isFinite(parseInt(event.currentTarget.value))) {
        document.getElementById('create-appointment-date').style.display = "block";
        document.getElementById('create-appointment-hour').style.display = "block";
    }
})

