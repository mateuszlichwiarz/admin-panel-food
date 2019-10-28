const itemDelete = document.getElementById('item');

if(itemDelete) {
    itemDelete.addEventListner('click', e=>{
        if(e.target.className === 'btn btn-danger delete-item') {
            if(confirm('Are you sure?')) {
                const id = e.target.getAttribute('data-id');

                fetch(`/admin/food/${id}`, {
                    method: 'DELETE'
                }).then(res => window.location.reload());
            }
        }
    });
}