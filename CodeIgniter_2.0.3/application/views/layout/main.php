<?php $this->load->view('layout/header');?>
<?php
if ($this->dx_auth->is_logged_in()) {
    $this->load->view('layout/navi');
}
?>
<div id="main">
<?php echo $content; ?>
</div>

<?php $this->load->view('layout/footer');?>