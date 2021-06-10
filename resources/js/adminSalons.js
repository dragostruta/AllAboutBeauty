async function deleteSalon(){
        let formData = {
            'id': this.getAttribute('data-id'),
        };
        let response = await fetch('/admin/deleteSalon', {
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
