<?php if ($this->session->has_userdata('success')) { ?>
<script type="text/javascript">
  addEventListener('load',function myfunction(){
    Lobibox.notify('success', {
  		pauseDelayOnHover: true,
  		size: 'mini',
  		rounded: true,
  		icon: 'bx bx-check-circle',
  		delayIndicator: true,
  		continueDelayOnInactiveTab: false,
  		position: 'top right',
  		msg: '<?=$this->session->flashdata('success');?>'
  	});
  });
</script>
<p></p>
<?php } ?>
<?php if ($this->session->has_userdata('error')) { ?>
  <script type="text/javascript">
    addEventListener('load',function myfunction(){
      Lobibox.notify('warning', {
    		pauseDelayOnHover: true,
    		size: 'mini',
    		rounded: true,
    		delayIndicator: true,
    		icon: 'bx bx-error',
    		continueDelayOnInactiveTab: false,
    		position: 'top right',
    		msg: '<?=$this->session->flashdata('error');?>'
    	});
    });
  </script>
<p></p>
<?php } ?>
