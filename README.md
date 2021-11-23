# ukn-v1.0
undangan kami nikah 

# Style & Javascript

1. CSS (import in namapengantin.css)

        @import url(https://undangankaminikah.github.io/ukn-v1.0/dist/ukn.css);
        
2. JS
        
        <script src="https://undangankaminikah.github.io/ukn-v1.0/dist/ukn.js"></script>

# CI Code

1. buka application/config/routes.php 

        $route['milea-dilan'] = 'invitation/mileadilan';
        $route['milea-dilan/invite/(:any)'] = 'invitation/mileadilan/guest/$1';
        $route['milea-dilan/invited/(:any)'] = 'invitation/mileadilan/get_guest/$1';
        
2. Buat file Controllers application/controllers/invitation/

        private $idInvitation = "2"; /* Id Invitatio cek admin */

        function __construct(){
                parent::__construct();
                $this->load->model('invitation/M_Invitation');
        }

        public function index()
        {
                $data = array(
                                'rsvp'	=> null,
                                'id_guest'	=> 0,
                                'id_invitation'	=> $this->idInvitation,	
                                'name_guest'    => "",
                                'address_guest' => ""
                        );
                $this->load->view('invitation/mileadilan',$data);
        }

        public function guest($name)
        {
                $str = explode("-" , $name);
                $name_invite = implode(" ",$str);
                $data = array(
                                'rsvp'	=> null,				
                                'id_guest'	=> 0,
                                'id_invitation'	=> $this->idInvitation,
                                'name_guest'    => ucwords($name_invite),
                                'address_guest' => "Di Tempat"
                        );
                $this->load->view('invitation/mileadilan',$data);
        }

        public function get_guest($kode_guest)
        {
                $id_guest = $this->M_Invitation->IdGuest($kode_guest);
                $rsvp = $this->M_Invitation->CekRsvp($id_guest);
                $where = array('kode_guest' => $kode_guest);
                $dataquery = $this->M_Invitation->get_guest_name($where)->result();
                foreach ($dataquery as $query) {
                        $data = array(
                                'rsvp'	=> $rsvp,
                                'kode_guest' => $kode_guest,
                                'id_invitation'	=> $this->idInvitation,
                                'id_guest'	=> $query->id_guest,		
                                'name_guest'    => $query->name_guest,
                                'address_guest' => $query->address_guest
                        );
                }
                $this->load->view('invitation/mileadilan',$data);
        }
        
2. Buat file view application/view/invitation/

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

2. Buat file css assets/invitation/ buat forder dengan nama calon pengantin

        @import url('https://fonts.googleapis.com/css2?family=Allura&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        @import url(https://undangankaminikah.github.io/ukn-v1.0/dist/ukn.css);

        :root{
                --bg-first-color:#74583E;
                --bg-second-color:#ffffff;
                --font-serif-family:'Montserrat', sans-serif;
                --font-handwriting-family: 'Allura', cursive;
                --font-first-color:#ffffff;
                --font-second-color:#454545;
                --font-third-color:#74583E;
                --btn-first-color:#74583E;
                --btn-first-color-font:#ffffff;
                --btn-first-hover-color:#7b5837;
                --btn-first-color-rgb:rgba(123, 86, 55, 0.5);
                --btn-second-color:#ffffff;
                --btn-second-color-font:#74583E;
                --btn-second-hover-color:#fcfcfc;
                --btn-second-color-rgb:rgba(252, 252, 252, 0.5);
        }

        .modal-content{
                background: linear-gradient(
                                          rgba(255, 255, 255, 0.7),
                                          rgba(255, 255, 255, 0.7)
                                        ),url(../img/gall1.jpg);
                background-size: cover;
                background-position: center; 
        }

# Logo Payment
        
<img width="100px" src="https://undangankaminikah.github.io/ukn-v1.0/bank/bca.png">

       <img src="https://undangankaminikah.github.io/ukn-v1.0/bank/bca.png">
       
<img width="100px" src="https://undangankaminikah.github.io/ukn-v1.0/bank/bii.png">

      <img src="https://undangankaminikah.github.io/ukn-v1.0/bank/bii.png">
      
<img width="100px" src="https://undangankaminikah.github.io/ukn-v1.0/bank/bjb.png">

      <img src="https://undangankaminikah.github.io/ukn-v1.0/bank/bjb.png">
   
<img width="100px" src="https://undangankaminikah.github.io/ukn-v1.0/bank/bni.png">

      <img src="https://undangankaminikah.github.io/ukn-v1.0/bank/bni.png">
      
<img width="100px" src="https://undangankaminikah.github.io/ukn-v1.0/bank/bri.png">

      <img src="https://undangankaminikah.github.io/ukn-v1.0/bank/bri.png">

<img width="100px" src="https://undangankaminikah.github.io/ukn-v1.0/bank/bukopin.png">

      <img src="https://undangankaminikah.github.io/ukn-v1.0/bank/bukopin.png">
      
<img width="100px" src="https://undangankaminikah.github.io/ukn-v1.0/bank/danamon.png">

      <img src="https://undangankaminikah.github.io/ukn-v1.0/bank/danamon.png">
      
<img width="100px" src="https://undangankaminikah.github.io/ukn-v1.0/bank/gopay.png">

      <img src="https://undangankaminikah.github.io/ukn-v1.0/bank/gopay.png">
      
<img width="100px" src="https://undangankaminikah.github.io/ukn-v1.0/bank/hsbc.png">

      <img src="https://undangankaminikah.github.io/ukn-v1.0/bank/hsbc.png">
      
<img width="100px" src="https://undangankaminikah.github.io/ukn-v1.0/bank/Jatim.png">

      <img src="https://undangankaminikah.github.io/ukn-v1.0/bank/Jatim.png">
      
<img width="100px" src="https://undangankaminikah.github.io/ukn-v1.0/bank/link-aja.png">

      <img src="https://undangankaminikah.github.io/ukn-v1.0/bank/link-aja.png">
      
<img width="100px" src="https://undangankaminikah.github.io/ukn-v1.0/bank/mandiri.png">

      <img src="https://undangankaminikah.github.io/ukn-v1.0/bank/mandiri.png">
      
<img width="100px" src="https://undangankaminikah.github.io/ukn-v1.0/bank/mandiri-syariah.png">

      <img src="https://undangankaminikah.github.io/ukn-v1.0/bank/mandiri-syariah.png">
      
<img width="100px" src="https://undangankaminikah.github.io/ukn-v1.0/bank/mega.png">

      <img src="https://undangankaminikah.github.io/ukn-v1.0/bank/mega.png">
      
<img width="100px" src="https://undangankaminikah.github.io/ukn-v1.0/bank/ovo.png">

      <img src="https://undangankaminikah.github.io/ukn-v1.0/bank/ovo.png">
      
<img width="100px" src="https://undangankaminikah.github.io/ukn-v1.0/bank/uob.png">

      <img src="https://undangankaminikah.github.io/ukn-v1.0/bank/uob.png">
      
