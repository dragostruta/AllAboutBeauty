let form = document.getElementById('edit-user-form');
if (form) {
    form.onsubmit = async (e) => {
        e.preventDefault();
        let firstname = document.getElementById('inputFirstName');
        let lastname = document.getElementById('inputLastName');
        let email = document.getElementById('inputEmail');
        let password = document.getElementById('inputPassword');

        let formData = {
            'firstname': firstname.value,
            'lastname': lastname.value,
            'email': email.value,
            'password': password.value ?? null,
        };
        let response = await fetch('/editUser', {
            method: 'POST',
            body: JSON.stringify(formData),
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        });

        let result = await response.json();
        if (result.status === 200){
            window.location.replace("/editUserSuccess");
        } else {
            window.location.replace("/editUserFailed");
        }
    };
}
