<div class="users form">

<?php   echo $this->Form->create('User', array('action' => 'login')); ?>
    
       
    <?php
        echo $this->Form->input('email', array('div' => false, 'label' => false));
        echo $this->Form->input('password', array('div' => false, 'label' => false));
    ?>
    
<?php echo $this->Form->submit('/images/login.png', array('div'=> false, 'style'=>'margin: 8px 0px 0px 5px')); ?>
</div>

