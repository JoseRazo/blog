<div class="row bg-light">
  @foreach($articles as $article)
  <div class="col-12 col-xs-12 col-sm-6 col-md-6 col-lg-4 card-deck">
  <div class="card mb-3">
    <div class="ih-item square colored effect6 bottom_to_top" data-eventtype="agosto"><a href="{{ route('front.view.article', $article->slug) }}">
            <div class="img" data-eventtype="agosto">
              @foreach($article->images as $image)
                <img src="{{ asset('images/articles/' . $image->name) }}">
               @endforeach
            </div>
            <div class="info" data-eventtype="agosto">
              <h3>LEER MÁS</h3>
            </div></a>
        </div>
    <div class="card-body">
      <h5 class="card-title">{{ $article->title }}</h5>
    </div>
    <div class="card-footer">
      <div class="text-center">
      <!-- <a href="{{ route('front.search.category', $article->category->name) }}" class="mr-3"><i class="material-icons">folder_special</i><cite title="{{ $article->category->name }}">{{ $article->category->name }}</cite></a><br> -->
        <small class="text-muted"><i class="material-icons">access_time</i>{{ $article->created_at->diffForHumans() }}</small>
      </div>
    </div>
    </div>
   </div>
    @endforeach  
</div>

<div class="text-center bg-light">
  <ul class="pagination justify-content-center">
    {!! $articles->appends(Request::only(['title', 'created_at', 'from', 'to']))->render() !!}
  </ul>
</div>