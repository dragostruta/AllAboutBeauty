let salonRequest = document.getElementById('accept-salon-request');
if (salonRequest) {
    salonRequest.addEventListener('click', async (event) => {
            let formData = {
                'email': salonRequest.getAttribute('data-email'),
                'id': salonRequest.getAttribute('data-id'),
            };
            let response = await fetch('/admin/acceptSalonRequest', {
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
    });
}

let salonRequestDelete = document.getElementById('delete-salon-request');
if (salonRequestDelete) {
    salonRequestDelete.addEventListener('click', async (event) => {
        let formData = {
            'id': salonRequestDelete.getAttribute('data-id'),
        };
        let response = await fetch('/admin/deleteSalonRequest', {
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
    });
}

let exportButton = document.getElementById('export-salon-requests');
if (exportButton) {
    exportButton.addEventListener('click', async (event) => {
        let formData = {};
        let response = await fetch('/admin/exportExcel', {
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

