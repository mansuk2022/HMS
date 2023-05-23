<!-- Required vendors -->
<script src="{{asset('backend/vendor/global/global.min.j')}}s"></script>
<script src="{{asset('backend/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('backend/js/custom.min.js')}}"></script>
<script src="{{asset('backend/js/deznav-init.js')}}"></script>

<script src="{{asset('backend/vendor/pickadate/picker.js')}}"></script>
<script src="{{asset('backend/vendor/pickadate/picker.time.js')}}"></script>
<script src="{{asset('backend/vendor/pickadate/picker.date.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


<!-- Daterangepicker -->
<!-- momment js is must -->
<script src="{{asset('backend/vendor/moment/moment.min.js')}}"></script>
<script src="{{asset('backend/vendor/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- clockpicker -->
<script src="{{asset('backend/vendor/clockpicker/js/bootstrap-clockpicker.min.js')}}"></script>
<!-- asColorPicker -->
<!-- Material color picker -->
<script src="{{asset('backend/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}">
</script>
<!-- pickdate -->
<script src="{{asset('backend/vendor/pickadate/picker.js')}}"></script>
<script src="{{asset('backend/vendor/pickadate/picker.time.js')}}"></script>
<script src="{{asset('backend/vendor/pickadate/picker.date.js')}}"></script>



<!-- Daterangepicker -->
<script src="{{asset('backend/js/plugins-init/bs-daterange-picker-init.js')}}"></script>
<!-- Clockpicker init -->
<script src="{{asset('backend/js/plugins-init/clock-picker-init.js')}}"></script>
<!-- asColorPicker init -->
<script src="{{asset('backend/js/plugins-init/jquery-asColorPicker.init.js')}}"></script>
<!-- Material color picker init -->
<script src="{{asset('backend/js/plugins-init/material-date-picker-init.js')}}"></script>
<!-- Pickdate -->
<script src="{{asset('backend/js/plugins-init/pickadate-init.js')}}"></script>

<!-- Summernote -->
<script src="{{asset('backend/vendor/summernote/js/summernote.min.js')}}"></script>
<!-- Summernote init -->
<script src="{{asset('backend/js/plugins-init/summernote-init.js')}}"></script>

<script src="{{asset('backend/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/js/plugins-init/datatables.init.js')}}"></script>
<script src="{{asset('backend/vendor/owl-carousel/owl.carousel.js')}} "></script>
@yield('script')

<script>
    function assignedDoctor()
		{
		
			/*  testimonial one function by = owl.carousel.js */
			jQuery('.assigned-doctor').owlCarousel({
				loop:false,
				margin:30,
				nav:true,
				autoplaySpeed: 3000,
				navSpeed: 3000,
				paginationSpeed: 3000,
				slideSpeed: 3000,
				smartSpeed: 3000,
				autoplay: false,
				dots: false,
				navText: ['<i class="fa fa-caret-left"></i>', '<i class="fa fa-caret-right"></i>'],
				responsive:{
					0:{
						items:1
					},
					576:{
						items:2
					},	
					767:{
						items:3
					},			
					991:{
						items:2
					},
					1200:{
						items:3
					},
					1600:{
						items:5
					}
				}
			})
		}
		
		jQuery(window).on('load',function(){
			setTimeout(function(){
				assignedDoctor();
			}, 1000); 
		});
		
</script>
<script>
    @if(Session::has('message'))
    toastr.options = {
        "closeButton": true
        , "progressBar": true
    }
    toastr.success("{{ session('message') }}");
    @endif

    @if(Session::has('error'))
    toastr.options = {
        "closeButton": true
        , "progressBar": true
    }
    toastr.error("{{ session('error') }}");
    @endif

    @if(Session::has('info'))
    toastr.options = {
        "closeButton": true
        , "progressBar": true
    }
    toastr.info("{{ session('info') }}");
    @endif

    @if(Session::has('warning'))
    toastr.options = {
        "closeButton": true
        , "progressBar": true
    }
    toastr.warning("{{ session('warning') }}");
    @endif

</script>
