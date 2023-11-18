function updateOrder(data) {  
    $.ajax({  
        url:"/tasks/update-priority",  
        type:'post',  
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:{position:data},  
        success:function(){   
            location.reload(false);
        }  
    })  
}  

$( ".row-position" ).sortable({  
    delay: 150,  
    stop: function() {  
        var selectedData = new Array();  
        $('.row-position>tr').each(function() {  
            selectedData.push($(this).attr("id"));  
        });  
        updateOrder(selectedData);  
    }  
});  

// ##############
function updateFormAction() {
    var selectedProjectId = document.getElementById('projectSelect').value;
    var form = document.getElementById('projectForm');
    // form.action = '{{ route("tasks.index") }}';
    form.submit();
}