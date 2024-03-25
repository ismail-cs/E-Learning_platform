$(document).ready(function(){
    $('#search').on('input', function(){
        let searchValue = $(this).val();
        
        if(searchValue.trim() === '') {
            $('#search-results').empty(); // Clear results if search box is empty
            return;
        }
        
        $.ajax({
            type: 'POST',
            url: 'search.php',
            data: { search: searchValue },
            success: function(response){
                let instructors = JSON.parse(response);
                let output = '';

                if(instructors.length > 0){
                    instructors.forEach(function(instructor){
                        output += `<div>
                            <h3>${instructor.name}</h3>
                            <p>Email: ${instructor.email}</p>
                            <p>Date of Birth: ${instructor.dob}</p>
                            <p>Bio: ${instructor.bio}</p>
                        </div>`;
                    });
                } else {
                    output = '<p>No instructors found</p>';
                }

                $('#search-results').html(output);
            }
        });
    });
});
