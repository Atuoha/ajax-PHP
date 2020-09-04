$(document).ready(function(){

    $('#search').keyup(function(e){
        const search = e.target.value;  // collecting input

        // ajax
        $.ajax({
            url: 'search.php',
            data: {search:search},
            type: 'POST',
            success: function(data){

                if(!data.error){
                    // document.getElementById('result').style.display = "block";
                    $('#result').html(data)


                }
            }

        })

        console.log(search)
    });

// Add item   // This uses post function not the .ajax function
    $('#form').submit(function(e){
        e.preventDefault();
        const postData =  $(this).serialize();
        const url = $(this).attr('action');

        $.post(url,postData,function(callback_result){
            // $('#add_results').html(callback_result)
            $("#form").trigger("reset"); 
            const div = document.createElement('div');
            div.className = 'alert alert-success';
            div.appendChild(document.createTextNode('POST ADD SUCCESS'));
            document.querySelector('#form').appendChild(div);
            setTimeout(() => {
            const element =  document.querySelector('.alert');
            element.style.display = 'none';
            }, 2000);

        })
    })



// Set interval for updateField
setInterval(function(){
    updateField();
},500);



// Display Items
function updateField(){
$.ajax({
    url: 'display.php',
    type: 'GET',
    success: function(data){

        if(!data.error){
            $('#add_results').html(data);
        }
    }
})
}



















})