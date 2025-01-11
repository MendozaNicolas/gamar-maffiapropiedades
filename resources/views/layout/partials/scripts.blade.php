<!-- Javascript -->
<script type="text/javascript" src="{{asset('vendor/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/swiper-bundle.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/carousel.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/plugin.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/jquery.nice-select.min.js')}}"></script>
{{-- <script type="text/javascript" src="{{asset('vendor/rangle-slider.js')}}"></script> --}}
<script type="text/javascript" src="{{asset('vendor/countto.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/shortcodes.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/animation_heading.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/main.js')}}"></script>
<script>
    options = {
        style: 'decimal'
    };
    formatUSD = new Intl.NumberFormat('de-DE', options);
    cleaveConfig = {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand',
        numeralDecimalMark: ',',
        delimiter: '.'
    };
</script>
@stack('scripts')
