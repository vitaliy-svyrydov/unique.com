<section>
    <div class="inner_wrapper">
        <div class="container">
            <h2>{{ $page->name }}</h2>
            <div class="inner_section">
                <div class="row">
                    <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right"> {!! Html::image('assets/img/'.$page->images,'',['class' => 'img-circle delay-03s animated wow zoomIn']) !!}</div>
                    <div class=" col-lg-7 col-md-7 col-sm-7 col-xs-12 pull-left">
                        <div class=" delay-01s animated fadeInDown wow animated">
                            {!! $page->text !!}
                        </div>
                        <div class="work_bottom"> <span>Go to the main page..</span> <a href="{{ route('main') }}" class="contact_btn">Back</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>