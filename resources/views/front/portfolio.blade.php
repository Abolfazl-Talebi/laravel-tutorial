<!--==========================
        Portfolio Section
      ============================-->
<section id="portfolio" class="section-bg">
    <div class="container">

        <header class="section-header">
            <h3 class="section-title">نمونه کارها</h3>
        </header>

        <div class="row">
            <div class="col-lg-12">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">همه</li>
                    @foreach ($tags as $item)
                    <li data-filter=".filter-{{$item->tag}}">{{$item->tag}}</li>
                    @endforeach


                </ul>
            </div>
        </div>

        <div class="row portfolio-container">


            @foreach ($portfolios as $item)
            <div class="col-lg-4 col-md-6 portfolio-item filter-{{$item->tag}}">
                <div class="portfolio-wrap">
                    <img src="{{$item->image}}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4><a href="{{$item->link}}">{{$item->name}}</a></h4>
                        <p>{{$item->description}}</p>
                        <div>
                            <a href="{{$item->image}}" data-lightbox="portfolio" data-title="App 1" class="link-preview"
                                title="Preview"><i class="ion ion-eye"></i></a>
                            <a href="{{$item->link}}" class="link-details" title="More Details"><i
                                    class="ion ion-android-open"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach



        </div>

    </div>
</section><!-- #portfolio -->