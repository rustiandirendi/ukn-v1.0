<?php $this->load->view('invitation/_partials/head'); ?>
<?php $this->load->view('invitation/_partials/favicon'); ?>

<!--Title Undangan-->
<title>Milea & Dilan</title>

<!--Meta Property-->
<meta property="og:type" content="website" />
<meta property="og:title" content="Milea & Dilan" />
<meta property="og:description" content="Undangan Pernikahan Milea & Dilan" />
<meta property="og:url" content="https://www.undangankaminikah.com/milea-dilan/" />
<meta property="og:image" content="<?php echo base_url() ?>assets/invitation/nabilaahmad/img/webimg.jpg" />

<?php $this->load->view('invitation/_partials/css'); ?>
<!--Custom CSS-->

<link rel="stylesheet" href="<?php echo base_url() ?>assets/invitation/mileadilan/css/mileadilan.css">

<?php $this->load->view('invitation/_partials/body'); ?>
<div class="modal fade" id="weddingPopup" tabindex="-1" aria-labelledby="weddingPopup" aria-hidden="true">
	<div class="modal-dialog modal-fullscreen">
		<div class="modal-content">
			<div class="modal-body d-flex align-items-center flex-column">
				<div class="mt-5 p-2 wedding-modal-bride">
					<p>Wedding Invitation</p>
					<h1>Nabila & Ahmad</h1>
				</div>
				<?php if($name_guest != ""): ?>
					<div class="my-auto p-2 wedding-modal-guest">
						<p class="wgky">Kepada Yth. Bapak/ibu/Saudara/i</p>
						<h1><?php echo $name_guest; ?></h1>
						<p><?php echo $address_guest; ?></p>
					</div>
				<?php endif; ?>
				<div class="mt-auto mb-5 p-2 d-grid gap-2">
					<button class="btn btn-first-wedding px-5" data-bs-dismiss="modal" onclick="playAudio()"><i class="bi bi-heart-fill"></i>&ensp;Open Invitation</button>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('invitation/_partials/js'); ?>
<?php $this->load->view('invitation/_partials/bodyend'); ?>