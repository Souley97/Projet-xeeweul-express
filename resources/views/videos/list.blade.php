{{-- head --}}

@include('videos.lecture.head')
{{-- Fin head --}}

{{-- HEader --}}
@include('videos.lecture.header')
{{-- Fin HEader --}}

{{-- sidebar --}}
@include('videos.lecture.sidebar')
{{-- Fin sidebar --}}

{{-- Main --}}
<div id="site-main" class="site-main w-full">
    <div class="section-player bg-black mb-4">
        {{-- lecture video show --}}
        {{-- fin lecture video show --}}
        <div class="page-main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-1 col-sm-1 ">
                        {{-- poste Createuer et description --}}
                        {{-- Fin poste Createuer et description --}}

                        {{-- list des video --}}
                        @include('videos.lecture.list')
                        {{-- Fin list des video --}}

                    </div>
                </div>
                
                {{-- annoces --}}
                @include('videos.lecture.annoce')
                {{-- fin annoces --}}

            </div>
        </div>
    </div>
</div>
{{-- Footer --}}

@include('videos.lecture.footer')
{{-- fin Footer --}}

{{-- Foot --}}

