let exportButton = document.getElementById('export-employee-info-manager');
if (exportButton) {
    exportButton.addEventListener('click', async (event) => {
        let formData = {};
        let response = await fetch('/manager/exportEmployeeInfo', {
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
