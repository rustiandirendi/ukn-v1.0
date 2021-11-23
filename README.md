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

1. SVG 1

        <svg viewBox="0 0 414 60" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" shape-rendering="auto">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M414 18.4992C382.91 27.4479 351.409 36.2815 289.239 36.2815C226.225 36.2815 194.719 27.2111 163.212 18.1407C131.706 9.07037 100.199 0 37.1857 0C23.3937 0 11.1061 0.434689 0 1.20938V60H414V18.4992Z" fill-opacity="0.3"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M414 33.1095C389.391 39.5656 360.236 44.6352 314.444 44.6352C251.431 44.6352 219.924 35.0333 188.417 25.4314C156.911 15.8296 125.404 6.22766 62.391 6.22766C37.2408 6.22766 17.116 7.75983 0 10.2087V60H414V33.1095Z"  fill-opacity="0.5"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M351.398 32.7438C369.375 28.485 387.351 24.2263 414 22.0228V60H0V22.0228C11.7117 21.0545 25.089 20.4778 40.889 20.4734C92.639 20.4734 118.514 26.6064 144.389 32.7394C170.264 38.8724 196.139 45.0054 247.889 45.0054C299.64 45.0054 325.519 38.8746 351.398 32.7438Z" />
        </svg>

2. SVG 2

        <svg viewBox="0 0 414 81" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" shape-rendering="auto">
                <path d="M234.586 57.8286C105.188 69.9886 0 0 0 0V80H414V0C414 0 363.984 45.6686 234.586 57.8286Z" fill-opacity="0.3"/>
                <path d="M179.977 68.4229C308.369 80 414 8 414 8V80H0V0C0 0 51.5883 56.8457 179.977 68.4229Z" fill-opacity="0.5"/>
                <path d="M207 80C321.322 80 414 0 414 0.571429V80.5714H0V0C0 0 92.6778 80 207 80Z" />
        </svg>

3. SVG 3

        <svg viewBox="0 0 414 90" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" shape-rendering="auto">
                <path d="M0 90L207 45L414 90V0L207 45L0 0V90Z" fill-opacity="0.5"/>
                <path d="M0 90H414L207 45L0 90Z"/>
        </svg>

4. SVG 4

        <svg viewBox="0 0 414 80" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" shape-rendering="auto">
                <path d="M-1.52588e-05 0L84.7729 66.4343C88.7299 69.6024 93.1035 70.7884 97.4161 69.8629L414 0V80H-1.52588e-05V0Z" />
        </svg>

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
      
