<!-- jQuery -->
<script src="{{ asset('dashboard_assets/js/jquery.min.js')}}"></script>
<script src="{{ asset('dashboard_assets/js/bootstrap.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/momentjs/2.18.1/moment.min.js"></script>
<script src="https://rawgit.com/tempusdominus/bootstrap-4/master/build/js/tempusdominus-bootstrap-4.js"></script>
   
 <!-- LightBox Gallery -->
<!-- <script src="{{ asset('frontend_assets/dist/js/lightbox-plus-jquery.min.js')}} "></script> -->


<!-- Image Upload Plugin Start -->
  <script src="{{ asset('dashboard_assets/css/bootstrap-fileinput-master/js/plugins/sortable.js') }} " type="text/javascript"></script>
  <script src="{{ asset('dashboard_assets/css/bootstrap-fileinput-master/js/fileinput.js')}}" type="text/javascript"></script>
  <script src="{{ asset('dashboard_assets/css/bootstrap-fileinput-master/js/locales/fr.js')}}" type="text/javascript"></script>
  <script src="{{ asset('dashboard_assets/css/bootstrap-fileinput-master/js/locales/es.js')}}" type="text/javascript"></script>
  <script src="{{ asset('dashboard_assets/css/bootstrap-fileinput-master/themes/explorer/theme.js')}}" type="text/javascript"></script>
<!-- Image Upload Plugin End -->

<!-- Custom Theme Scripts-->
<script src="{{ asset('dashboard_assets/js/custom.min.js') }}"></script>



<!-- editor start -->

<script src="http://cdn.tinymce.com/4.3/tinymce.min.js"></script> 
  <script>
    tinymce.init({
  selector: 'textarea',
  height: 500,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code noneditable'
  ],
  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  content_style: '.collapse {display: block !important;}',
  content_css: [
    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    '//www.tinymce.com/css/codepen.min.css',
    '//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'
  ]
});
  
  </script>
  
<!-- editor end -->