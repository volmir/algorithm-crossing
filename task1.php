<!DOCTYPE html>
<html>
    <head>
        <title>Test job</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    </head>
    <body>  
        
<style type="text/css">  
    .text_blue {
        color: blue;
    }            
    .form_input {
        padding: 20px 0px 20px 0px;
     }
</style>
        
<script type="text/javascript">    
$(function(){ 

    $('#search').on('input', function(e) {
        var search_text = $('#search').val();
        $("td").each(function(index, value) {    
            var td_text = $(this).text();         
            
            var re = new RegExp(search_text, "i");            
            td_text = td_text.replace(re, '<span class="text_blue">' + search_text + '</span>'); 
            
            $(this).html(td_text);
        });
        
        hideNotFoundVals();
    });

    $('#hide').click(function(){
        var isChecked = ($('#hide').is(':checked')) ? true : false;
        
        if (isChecked) { 
            hideNotFoundVals();
        } else {
            $("td").each(function(index, value) {
                $(this).show();
            });
        }
    });
    
    function hideNotFoundVals() {
        var isChecked = ($('#hide').is(':checked')) ? true : false;
        $("td").each(function(index, value) {
            if (isChecked) { 
                if (/<span class="text_blue">/.test($(this).html())) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            } else {   
                $(this).show();
            }
        });    
    }    
    
});
</script> 
        
    <div class="form_input">
        <input type="text" name="search" id="search">
        <input type="checkbox" name="hide" id="hide"> Скрывать строки, в которых не найдены соответствия
    </div>
        
<table border="0" id="table">
<?php

$words = ['cucumber', 'cabbage', 'carrot', 'tomato', 'apple', 'lemon', 'banana', 'orange', 'onion', 'apple'];

for ($i=0; $i<10; $i++) {
?>
<tr>
<?php
    for ($j=0; $j<10; $j++) {
?>
<td><?php echo $words[rand(0,9)]; ?></td>
<?php
    }
?>
</tr>
<?php    
}

?>
</table>
    </body>
</html>
