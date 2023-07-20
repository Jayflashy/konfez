<footer class="footer">    
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="fw-bold text-center text-sm-left d-block d-sm-inline-block"> &copy; {{ date('Y') }} - {{get_setting('title')}}.</span>
        <div class="float-none float-sm-right d-block mt-1 mt-sm-0  text-center share">
            @if (get_setting('facebook') != null)
            <a href="{{ get_setting('facebook') }}" target="_blank"  type="button" class="btn facebook mx-1">
                <i class="fab fa-facebook-f"></i>
            </a>
            @endif
            @if (get_setting('instagram') != null)
            <a href="{{ get_setting('instagram') }}" type="button" class="btn btn-secondary mx-1">
                <i class="fab fa-instagram"></i>
            </a>
            @endif
            @if (get_setting('twitter') != null)
            <a href="{{ get_setting('twitter') }}" type="button" class="btn twitter mx-1">
                <i class="fab fa-twitter"></i>
            </a>
            @endif
            @if (get_setting('whatsapp') != null)
            <a href="{{ get_setting('whatsapp') }}" type="button" class="btn whatsapp mx-1">
                <i class="fab fa-whatsapp"></i>
            </a>
            @endif
        </div>
    </div>
</footer>