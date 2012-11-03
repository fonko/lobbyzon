<script>




$( function(){

	var primero = $('input[type=radio][value="currency<?php echo $i."b"; ?>"]').data('value');
	$('#output<?php echo $i; ?>').html( primero );
    
    $('#currency<?php echo $i; ?>').on('click', function(){
        var exchangeRate = $('input[type=radio]:checked').data('value');
       
        
        $('#output<?php echo $i; ?>').html( exchangeRate );
    });
        $('#currency<?php echo $i."b"; ?>').on('click', function(){
        var exchangeRate = $('input[type=radio]:checked').data('value');
       
        
        $('#output<?php echo $i; ?>').html( exchangeRate );
    });
    
});



</script>

<?php echo $this->Js->writeBuffer();?>