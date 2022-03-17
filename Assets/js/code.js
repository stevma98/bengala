function queriesAll(){
    $.ajax({
    url : '',
    type : 'GET',
    data: $('#ID_MASCOTA').val(),
    success : function(response){
        let tasks = JSON.parse(response);
        let template = '';
        tasks.forEach(task=>{
            template += `
            <tr taskId=${task.id}>
                <td>${task.id}</td>
                <td><a href="#" class="task-item">${task.name}</a></td>
                <td>${task.description}</td>
                <td>
                    <button class="task-delete btn btn-danger">
                        Delete
                    </button>
                </td>
            </tr>
            `
            })
        $('#tasks').html(template);
        console.log(response);
    }
});
}