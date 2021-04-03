<div class="container-fruid mb-1">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center breaking-news {{Auth::user()->theme->setting == 1 ? '' : 'bg-white' }}" {{Auth::user()->theme->setting == 1 ? 'style=background-color:#283046!important' : '' }}>
                <div class="d-flex flex-row flex-grow-1 flex-fill justify-content-center bg-danger py-1 text-white px-1 news"><span class="d-flex align-items-center">&nbsp;News</span></div>
                <marquee class="news-scroll" behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
                    <a href="#" onclick="event.preventDefault()">
                        {{ App\Models\News::get()->first()->news }}
                    </a>
                </marquee>
            </div>
        </div>
    </div>
</div>
<style>
.news {
    width: 160px
}

.news-scroll a {
    text-decoration: none
}
</style>